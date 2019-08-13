<?php

namespace App\Http\Controllers\Admin;

use App\Models\{
    Modulo, Pagina
};

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
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
            'buscardor'=> $frontend,
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
        $buscardor = array();
        
        $a_data_page = array(
            'title' => 'Lista de Socios',
            'buscardor'=> $buscardor
        );

        return \Views::admin('reporte.expediente',$a_data_page);
    }


    public function validaBusquedaSocio(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'manzanas' => "nullable",
            "grupo"    => "nullable"
        ]);
 
        if ($validator->fails()) {    
            return response()->json($validator->messages(), 200);
        }

        $manzanas   =  $request->input('manzanas');
        $grupo      =  $request->input('grupo');

        if(!is_null($manzanas))
        {
            $vSearch  = DB::select("SELECT expediente.nroExpediente,persona.nombre,persona.apellidoPaterno,persona.apellidoMaterno,expediente.nomDireccion,
            grupo.idGrupo,grupo.nomGrupo,manzanas.nomManzana
            FROM expediente
            INNER JOIN usuario ON usuario.idUsuario = expediente.idUsuario
            INNER JOIN persona ON persona.idPersona = usuario.idPersona
            INNER JOIN manzanas ON manzanas.idExpediente = expediente.idExpediente
            INNER JOIN grupo ON manzanas.idGrupo = grupo.idGrupo
            WHERE manzanas.nomManzana = '$manzanas'");
            if(!empty($vSearch)){
                return redirect()->route('admin.socio_create_search', $manzanas);
            }else{
                \Session::flash('message', 'El numero ingresado no existe ');
                return redirect()->route('admin.report_list');
            }
        }

        if(!is_null($grupo))
        {
            $vSearch  = DB::select("SELECT expediente.nroExpediente,persona.nombre,persona.apellidoPaterno,persona.apellidoMaterno,expediente.nomDireccion,
            grupo.idGrupo,grupo.nomGrupo,manzanas.nomManzana
            FROM expediente
            INNER JOIN usuario ON usuario.idUsuario = expediente.idUsuario
            INNER JOIN persona ON persona.idPersona = usuario.idPersona
            INNER JOIN manzanas ON manzanas.idExpediente = expediente.idExpediente
            INNER JOIN grupo ON manzanas.idGrupo = grupo.idGrupo
            WHERE grupo.idGrupo = '$grupo'");
            if(!empty($vSearch)){
                return redirect()->route('admin.socio_create_search', $grupo);
            }else{
                \Session::flash('message', 'El numero ingresado no existe ');
                return redirect()->route('admin.report_list');
            }
        }

        if(empty($grupo) || empty($manzanas)){
            \Session::flash('message', 'El numero ingresado no existe ');
            return redirect()->route('admin.report_list');
        }

    }

    public function busquedaSocio(Request $request,$id)
    {

        $vSearch  = DB::select("SELECT expediente.idExpediente,expediente.nroExpediente,persona.nombre,persona.apellidoPaterno,
            persona.apellidoMaterno,expediente.nomDireccion,
            grupo.idGrupo,grupo.nomGrupo,manzanas.nomManzana
            FROM expediente
            INNER JOIN usuario ON usuario.idUsuario = expediente.idUsuario
            INNER JOIN persona ON persona.idPersona = usuario.idPersona
            INNER JOIN manzanas ON manzanas.idExpediente = expediente.idExpediente
            INNER JOIN grupo ON manzanas.idGrupo = grupo.idGrupo
            WHERE grupo.idGrupo = '$id' OR  manzanas.nomManzana = '$id'");

        $grupo = \Views::diccionario('idGrupo');


        $a_data_page = array(
            'title'         => 'Registro de paginas',
            'dato'          => $id,
            'grupo'     => $grupo,
            'buscardor' => $vSearch
        );

        return \Views::admin('reporte.index',$a_data_page);
    }






    public function validaBusquedaExpediente(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'buscador' => "nullable",
        ]);
 
        if ($validator->fails()) {    
            return response()->json($validator->messages(), 200);
        }

        $buscador   =  $request->input('buscador');

        if(!is_null($buscador))
        {
            $vSearch  = DB::select("SELECT expediente.nroExpediente,persona.nombre,persona.apellidoPaterno,persona.apellidoMaterno,expediente.nomDireccion,
            grupo.idGrupo,grupo.nomGrupo,manzanas.nomManzana
            FROM expediente
            INNER JOIN usuario ON usuario.idUsuario = expediente.idUsuario
            INNER JOIN persona ON persona.idPersona = usuario.idPersona
            INNER JOIN manzanas ON manzanas.idExpediente = expediente.idExpediente
            INNER JOIN grupo ON manzanas.idGrupo = grupo.idGrupo
            WHERE expediente.nroExpediente = '$buscador'");
            if(!empty($vSearch)){
                return redirect()->route('admin.exp_create_search', $buscador);
            }else{
                \Session::flash('message', 'El numero ingresado no existe ');
                return redirect()->route('admin.report_exp');
            }
        }

        if(empty($grupo) || empty($manzanas)){
            \Session::flash('message', 'El numero ingresado no existe ');
            return redirect()->route('admin.report_exp');
        }

    }

    public function busquedaExpediente(Request $request,$id)
    {

        $vSearch  = DB::select("SELECT expediente.idExpediente,expediente.nroExpediente,persona.nombre,persona.apellidoPaterno,
            persona.apellidoMaterno,expediente.nomDireccion,
            grupo.idGrupo,grupo.nomGrupo,manzanas.nomManzana
            FROM expediente
            INNER JOIN usuario ON usuario.idUsuario = expediente.idUsuario
            INNER JOIN persona ON persona.idPersona = usuario.idPersona
            INNER JOIN manzanas ON manzanas.idExpediente = expediente.idExpediente
            INNER JOIN grupo ON manzanas.idGrupo = grupo.idGrupo
            WHERE expediente.nroExpediente = '$id'");

        // $grupo = \Views::diccionario('idGrupo');


        $a_data_page = array(
            'title'     => 'Registro de paginas',
            'dato'      => $id,
            // 'grupo'     => $grupo,
            'buscardor' => $vSearch
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
