<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetaProductController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\VentaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(VentaController::class)->group(function(){
    Route::get('venta', "index");
    Route::get('venta/{id}', "show");
    Route::post('venta/create', "create");
    Route::put('venta/update/{id}', "update");
    Route::put('venta/destroy/{id}', "destroy");
});

Route::controller(TrabajadorController::class)->group(function(){
    Route::get('trabajador', "index");
    Route::get('trabajador/{id}', "show");
    Route::post('trabajador/create', "create");
    Route::put('trabajador/update/{id}', "update");
    Route::put('trabajador/destroy/{id}', "destroy");
});

Route::controller(ClienteController::class)->group(function(){
    Route::get('cliente', "index");
    Route::get('cliente/{id}', "show");
    Route::post('cliente/create', "create");
    Route::put('cliente/update/{id}', "update");
    Route::put('cliente/destroy/{id}', "destroy");
});

Route::controller(ProductoController::class)->group(function(){
    Route::get('producto', "index");
    Route::get('producto/{id}', "show");
    Route::post('producto/create', "create");
    Route::put('producto/update/{id}', "update");
    Route::put('producto/destroy/{id}', "destroy");
});

Route::controller(DetaProductController::class)->group(function(){
    Route::get('detaProduct', "index");
    Route::get('detaProduct/{id}', "show");
    Route::post('detaProduct/create', "create");
    Route::put('detaProduct/update/{id}', "update");
    Route::put('detaProduct/destroy/{id}', "destroy");
});