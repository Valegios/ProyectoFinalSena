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
Route::resource('/administradors',AdministradorController::class);
Route::resource('/proveedors',ProveedorController::class);
Route::resource('/productos',ProductoController::class);
Route::resource('/compras',CompraController::class);
Route::resource('/vendedors',VendedorController::class);
Route::resource('/ventas',VentaController::class);