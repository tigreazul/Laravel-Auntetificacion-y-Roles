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
    Route::get('lista', 'Admin\TitularController@index')->name('admin.titular_list');                 // Listado
    Route::get('formato/create', 'Admin\TitularController@create')->name('admin.titular_create');       // Form View Create
    Route::post('formato/create-add', 'Admin\TitularController@store')->name('admin.titular_add');      // Crear dato
    Route::get('formato/{id}', 'Admin\TitularController@show')->name('admin.titular_list_id');          // Mostrar por id
    Route::get('formato/{user}/editar', 'Admin\TitularController@edit')->name('admin.titular_edit');    // Form editar
    Route::patch('formato/{id}', 'Admin\TitularController@update')->name('admin.titular_edit_data');    // Update datos
}); 

Route::group(['prefix' => 'usuario'], function() {
    // Usuario
    Route::get('lista', 'Admin\UsuarioController@index')->name('admin.user_list');                 // Listado
    Route::get('user/create', 'Admin\UsuarioController@create')->name('admin.user_create');       // Form View Create
    Route::post('user/create-add', 'Admin\UsuarioController@store')->name('admin.user_add');      // Crear dato
    Route::get('user/{id}', 'Admin\UsuarioController@show')->name('admin.user_list_id');          // Mostrar por id
    Route::get('user/{user}/editar', 'Admin\UsuarioController@edit')->name('admin.user_edit');    // Form editar
    Route::patch('user/{id}', 'Admin\UsuarioController@update')->name('admin.user_edit_data');    // Update datos
}); 

Route::group(['prefix' => 'cuota'], function() {
    // Pagina
    Route::get('lista', 'Admin\CuotaController@index')->name('admin.cuota_list');                 // Listado
    Route::get('cuota/create', 'Admin\CuotaController@create')->name('admin.cuota_create');       // Form View Create
    Route::post('cuota/create-add', 'Admin\CuotaController@store')->name('admin.cuota_add');      // Crear dato
    Route::get('cuota/{id}', 'Admin\CuotaController@show')->name('admin.cuota_list_id');          // Mostrar por id
    Route::get('cuota/{user}/editar', 'Admin\CuotaController@edit')->name('admin.cuota_edit');    // Form editar
    Route::patch('cuota/{id}', 'Admin\CuotaController@update')->name('admin.cuota_edit_data');    // Update datos
}); 

Route::group(['prefix' => 'expediente'], function() {
    // Pagina
    Route::get('lista', 'Admin\ExpedienteController@index')->name('admin.expe_list');                 // Listado
    Route::get('exp/create', 'Admin\ExpedienteController@create')->name('admin.expe_create');       // Form View Create
    Route::post('exp/create-add', 'Admin\ExpedienteController@store')->name('admin.expe_add');      // Crear dato
    Route::get('exp/{id}', 'Admin\ExpedienteController@show')->name('admin.expe_list_id');          // Mostrar por id
    Route::get('exp/{user}/editar', 'Admin\ExpedienteController@edit')->name('admin.expe_edit');    // Form editar
    Route::patch('exp/{id}', 'Admin\ExpedienteController@update')->name('admin.expe_edit_data');    // Update datos
}); 

Route::group(['prefix' => 'pagos'], function() {
    // Pagina
    Route::get('lista', 'Admin\PagosController@index')->name('admin.pagos_list');                 // Listado
    Route::get('pago/buscar', 'Admin\PagosController@create')->name('admin.pagos_create');       // Form View Create
    Route::post('pago/buscar', 'Admin\PagosController@validaBusqueda')->name('admin.pagos_create_post');       // Form View Create
    Route::get('pago/buscar/{codigo}', 'Admin\PagosController@busqueda')->name('admin.pagos_create_search');       // Form View Create
    Route::post('pago/justificar', 'Admin\PagosController@justificar')->name('admin.pagos_justificar');
    Route::post('pago/pagar', 'Admin\PagosController@pagar')->name('admin.pagos_pagar');


    // Route::post('pago/create-add', 'Admin\PagosController@store')->name('admin.pagos_add');      // Crear dato
    // Route::get('pago/{id}', 'Admin\PagosController@show')->name('admin.pagos_list_id');          // Mostrar por id
    // Route::get('pago/{user}/editar', 'Admin\PagosController@edit')->name('admin.pagos_edit');    // Form editar
    // Route::patch('pago/{id}', 'Admin\PagosController@update')->name('admin.pagos_edit_data');    // Update datos
}); 

Route::group(['prefix' => 'reporte'], function() {
    // Pagina
    Route::get('lista', 'Admin\ReporteController@index')->name('admin.report_list');                 // Listado
    Route::get('expediente', 'Admin\ReporteController@expediente')->name('admin.report_exp');                 // Listado

    Route::post('report/buscar', 'Admin\ReporteController@validaBusqueda')->name('admin.report_create_post');


    Route::get('page/create', 'Admin\ReporteController@create')->name('admin.front_create');       // Form View Create
    Route::post('page/create-add', 'Admin\ReporteController@store')->name('admin.front_add');      // Crear dato
    Route::get('page/{id}', 'Admin\ReporteController@show')->name('admin.front_list_id');          // Mostrar por id
    Route::get('page/{user}/editar', 'Admin\ReporteController@edit')->name('admin.front_edit');    // Form editar
    Route::patch('page/{id}', 'Admin\ReporteController@update')->name('admin.front_edit_data');    // Update datos
}); 


Route::group(['prefix' => 'reuniones'], function() {
    Route::get('lista', 'Admin\ReunionController@index')->name('admin.reunion_list');                 // Listado
    Route::get('reunion/create', 'Admin\ReunionController@create')->name('admin.reunion_create');       // Form View Create
    Route::post('reunion/create-add', 'Admin\ReunionController@store')->name('admin.reunion_add');      // Crear dato
    Route::get('reunion/{id}', 'Admin\ReunionController@show')->name('admin.reunion_list_id');          // Mostrar por id
    Route::get('reunion/{user}/editar', 'Admin\ReunionController@edit')->name('admin.reunion_edit');    // Form editar
    Route::patch('reunion/{id}', 'Admin\ReunionController@update')->name('admin.reunion_edit_data');    // Update datos
}); 

Route::get('volver',function(){
    return redirect()->back();
})->name('admin.back');