<?php

namespace App\Http\Controllers\Admin;

use App\{
    Modulo
};

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;

// use App\Modulo as Modulo;

class MenuController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        
        $_data_page = DB::table('modulo')
        ->where([
            'Estado'   => 1
        ])
        ->get();
        // dd($_data_page);

        $a_data_page = array(
            'title' => 'Titli',
            $_data_page
        );

        return \Views::admin('configuracion.menu',$_data_page);
    }



    /**
     * Add modulo
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function modulo_add(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        
        $_data_page = DB::table('modulo')
        ->where([
            'Estado'   => 1
        ])
        ->get();
        // dd($_data_page);

        $a_data_page = array(
            'title' => 'Titli',
            $_data_page
        );

        return \Views::admin('configuracion.add_modulo');
    }

    /**
     * Store modulo
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store_modulo(Request $request)
    {
        // dd($request);
        $modulo = new Modulo;
        $modulo->Titulo         = $request->titulo;
        $modulo->Descripcion    = $request->descripcion;
        $modulo->Estado         = 1;
        $modulo->Orden          = 1;
        $modulo->Icono          = $request->icono;
        $modulo->Link           = $request->link;
        $modulo->LinkExterno    = $request->exterior;
        $modulo->Route          = $request->route;
        $modulo->save();
        return redirect('admin/configuracion/menu');
    }



    public function edit_modulo($id)
    {
        $modulo = Modulo::find($id);
        // dd($modulo);
        // return \View::make('update',compact('movie'));

        return \Views::admin('configuracion.edit_modulo',$modulo);
    }


    public function update_modulo(Request $request,$id)
    {

        // $tot = count($modulo);
        // if($tot != 0){
            // dd($request);

            $ddd = Modulo::find($id);
            $ddd->Titulo         = $request->titulo;
            $ddd->Descripcion    = $request->descripcion;
            $ddd->Icono          = $request->icono;
            $ddd->Link           = $request->link;
            // $ddd->LinkExterno    = $request->exterior;
            $ddd->Route          = $request->route;
            $ddd->save();
            dd($ddd);
        // }

        // return redirect('admin/configuracion/menu');


        // $data = request()->validate([
        //     'name' => 'required',
        //     'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
        //     'password' => '',
        // ]);
        // if ($data['password'] != null) {
        //     $data['password'] = bcrypt($data['password']);
        // } else {
        //     unset($data['password']);
        // }
        // $user->update($data);
        // return redirect()->route('users.show', ['user' => $user]);
    }
    
}
