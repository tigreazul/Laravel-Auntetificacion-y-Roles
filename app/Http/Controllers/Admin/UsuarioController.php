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
        $usuarios = DB::table('usuario')
        ->join('persona', 'usuario.idPersona', '=', 'persona.idPersona')
        ->join('users', 'usuario.idUsuario', '=', 'users.idUsuario')
        ->get();

        $a_data_page = array(
            'title' => 'Lista de Usuario',
            'usuarios'=> $usuarios
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
           'nombre'         => "required",
           'apaterno'       => "required",
           'amaterno'       => "required",
            "fnacimiento"   => "required",
            "dni"           => "required|unique:persona",
            "usuario"       => "required",
            "password"      => "required",
            "cargo"         => "required",
            "agestion"      => "required",
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
        $user->idUsuario = $usuario;
        $user->save();
        $usuar = $user->id;

        $roluser = new Roluser;
        $roluser->role_id   = 3;
        $roluser->user_id   = $usuar;
        $roluser->save();
        
        \Session::flash('message', 'Registrado! Se registraron los datos correctamente');
        return redirect()->route('admin.user_list');
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
        $usuarios = DB::table('usuario')
        ->join('persona', 'usuario.idPersona', '=', 'persona.idPersona')
        ->join('users', 'usuario.idUsuario', '=', 'users.idUsuario')
        ->where(['usuario.idUsuario'=> $id])
        ->first();
        $cargo = \Views::diccionario('idCargo');

        $a_data_page = array(
            'title' => 'Editar de usuario',
            'usuarios' => $usuarios,
            'cargo' => $cargo
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

        $validator = Validator::make($request->all(), [
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

        $usuario = Usuario::find($id);
        $usuario->nombreUsuario     = $request->input('usuario');
        if( !empty($request->input('password')) ){
            $usuario->password      = Hash::make($request->input('password'));
        }
        $usuario->idCargo           = $request->input('cargo');
        $usuario->anioGestion       = $request->input('agestion');
        $usuario->save();

        User::where(['idUsuario'=>$usuario->idUsuario ])->update([
            'name'     => $request->input('apaterno').' '.$request->input('amaterno').' '.$request->input('nombre'),
            'email'    => $request->input('usuario').'@profile.com'
        ]);

        $perso = Persona::find($usuario->idPersona);
        $perso->nombre            = $request->input('nombre');
        $perso->apellidoPaterno   = $request->input('apaterno');
        $perso->apellidoMaterno   = $request->input('amaterno');
        $perso->fechaNacimiento   = $request->input('fnacimiento');
        $perso->dni               = $request->input('dni');
        $perso->save();
        $persoId = $perso->idPersona;

        \Session::flash('message', 'Actualizado! Se actualizaron los datos');

        return redirect()->route('admin.user_list');
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
