<?php

namespace App\Http\Controllers\Admin;

use App\Models\{
    Modulo, Pagina
};

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $ss = array();
        $prefencia = \Views::diccionario('idPreferencia');
        $reuniones  = DB::select("SELECT 
            u.idUsuario,
            (SELECT valor FROM diccionario WHERE ubicacion = 'idTipoReunion' AND codigo = r.idTipoReunion ) AS 'tipo' ,
            dc.multa,r.fecha,MONTH(r.fecha) AS MES,dc.idDetalleReunion
            from usuario u
            left join persona p ON u.idPersona = p.idPersona
            left join detalle_reunion dc ON dc.idUsuario = u.idUsuario
            left join reunion r ON r.idReunion = dc.idReunion
            where p.dni = '5555555'");

        $cuota  = DB::select("SELECT dc.*,idTipoCuota,c.fechaRegistro,
            (SELECT valor FROM diccionario WHERE ubicacion = 'idTipoCuota' AND codigo = c.idTipoCuota ) AS 'tipo',
            (SELECT d.valor FROM diccionario d WHERE d.ubicacion = 'idMes' AND d.codigo = dc.idMes ) AS 'mes'
            FROM usuario u
            LEFT JOIN persona p ON u.idPersona = p.idPersona
            LEFT JOIN detalle_cuota dc ON dc.idUsuario = u.idUsuario
            LEFT JOIN cuota c ON c.idCuota = dc.idCuota
            where p.dni = '5555555'
            and c.idTipoCuota IN (2,3)");

        $legal  = DB::select("SELECT dc.*,idTipoCuota,c.fechaRegistro,
            (SELECT valor FROM diccionario WHERE ubicacion = 'idTipoCuota' AND codigo = c.idTipoCuota ) AS 'tipo',
            (SELECT d.valor FROM diccionario d WHERE d.ubicacion = 'idMes' AND d.codigo = dc.idMes ) AS 'mes'
            FROM usuario u
            LEFT JOIN persona p ON u.idPersona = p.idPersona
            LEFT JOIN detalle_cuota dc ON dc.idUsuario = u.idUsuario
            LEFT JOIN cuota c ON c.idCuota = dc.idCuota
            where p.dni = '5555555'
            and c.idTipoCuota IN (1)");

        $a_data_page = array(
            'title'     => 'Registro de paginas',
            'pagina'    => $ss,
            'reuniones'   => $reuniones,
            'cuota'       => $cuota,
            'legal'       => $legal,
            'prefencia'   => $prefencia
        );

        return \Views::admin('pagos.create',$a_data_page);
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
