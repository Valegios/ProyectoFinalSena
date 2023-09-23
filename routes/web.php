<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\VentaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome')->name('inicio');
Route::resource('/administradors', AdministradorController::class);
Route::resource('/proveedors', ProveedorController::class);
Route::resource('/productos', ProductoController::class);
Route::resource('/compras', CompraController::class);
Route::resource('/vendedors', VendedorController::class);
Route::resource('/ventas', VentaController::class);

//Ruta para la vista de creación de administradores
//Route::get('/crear-administrador', [AdministradorController::class, 'create'])->name('crear-administrador');


//Ruta para la vista de creación de productos
Route::get('/agregar-producto', [ProductoController::class, 'create'])->name('agregar-producto');

Route::get('/categorias/proveedor', [ProveedorController::class, 'index'])->name('categorias.proveedor.index');


Route::post('/administrador/storeProducto', [AdministradorController::class, 'storeProducto'])->name('administrador.storeProducto');
Route::post('/administrador/storeVendedor', [AdministradorController::class, 'storeVendedor'])->name('administrador.storeVendedor');
Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');
Route::post('/administrador/storeProveedor', [AdministradorController::class, 'storeProveedor'])->name('administrador.storeProveedor');

//Ruta para la creacion de nuevos productos
//Route::post('/store-Producto', [AdministradorController::class, 'storeProducto'])->name('productos.store');


//Ruta para la vista de una lista de todos los productos que se tienen en la base de datos
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/categorias/administrador', [AdministradorController::class, 'index'])->name('categorias.administrador.index');



Route::put('/productos/{id}', [AdministradorController::class, 'updateProducto'])->name('administrador.updateProducto');


//Rutas para mostrar las listas con los datos
Route::get('/administradores', [AdministradorController::class, 'index'])->name('administrador.index');
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/categorias/productos', [ProductoController::class, 'index'])->name('categorias.productos.index');
Route::get('/vendedor', 'VendedorController@index')->name('vendedor.index');

//Ruta para mostrar los formularios de creacion
Route::get('/crear-vendedor', 'VendedorController@create')->name('crear-vendedor');
Route::get('/proveedor/create', [ProveedorController::class, 'create'])->name('proveedor.create');
Route::get('/administrador/create', [AdministradorController::class, 'create'])->name('administrador.create');

//Ruta para almacenar nuevos datos
Route::post('/administrador/storeVendedor', 'AdministradorController@storeVendedor')->name('administrador.storeVendedor');
Route::post('/administrador', [AdministradorController::class, 'storeAdministrador'])->name('administrador.store');


//Ruta para mostrar los formularios de edicion
Route::get('/administradores/{id}/edit', [AdministradorController::class, 'edit'])->name('administradores.edit'); //pendiente de edit en administrador controller
Route::get('/productos/{producto}/edit', [AdministradorController::class, 'editProducto'])->name('productos.edit');
Route::get('/proveedor/{id}/edit', [AdministradorController::class, 'editProveedor'])->name('administrador.editProveedor');

//Ruta para actualizar informacion en la base de datos
Route::put('/productos/{id}/update', [AdministradorController::class, 'updateProducto'])->name('administrador.updateProducto');
Route::put('/proveedor/{id}/update', [AdministradorController::class, 'updateProveedor'])->name('administrador.updateProveedor');


//Ruta para eliminar informacion en la base de datos
Route::delete('/administradores/{id}', [AdministradorController::class, 'destroy'])->name('administradores.destroy'); //pendiente de destroy en administrador controller
Route::delete('/productos/{id}/destroy', [AdministradorController::class, 'destroyProducto'])->name('administrador.destroyProducto');
Route::delete('/proveedor/{id}/destroy', [AdministradorController::class, 'destroyProveedor'])->name('administrador.destroyProveedor');
