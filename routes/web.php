<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\AutenticaController;


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

//Ruta para la vista de creación de productos
Route::get('/agregar-producto', [ProductoController::class, 'create'])->name('agregar-producto');

Route::get('/categorias/proveedor', [ProveedorController::class, 'index'])->name('categorias.proveedor.index');


Route::post('/administrador/storeProducto', [AdministradorController::class, 'storeProducto'])->name('administrador.storeProducto');

Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');
Route::post('/administrador/storeProveedor', [AdministradorController::class, 'storeProveedor'])->name('administrador.storeProveedor');


//Ruta para la vista de una lista de todos los productos que se tienen en la base de datos
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/categorias/administrador', [AdministradorController::class, 'index'])->name('categorias.administrador.index');
Route::get('/categorias/vendedor', [VendedorController::class, 'index'])->name('categorias.vendedor.index');



Route::put('/productos/{id}', [AdministradorController::class, 'updateProducto'])->name('administrador.updateProducto');


//Rutas para mostrar las listas con los datos
Route::get('/administradores', [AdministradorController::class, 'index'])->name('administradores.index');
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/categorias/productos', [ProductoController::class, 'index'])->name('categorias.productos.index');
Route::get('/vendedor', [VendedorController::class, 'index'])->name('vendedor.index');

//Ruta para mostrar los formularios de creacion
Route::get('/vendedor/create', [VendedorController::class, 'create'])->name('vendedor.create');
Route::get('/proveedor/create', [ProveedorController::class, 'create'])->name('proveedor.create');
Route::get('/administrador/create', [AdministradorController::class, 'create'])->name('administrador.create');

//Ruta para almacenar nuevos datos
Route::post('/administrador/storeVendedor', [AdministradorController::class, 'storeVendedor'])->name('administrador.storeVendedor');
Route::post('/administrador', [AdministradorController::class, 'storeAdministrador'])->name('administrador.store');


//Ruta para mostrar los formularios de edicion
Route::get('/administradores/{id}/edit', [AdministradorController::class, 'editAdministrador'])->name('administrador.editAdministrador'); //pendiente de edit en administrador controller
Route::get('/productos/{producto}/edit', [AdministradorController::class, 'editProducto'])->name('productos.edit');
Route::get('/proveedor/{id}/edit', [AdministradorController::class, 'editProveedor'])->name('administrador.editProveedor');
Route::get('/vendedor/{id}/edit', [AdministradorController::class, 'editVendedor'])->name('administrador.editVendedor');


//Ruta para actualizar informacion en la base de datos
Route::put('/administradores/{id}', [AdministradorController::class, 'updateAdministrador'])->name('administradores.update');
Route::put('/productos/{id}/update', [AdministradorController::class, 'updateProducto'])->name('administrador.updateProducto');
Route::put('/proveedor/{id}/update', [AdministradorController::class, 'updateProveedor'])->name('administrador.updateProveedor');
Route::put('/vendedores/{id}/update', [AdministradorController::class, 'updateVendedor'])->name('administrador.updateVendedor');


//Ruta para eliminar informacion en la base de datos
Route::delete('/administradores/{administrador}', [AdministradorController::class, 'destroyAdministrador'])->name('administrador.destroyAdministrador');
Route::delete('/productos/{id}/destroy', [AdministradorController::class, 'destroyProducto'])->name('administrador.destroyProducto');
Route::delete('/proveedor/{id}/destroy', [AdministradorController::class, 'destroyProveedor'])->name('administrador.destroyProveedor');
Route::delete('/vendedores/{id}/destroy', [AdministradorController::class, 'destroyVendedor'])->name('administrador.destroyVendedor');

//Ruta de registro de usuarios
route::view('/registro', 'categorias.autenticacion.registro')->name('registro');
route::post('/registro', [AutenticaController::class, 'registro'])->name('registro.store');

//Ruta de login de usuarios
route::view('/login', 'categorias.autenticacion.login')->name('login');
route::post('/login', [AutenticaController::class, 'login'])->name('login.store');
//Ruta de logout del usuario
route::post('/logout', [AutenticaController::class, 'logout'])->name('logout');
//Ruta para editar el perfil de usuario
Route::get('/perfil', [AutenticaController::class, 'perfil'])->name('perfil');
Route::put('/perfil/{user}',[AutenticaController::class,'perfilUpdate'])->name('perfil.update');
//Ruta para cambiar la contraseña de usuario
Route::put('/perfil/password/{user}',[AutenticaController::class,'passwordUpdate'])->name('password.update');