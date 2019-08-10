<?php

namespace App\Http\Controllers\Admin;

use App\Models\{
    Modulo, Pagina, Pago
};

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;

class PagosController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        
        $frontend =  DB::table('frontend')
        ->where([
            'Estado'   => 1
        ])
        ->orderBy('ID')
        ->get();

        


        $a_data_page = array(
            'title' => 'Lista de Pagos',
            'pagina'=> $frontend
        );

        return \Views::admin('pagos.index',$a_data_page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prefencia = \Views::diccionario('idPreferencia');
        $reuniones  = array();
        $cuota  = array();
        $legal  =array();

        $a_data_page = array(
            'title'     => 'Registro de paginas',
            'reuniones'   => $reuniones,
            'cuota'       => $cuota,
            'legal'       => $legal,
            'prefencia'   => $prefencia
        );

        return \Views::admin('pagos.create',$a_data_page);
    }


    public function validaBusqueda(Request $request){
        // dd($request); die();
        $validator = Validator::make($request->all(), [
            'buscador' => "required"
        ]);
 
        if ($validator->fails()) {    
            return response()->json($validator->messages(), 200);
        }

        $search =  $request->input('buscador');

        $vSearch  = DB::select("SELECT u.idUsuario, p.nombre, p.apellidoPaterno, p.apellidoMaterno,e.nomDireccion,g.nomGrupo
        FROM usuario u
        LEFT JOIN persona p ON u.idPersona = p.idPersona
        LEFT JOIN expediente e ON e.idUsuario = e.idUsuario
        LEFT JOIN manzanas m ON m.idExpediente = e.idExpediente
        LEFT JOIN grupo g ON g.idGrupo = m.idGrupo
        where p.dni = '$search'");

        if(!empty($vSearch)){
            return redirect()->route('admin.pagos_create_search', $search);
        }else{
            \Session::flash('message', 'El numero ingresado no existe ');
            return redirect()->route('admin.pagos_create');
        }
        
    }


    public function busqueda(Request $request,$id)
    {

        $persona  = DB::select("SELECT u.idUsuario, p.nombre, p.apellidoPaterno, p.apellidoMaterno,e.nomDireccion,g.nomGrupo
            FROM usuario u
            LEFT JOIN persona p ON u.idPersona = p.idPersona
            LEFT JOIN expediente e ON e.idUsuario = e.idUsuario
            LEFT JOIN manzanas m ON m.idExpediente = e.idExpediente
            LEFT JOIN grupo g ON g.idGrupo = m.idGrupo
            where p.dni = '$id'");

        $prefencia = \Views::diccionario('idPreferencia');

        $reuniones  = DB::select("SELECT 
            u.idUsuario,r.idTipoReunion,
            (SELECT valor FROM diccionario WHERE ubicacion = 'idTipoReunion' AND codigo = r.idTipoReunion ) AS 'tipo' ,
            dc.multa,r.fecha,MONTH(r.fecha) AS MES,dc.idDetalleReunion
            FROM usuario u
            LEFT JOIN persona p ON u.idPersona = p.idPersona
            LEFT JOIN detalle_reunion dc ON dc.idUsuario = u.idUsuario
            LEFT JOIN reunion r ON r.idReunion = dc.idReunion
            WHERE p.dni = '$id'
            AND dc.idDetalleReunion NOT IN (SELECT p.idCodigo FROM pago p where p.idCodigo = dc.idDetalleReunion and idUsuario = dc.idUsuario)");

        $cuota  = DB::select("SELECT dc.*,c.idTipoCuota,c.fechaRegistro,
            (SELECT valor FROM diccionario WHERE ubicacion = 'idTipoCuota' AND codigo = c.idTipoCuota ) AS 'tipo',
            (SELECT d.valor FROM diccionario d WHERE d.ubicacion = 'idMes' AND d.codigo = dc.idMes ) AS 'mes'
            FROM usuario u
            LEFT JOIN persona p ON u.idPersona = p.idPersona
            LEFT JOIN detalle_cuota dc ON dc.idUsuario = u.idUsuario
            LEFT JOIN cuota c ON c.idCuota = dc.idCuota
            WHERE p.dni = '$id'
            AND c.idTipoCuota IN (2,3)
            AND dc.idCuotaDetalle NOT IN (SELECT p.idCodigo FROM pago p where p.idCodigo = dc.idCuotaDetalle and idUsuario = dc.idUsuario)");

        $legal  = DB::select("SELECT dc.*,c.idTipoCuota,c.fechaRegistro,
            (SELECT valor FROM diccionario WHERE ubicacion = 'idTipoCuota' AND codigo = c.idTipoCuota ) AS 'tipo',
            (SELECT d.valor FROM diccionario d WHERE d.ubicacion = 'idMes' AND d.codigo = dc.idMes ) AS 'mes'
            FROM usuario u
            LEFT JOIN persona p ON u.idPersona = p.idPersona
            LEFT JOIN detalle_cuota dc ON dc.idUsuario = u.idUsuario
            LEFT JOIN cuota c ON c.idCuota = dc.idCuota
            WHERE p.dni = '$id'
            AND c.idTipoCuota IN (1)
            AND dc.idCuotaDetalle NOT IN (SELECT p.idCodigo FROM pago p where p.idCodigo = dc.idCuotaDetalle and idUsuario = dc.idUsuario)");

        $a_data_page = array(
            'title'         => 'Registro de paginas',
            'persona'       => $persona,
            'reuniones'     => $reuniones,
            'cuota'         => $cuota,
            'legal'         => $legal,
            'dato'          => $id,
            'prefencia'     => $prefencia
        );

        return \Views::admin('pagos.create',$a_data_page);
    }


    public function justificar(Request $request){
        // dd($request); die();

        $data = $request->validate([
            'idUsuario'     => 'required',
            'idtipo_j'      => 'required',
            'precencia'     => 'required',
            'idjustifica'   => 'required',
            'fecha_tipot'   => 'required',
            'motivo'        => 'required',
            'identifica'        => 'required',
            'origin'        => 'required'
        ], [
            'idUsuario'     => 'Campo requerido',
            'idtipo_j'      => 'Campo requerido',
            'precencia'     => 'Campo requerido',
            'idjustifica'   => 'Campo requerido',
            'fecha_tipot'   => 'Campo requerido',
            'motivo'        => 'Campo requerido'
        ]);

        $pago = new Pago;
        $pago->idUsuario   = $data['idUsuario'];
        $pago->Tipo        = $data['idtipo_j'];
        $pago->Presencia   = $data['precencia'];
        // $pago->monto       = $data['idjustifica'];
        $pago->FechaTipo   = $data['fecha_tipot'];
        $pago->FechaPago   = date('Y-m-d');
        $pago->motivo      = $data['motivo'];
        $pago->estado      = 1;
        $pago->idCodigo    = $data['idjustifica'];
        $pago->identificador    = $data['identifica'];
        $pago->origen    = $data['origin'];
        $pago->save();

        return response()->json(['msg'=> true], 200);


    }


    public function pagar(Request $request){
        // dd($request); die();

        // "idUsuario" => "7"
        // "idtipo_p" => "3"
        // "fecha_tipot" => "2019-08-06"
        // "monto" => "345"
        // "idPago" => "3"
        // "identifica" => "PAGO"
        // "origin" => "R"


        $data = $request->validate([
            'idUsuario'     => 'required',
            'idtipo_p'      => 'required',
            'fecha_tipot'     => 'required',
            'monto'   => 'required',
            'idPago'   => 'required',
            'identifica'        => 'required',
            'origin'        => 'required'
        ], [
            'idUsuario'     => 'Campo requerido',
            'idtipo_p'      => 'Campo requerido',
            'fecha_tipot'     => 'Campo requerido',
            'monto'   => 'Campo requerido',
            'idPago'   => 'Campo requerido',
            'identifica'        => 'Campo requerido',
            'origin'        => 'Campo requerido'
        ]);

        $pago = new Pago;
        $pago->idUsuario        = $data['idUsuario'];
        $pago->Tipo             = $data['idtipo_p'];
        $pago->FechaTipo        = $data['fecha_tipot'];
        $pago->monto            = $data['monto'];
        $pago->FechaPago        = date('Y-m-d');
        $pago->idCodigo         = $data['idPago'];
        $pago->estado           = 1;
        $pago->identificador    = $data['identifica'];
        $pago->origen           = $data['origin'];
        $pago->save();

        return response()->json(['msg'=> true], 200);


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $front = new Front;
        $front->Titulo              = $request->titulo;
        $front->Categoria           = $request->categoria;
        $front->Estado              = 1;
        $front->Tag                 = $request->tag;
        $front->FechaIngreso        = date('Y-m-d');
        $front->Imagen_principal    = $request->images;
        $front->Contenido           = $request->contentenido;
        $front->save();

        return redirect()->route('admin.front_list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
