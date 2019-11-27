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
    return view('layouts.admin.index');
});

Auth::routes(); 

Route::get('/categorias', 'CategoriaController@index')->name('categoria.index');
Route::get('/categorias/create', 'CategoriaController@create')->name('categoria.create');
Route::post('/categorias/store', 'CategoriaController@store')->name('categoria.store');
Route::get('/categorias/edit/{id}', 'CategoriaController@edit')->name('categoria.edit');
Route::post('/categorias/update/{id}', 'CategoriaController@update')->name('categoria.update');
Route::post('/categorias/delete/{id}', 'CategoriaController@destroy')->name('categoria.delete');

Route::get('/proveedores', 'ProveedorController@index')->name('proveedor.index');
Route::get('/proveedores/create', 'ProveedorController@create')->name('proveedor.create');
Route::post('/proveedores/store', 'ProveedorController@store')->name('proveedor.store');
Route::get('/proveedores/edit/{id}', 'ProveedorController@edit')->name('proveedor.edit');
Route::post('/proveedores/update/{id}', 'ProveedorController@update')->name('proveedor.update');
Route::post('/proveedores/delete/{id}', 'ProveedorController@destroy')->name('proveedor.delete');

Route::get('/productos', 'ProductoController@index')->name('producto.index');
Route::get('/productos/create', 'ProductoController@create')->name('producto.create');
Route::post('/productos/store', 'ProductoController@store')->name('producto.store');
Route::get('/productos/edit/{id}', 'ProductoController@edit')->name('producto.edit');
Route::post('/productos/update/{id}', 'ProductoController@update')->name('producto.update');
Route::post('/productos/delete/{id}', 'ProductoController@destroy')->name('producto.delete');