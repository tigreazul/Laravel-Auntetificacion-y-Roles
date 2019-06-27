<?php


Route::get('dashboard', 'AdminController@index')->name('admin.home');

Route::group(['prefix' => 'configuracion'], function() {
    Route::get('menu', 'Admin\MenuController@index')->name('admin.menu');
    Route::get('menu/modulo-add', 'Admin\MenuController@modulo_add')->name('admin.modulo_add');
    Route::post('menu/modulo-add', 'Admin\MenuController@store_modulo')->name('admin.modulo_add_store');
    Route::post('menu/{user}/editar', 'Admin\MenuController@update_modulo')->name('admin.modulo_update');
    Route::get('menu/{user}/editar', 'Admin\MenuController@edit_modulo')->name('admin.modulo_edit');

});
