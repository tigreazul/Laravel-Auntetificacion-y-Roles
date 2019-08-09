<?php

namespace App\Http\Controllers\Admin;

use App\Models\{
    Modulo, Pagina, Reunion, Detallereunion
};

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;

class ReunionController extends Controller
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
        
        $mes = \Views::diccionario('idMes');
        $treunion = \Views::diccionario('idTipoReunion');

        // $cuota =  DB::table('cuota')
        // ->get();

        // $dcuota =  DB::table('detalle_cuota')->get();
        
        $reunion  = DB::select("SELECT c.idReunion,c.nomReunion, c.lugar,c.fecha,c.horaInicio,c.horaFin,(SELECT valor FROM diccionario WHERE ubicacion = 'idTipoReunion' AND codigo = c.idTipoReunion ) AS 'tipo' from reunion c");

        // dd($cuota);
        $a_data_page = array(
            'title' => 'Lista de Cuario',
            'mes'   => $mes,
            'treunion'=> $treunion,
            'reunion' => $reunion
        );

        return \Views::admin('reunion.index',$a_data_page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $mes = \Views::diccionario('idMes');
        $treunion = \Views::diccionario('idTipoReunion');


        $a_data_page = array(
            'title' => 'Registro de paginas',
            // 'mes'   => $mes,
            'treunion'=> $treunion
        );

        return \Views::admin('reunion.create',$a_data_page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->all()); die();
        $validator = Validator::make($request->all(), [
           'tipo_reunion'   => 'required',
           'nombre'         => 'required',
           'monto'          => 'required',
           'fecha'          => 'required',
           'lugar'          => 'required',
           'hinicio'        => 'required',
           'hfin'           => 'required'
        ]);

        if ($validator->fails()) {    
            return response()->json($validator->messages(), 200);
        }
        
        // dd($validator->data); die();

        $tipo_reunion   = $request->input('tipo_reunion');
        $nombre         = $request->input('nombre');
        $monto          = $request->input('monto');
        $lugar          = $request->input('lugar');
        $fecha          = $request->input('fecha');
        $hinicio        = $request->input('hinicio');
        $hfin           = $request->input('hfin');
        

        $usuarios = DB::table('usuario')
        ->join('persona', 'usuario.idPersona', '=', 'persona.idPersona')
        ->join('users', 'usuario.idUsuario', '=', 'users.idUsuario')
        ->get();

        // dd($usuarios); die();
        $reunion = new Reunion;
        $reunion->idTipoReunion = $tipo_reunion;
        $reunion->nomReunion    = $nombre;
        $reunion->lugar         = $lugar;
        $reunion->fecha         = $fecha;
        $reunion->horaInicio    = $hinicio;
        $reunion->horaFin       = $hfin;
        $reunion->save();
        $reunionId = $reunion->idReunion;

        foreach($usuarios as $user){
            $usu = new Detallereunion;
            $usu->idReunion     = $reunionId;
            $usu->multa       = $monto;
            $usu->idUsuario   = $user->idUsuario;
            $usu->estado      = 1;
            $usu->save();
        }


        
        return redirect()->route('admin.reunion_list');

        // return redirect()->route('admin.front_list');
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
        $mes = \Views::diccionario('idMes');
        $tcuota = \Views::diccionario('idTipoCuota');

        $a_data_page = array(
            'title' => 'Registro de paginas',
            'mes'   => $mes,
            'tcuota'=> $tcuota
        );

        return \Views::admin('usuario.editar',$a_data_page);
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
