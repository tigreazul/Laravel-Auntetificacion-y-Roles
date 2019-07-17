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
