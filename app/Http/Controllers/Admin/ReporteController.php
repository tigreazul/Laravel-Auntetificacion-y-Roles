<?php

namespace App\Http\Controllers\Admin;

use App\Models\{
    Modulo, Pagina
};

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ReporteController extends Controller
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

        $grupo = \Views::diccionario('idGrupo');

        $a_data_page = array(
            'title' => 'Lista de Socios',
            'pagina'=> $frontend,
            'grupo' => $grupo
        );

        return \Views::admin('reporte.index',$a_data_page);
    }


    public function expediente(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        
        $frontend =  DB::table('frontend')
        ->where([
            'Estado'   => 1
        ])
        ->orderBy('ID')
        ->get();

        $tcuota = \Views::diccionario('idTipoCuota');

        
        $a_data_page = array(
            'title' => 'Lista de Socios',
            'pagina'=> $frontend
        );

        return \Views::admin('reporte.expediente',$a_data_page);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $a_data_page = array(
            'title' => 'Registro de paginas',
        );

        return \Views::admin('page.create',$a_data_page);
    }


    public function validaBusqueda(Request $request){
        // dd($request); die();
        $validator = Validator::make($request->all(), [
            'grupo' => "nullable",
            'manzana' => "nullable"
        ]);
 
        if ($validator->fails()) {    
            return response()->json($validator->messages(), 200);
        }


        $grupo      =  $request->input('grupo');
        $manzana    =  $request->input('manzana');


        if(!is_null($grupo)){

            $vSearch  = DB::select("SELECT u.idUsuario, p.dni, p.nombre, p.apellidoPaterno, p.apellidoMaterno,
            e.nomDireccion,g.nomGrupo,g.idGrupo,e.nroExpediente
            FROM usuario u
            INNER JOIN persona p ON u.idPersona = p.idPersona
            INNER JOIN expediente e ON u.idUsuario = e.idUsuario
            INNER JOIN manzanas m ON m.idExpediente = e.idExpediente
            INNER JOIN grupo g ON g.idGrupo = m.idGrupo
            WHERE 
            g.idGrupo = $grupo");
        }

        if(!is_null($manzana)){

            $vSearch  = DB::select("SELECT u.idUsuario, p.dni, p.nombre, p.apellidoPaterno, p.apellidoMaterno,
            e.nomDireccion,g.nomGrupo,g.idGrupo,e.nroExpediente
            FROM usuario u
            INNER JOIN persona p ON u.idPersona = p.idPersona
            INNER JOIN expediente e ON u.idUsuario = e.idUsuario
            INNER JOIN manzanas m ON m.idExpediente = e.idExpediente
            INNER JOIN grupo g ON g.idGrupo = m.idGrupo
            WHERE 
            m.nomManzana LIKE '$manzana'");
        }


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
