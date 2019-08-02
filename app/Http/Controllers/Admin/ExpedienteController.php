<?php

namespace App\Http\Controllers\Admin;

use App\Models\{
    Modulo, Pagina, Expediente
};

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ExpedienteController extends Controller
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
        
        $grupo = \Views::diccionario('idGrupo');


        $a_data_page = array(
            'title' => 'Lista de Expediente',
            'grupo'=> $grupo
        );

        return \Views::admin('expediente.index',$a_data_page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupo = \Views::diccionario('idGrupo');
        $vivienda = \Views::diccionario('idVivencia');
        $casa = \Views::diccionario('idCasa');
        $sshh = \Views::diccionario('idSSHH');
        

        $a_data_page = array(
            'title' => 'Registro de paginas',
            'grupo'=> $grupo,
            'vivienda' => $vivienda,
            'sshh' => $sshh,
            'casa' => $casa
        );

        return \Views::admin('expediente.create',$a_data_page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nroexpediente' => "nullable",
            'padron'        => "nullable",
            'area'          => "nullable",
            "grupo"         => "nullable",
            "mz"            => "nullable",
            "lote"          => "nullable",
            "sublote"       => "nullable",
            "tipo"          => "nullable",
            "direccion"     => "nullable",
            // "padron"     => "nullable",
        ]);
 
        if ($validator->fails()) {    
            return response()->json($validator->messages(), 200);
        }
         
        $exp = new Expediente;
        $exp->nroExpediente = $request->input('nroexpediente');
        $exp->nroPadron     = $request->input('padron');
        $exp->area          = $request->input('area');
        $exp->grupo          = $request->input('grupo');
        $exp->estado        = 1;
        
        
        $exp->idManzana     = $request->input('mz');
        $exp->nrLote        = $request->input('lote');
        $exp->nroSubLote    = $request->input('sublote');
        $exp->save();
        $expId = $exp->idPersona;
 
        $roluser = new Roluser;
        $roluser->role_id   = 3;
        $roluser->user_id   = $usuar;
        $roluser->save();
         
        return redirect()->route('admin.titular_list');
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
