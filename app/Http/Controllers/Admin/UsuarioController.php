<?php

namespace App\Http\Controllers\Admin;

use App\Models\{
    Modulo, Pagina, Persona, Usuario, Roluser
};
use App\Models\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;

class UsuarioController extends Controller
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
            'title' => 'Lista de Usuario',
            'pagina'=> $frontend
        );

        return \Views::admin('usuario.index',$a_data_page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cargo = \Views::diccionario('idCargo');


        $a_data_page = array(
            'title' => 'Registro de paginas',
            'cargo' => $cargo
        );

        return \Views::admin('usuario.create',$a_data_page);
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
        // $validator = $request->validate([
           'nombre'         => "nullable",
           'apaterno'       => "nullable",
           'amaterno'       => "nullable",
            "fnacimiento"   => "nullable",
            "dni"           => "nullable",
            "usuario"       => "nullable",
            "password"      => "nullable",
            "cargo"         => "nullable",
            "agestion"      => "nullable",
        ]);

        if ($validator->fails()) {    
            return response()->json($validator->messages(), 200);
        }

        
        $perso = new Persona;
        $perso->nombre            = $request->input('nombre');
        $perso->apellidoPaterno   = $request->input('apaterno');
        $perso->apellidoMaterno   = $request->input('amaterno');
        $perso->fechaNacimiento   = $request->input('fnacimiento');
        $perso->dni               = $request->input('dni');
        $perso->save();
        $persoId = $perso->idPersona;

        $usu = new Usuario;
        $usu->nombreUsuario     = $request->input('usuario');
        $usu->idPersona         = $persoId;
        $usu->password          = Hash::make($request->input('password'));
        $usu->idCargo           = $request->input('cargo');
        $usu->anioGestion       = $request->input('agestion');
        $usu->save();
        $usuario = $usu->idUsuario;


        $user = new User;
        $user->name      = $request->input('apaterno').' '.$request->input('amaterno').' '.$request->input('nombre');
        $user->email     = $request->input('usuario').'@profile.com';
        $user->password  = Hash::make($request->input('password'));
        $user->save();
        $usuar = $user->id;

        $roluser = new Roluser;
        $roluser->role_id   = 3;
        $roluser->user_id   = $usuar;
        $roluser->save();
        
        return redirect()->route('admin.titular_listadmin.titular_list');
        // $user = User::create([
        //     'name'      => $request->input('apaterno').' '.$request->input('amaterno').' '.$request->input('nombre'),
        //     'email'     => $request->input('usuario').'@profile.com',
        //     'password'  => Hash::make($request->input('password'))
        // ]);

        // $user->roles()->attach(Role::where('name', 'user')->first());

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
