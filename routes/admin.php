<?php


Route::get('dashboard', 'AdminController@index')->name('admin.home');
Route::get('menu', 'Admin\MenuController@index')->name('admin.menu');