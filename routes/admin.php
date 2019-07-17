<?php


Route::get('dashboard', 'AdminController@index')->name('admin.home');

Route::group(['prefix' => 'configuracion'], function() {
    Route::get('menu', 'Admin\MenuController@index')->name('admin.menu');
    Route::get('menu/modulo-add', 'Admin\MenuController@modulo_add')->name('admin.modulo_add');
    Route::get('menu/get-page/{id}', 'Admin\MenuController@get_page')->name('admin.get_page');
    Route::get('menu/get-page-id/{id}', 'Admin\MenuController@get_page_id')->name('admin.get_page_id');
    Route::post('menu/modulo-add', 'Admin\MenuController@store_modulo')->name('admin.modulo_add_store');
    Route::get('menu/{user}/editar', 'Admin\MenuController@edit_modulo')->name('admin.modulo_edit');
    Route::post('menu/{user}/update', 'Admin\MenuController@update_modulo')->name('admin.modulo_update');
    Route::post('delete/module/{id}', 'Admin\MenuController@delete_modulo')->name('admin.delete_modulo');
    
    Route::post('delete/page/{id}', 'Admin\MenuController@delete_page')->name('admin.delete_page');
    Route::post('menu/page-add', 'Admin\MenuController@store_pagina')->name('admin.page_add');
    Route::post('menu/page-update', 'Admin\MenuController@update_pagina')->name('admin.page_update');
});

Route::group(['prefix' => 'titular'], function() {
    // Titular
    Route::get('lista', 'Admin\TitularController@index')->name('admin.front_list');                 // Listado
    Route::get('page/create', 'Admin\TitularController@create')->name('admin.front_create');       // Form View Create
    Route::post('page/create-add', 'Admin\TitularController@store')->name('admin.front_add');      // Crear dato
    Route::get('page/{id}', 'Admin\TitularController@show')->name('admin.front_list_id');          // Mostrar por id
    Route::get('page/{user}/editar', 'Admin\TitularController@edit')->name('admin.front_edit');    // Form editar
    Route::patch('page/{id}', 'Admin\TitularController@update')->name('admin.front_edit_data');    // Update datos
}); 

Route::group(['prefix' => 'usuario'], function() {
    // Usuario
    Route::get('lista', 'Admin\UsuarioController@index')->name('admin.front_list');                 // Listado
    Route::get('page/create', 'Admin\UsuarioController@create')->name('admin.front_create');       // Form View Create
    Route::post('page/create-add', 'Admin\UsuarioController@store')->name('admin.front_add');      // Crear dato
    Route::get('page/{id}', 'Admin\UsuarioController@show')->name('admin.front_list_id');          // Mostrar por id
    Route::get('page/{user}/editar', 'Admin\UsuarioController@edit')->name('admin.front_edit');    // Form editar
    Route::patch('page/{id}', 'Admin\UsuarioController@update')->name('admin.front_edit_data');    // Update datos
}); 

Route::group(['prefix' => 'cuota'], function() {
    // Pagina
    Route::get('lista', 'Admin\CuotaController@index')->name('admin.front_list');                 // Listado
    Route::get('page/create', 'Admin\CuotaController@create')->name('admin.front_create');       // Form View Create
    Route::post('page/create-add', 'Admin\CuotaController@store')->name('admin.front_add');      // Crear dato
    Route::get('page/{id}', 'Admin\CuotaController@show')->name('admin.front_list_id');          // Mostrar por id
    Route::get('page/{user}/editar', 'Admin\CuotaController@edit')->name('admin.front_edit');    // Form editar
    Route::patch('page/{id}', 'Admin\CuotaController@update')->name('admin.front_edit_data');    // Update datos
}); 

Route::group(['prefix' => 'expediente'], function() {
    // Pagina
    Route::get('lista', 'Admin\ExpedienteController@index')->name('admin.front_list');                 // Listado
    Route::get('page/create', 'Admin\ExpedienteController@create')->name('admin.front_create');       // Form View Create
    Route::post('page/create-add', 'Admin\ExpedienteController@store')->name('admin.front_add');      // Crear dato
    Route::get('page/{id}', 'Admin\ExpedienteController@show')->name('admin.front_list_id');          // Mostrar por id
    Route::get('page/{user}/editar', 'Admin\ExpedienteController@edit')->name('admin.front_edit');    // Form editar
    Route::patch('page/{id}', 'Admin\ExpedienteController@update')->name('admin.front_edit_data');    // Update datos
}); 

Route::group(['prefix' => 'pagos'], function() {
    // Pagina
    Route::get('lista', 'Admin\PagosController@index')->name('admin.front_list');                 // Listado
    Route::get('page/create', 'Admin\PagosController@create')->name('admin.front_create');       // Form View Create
    Route::post('page/create-add', 'Admin\PagosController@store')->name('admin.front_add');      // Crear dato
    Route::get('page/{id}', 'Admin\PagosController@show')->name('admin.front_list_id');          // Mostrar por id
    Route::get('page/{user}/editar', 'Admin\PagosController@edit')->name('admin.front_edit');    // Form editar
    Route::patch('page/{id}', 'Admin\PagosController@update')->name('admin.front_edit_data');    // Update datos
}); 

Route::group(['prefix' => 'reporte'], function() {
    // Pagina
    Route::get('lista', 'Admin\PageController@index')->name('admin.front_list');                 // Listado
    Route::get('page/create', 'Admin\PageController@create')->name('admin.front_create');       // Form View Create
    Route::post('page/create-add', 'Admin\PageController@store')->name('admin.front_add');      // Crear dato
    Route::get('page/{id}', 'Admin\PageController@show')->name('admin.front_list_id');          // Mostrar por id
    Route::get('page/{user}/editar', 'Admin\PageController@edit')->name('admin.front_edit');    // Form editar
    Route::patch('page/{id}', 'Admin\PageController@update')->name('admin.front_edit_data');    // Update datos
}); 


Route::get('volver',function(){
    return redirect()->back();
})->name('admin.back');