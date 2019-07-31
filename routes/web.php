<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', function () {
    return redirect('/');
    // ->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('provincia/{id}' , function($id){

	$listado =  DB::table('provincia')
    ->where([
        'estado'   => 1,
        'depId'    => $id
    ])->orderBy('descripcion','DESC')->get();

    if ( !$listado  )
    {
        \Json::setMessage('ID invalido.');
    }
    if ( $listado )
    {
        \Json::setStatus('ok');
        \Json::setData($listado);
       	\Json::setMessage('Listado correctamente.');
    }else{
        \Json::setMessage('Intentelo nuevamente.');	
    }
    echo \Json::getJson();
})->name('ubigeo.provincia');


Route::get('distrito/{id}' ,function($id){
	
	$listado =  DB::table('distrito')
    ->where([
        'estado'   => 1,
        'provId'    => $id
    ])->orderBy('descripcion','DESC')->get();

    if ( !$listado  )
    {
        \Json::setMessage('ID invalido.');
    }
    if ( $listado )
    {
        \Json::setStatus('ok');
        \Json::setData($listado);
       	\Json::setMessage('Listado correctamente.');
    }else{
        \Json::setMessage('Intentelo nuevamente.');	
    }
    echo \Json::getJson();
})->name('ubigeo.distrito');


Route::post('image', 'RecursoController@index')->name('image');
