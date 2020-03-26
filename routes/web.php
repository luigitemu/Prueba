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

Route::get('/', 'Proveedores@index')->name('inicio');
Route::get('/Proveedores', 'Proveedores@Proveedores')->name('Proveedores');

Route::get('/Proveedores/{Proveedor}', 'Proveedores@Detalle')->where('Proveedor', '\d+')
    ->name('ProveedoresDetalle'); // ruta para enlazar el modelo con la peticion url

Route::get('/Proveedores2/{ProveedorId}', 'Proveedores@Detalle2')->where('ProveedorId', '\d+')
    ->name('ProveedoresDetalle2');

Route::get('/Proveedores/Nuevo', 'Proveedores@Nuevo')->name('ProveedoresNuevo');
Route::post('/Proveedores/Crear', 'Proveedores@Crear')->name('ProveedoresCrear');
Route::get('/Proveedores/{Proveedor}/Editar', 'Proveedores@Editar')->where('Proveedor', '\d+')
    ->name('ProveedoresEditar');
Route::put('/Proveedores/{Proveedor}', 'Proveedores@Actualizar')->where('Proveedor', '\d+')
    ->name('ProveedoresActualizar');
Route::delete('/Proveedores/{Proveedor}', 'Proveedores@Borrar')->where('Proveedor', '\d+')
    ->name('ProveedoresEliminar');
// read
Route::get('/Marcas', 'Marcas@Index')->name('Marcas');

Route::get('/Marcas/{Marca}', 'Marcas@show' )->where('Marca' , '\d+')->name('MarcasDetalle');

// Edit
Route::get('/Marcas/{Marca}/Editar', 'Marcas@edit')->where('Marcas', '\d+')
    ->name('MarcasEditar');
//Update
Route::put('/Marcas/{Marca}', 'Marcas@update')->where('Marca', '\d+')
    ->name('MarcasActualizar');

// Delete
Route::delete('/Marcas/{Marca}', 'Marcas@destroy')->where('Marca', '\d+')
    ->name('MarcasEliminar');
//Create
Route::get('Marcas/Nuevo', 'Marcas@create')->name('MarcasNuevo');

Route::post('/Marcas/Crear', 'Marcas@store')->name('MarcasCrear');