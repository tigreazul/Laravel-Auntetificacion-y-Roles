<?php

namespace App\Http\Controllers\Admin;

use App\{
    Modulo, Pagina
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
        
        $modulo = DB::table('modulo')
        ->where([
            'Estado'   => 1
        ])
        ->orderBy('Orden')
        ->get();

        $pagina =  DB::table('pagina')
        ->where([
            'Estado'   => 1
        ])
        ->orderBy('Orden')
        ->get();


        $a_data_page = array(
            'title' => 'Titulo',
            'data'  => $modulo,
            'pagina'=> $pagina
        );

        return \Views::admin('configuracion.menu',$a_data_page);
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
        // $maximo = Modulo::max('Orden');
        // dd($maximo); die();

        $modulo = new Modulo;
        $modulo->Titulo         = $request->titulo;
        $modulo->Descripcion    = $request->descripcion;
        $modulo->Estado         = 1;
        $modulo->Orden          = Modulo::max('Orden')+1;
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

        $data_modulo = array(
            'title'     => 'Administración de Menu',
            'data'      => $modulo
        );
        return \Views::admin('configuracion.edit_modulo',$data_modulo);
    }

    public function update_modulo(Request $request,$id)
    {
        try{
            $ddd = Modulo::find($id);
            $ddd->Titulo         = $request->titulo;
            $ddd->Descripcion    = $request->descripcion;
            $ddd->Icono          = $request->icono;
            $ddd->Link           = $request->link;
            // $ddd->LinkExterno    = $request->exterior;
            $ddd->Route          = $request->route;
            $ddd->save();
        }catch(\Exception $e){
            var_dump($e);
            die();
        }
        return redirect('admin/configuracion/menu');


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
    
    public function delete_modulo(Request $request,$id)
    {
        try{
            $data = Modulo::find($id);
            $data->Estado = 0;
            $s = $data->save();
            $return_ms = array(
                'status' => true,
                'retorno'=> $s
            );
        }catch(\Exception $e){
            $return_ms = array(
                'status' => false,
                'retorno'=> $e
            );
        }
        return response()->json($return_ms);
    }

    public function get_page(Request $request, $id)
    {

        // $_data_modulo = DB::table('modulo')->select('*',DB::raw('modulo.Titulo'))
        // ->leftJoin('pagina', function($join){
        //     $join->on('modulo.ID', '=', 'pagina.ModuloID');
        // })
        // ->where([
        //     'pagina.Estado'     => 1,
        //     'modulo.Estado'     => 1,
        //     'pagina.ModuloID'   => $id
        // ])
        // ->orderBy('modulo.ID')
        // ->get();


        $modulo = Modulo::find($id);
        $pagina =  DB::table('pagina')
        ->where([
            'Estado'   => 1,
            'ModuloID' => $id
        ])
        ->get();

        // dd($module);
        $arrResult = array(
            'status'    => true,
            'modulo'    => $modulo->Titulo,
            'pagina'    => $pagina
        );

        return response()->json($arrResult);

    }



    /**
     * Store pagina
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store_pagina(Request $request)
    {
        // dd($request->descripcion); die();
        $pagina = new Pagina;
        $pagina->Descripcion = $request->descripcion;
        $pagina->Ruta        = $request->ruta;
        $pagina->Estado      = $request->estado;
        $pagina->ModuloID    = $request->id;
        $pagina->Orden       = Pagina::max('Orden')+1;
        $id = $pagina->save();


        $modulo = Modulo::find($request->id);
        $pagina =  DB::table('pagina')
        ->where([
            'Estado'   => 1,
            'ModuloID' => $request->id
        ])
        ->get();

        $arrResult = array(
            'status'    => true,
            'modulo'    => $modulo->Titulo,
            'pagina'    => $pagina
        );

        return response()->json($arrResult);
        //return redirect('admin/configuracion/menu');
    }


}
