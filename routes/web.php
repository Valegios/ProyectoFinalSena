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
Route::get('/crear-administrador', [AdministradorController::class, 'create'])->name('crear-administrador');
//Ruta para la vista de creación de vendedores
Route::get('/crear-vendedor', [VendedorController::class, 'create'])->name('crear-vendedor');
//Ruta para la vista de creación de productos
Route::get('/agregar-producto', [ProductoController::class, 'create'])->name('agregar-producto');

Route::post('/administradors/store-producto', [AdministradorController::class, 'storeProducto'])->name('administradors.store-producto');
Route::post('/administradors/store-vendedor', [AdministradorController::class, 'storeVendedor'])->name('administradors.store-vendedor');
