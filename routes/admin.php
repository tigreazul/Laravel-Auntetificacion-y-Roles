<?php


Route::get('dashboard', 'AdminController@index')->name('admin.home');

Route::group(['prefix' => 'configuracion'], function() {
    Route::get('menu', 'Admin\MenuController@index')->name('admin.menu');
    
    Route::get('menu/modulo-add', 'Admin\MenuController@modulo_add')->name('admin.modulo_add');
    Route::get('menu/get-page/{id}', 'Admin\MenuController@get_page')->name('admin.get_page');

    Route::post('menu/modulo-add', 'Admin\MenuController@store_modulo')->name('admin.modulo_add_store');
    Route::get('menu/{user}/editar', 'Admin\MenuController@edit_modulo')->name('admin.modulo_edit');
    Route::post('menu/{user}/update', 'Admin\MenuController@update_modulo')->name('admin.modulo_update');
    Route::post('delete/module/{id}', 'Admin\MenuController@delete_modulo')->name('admin.delete_modulo');

    Route::post('menu/page-add', 'Admin\MenuController@store_pagina')->name('admin.page_add');

});


Route::get('volver',function(){
    return redirect()->back();
})->name('admin.back');