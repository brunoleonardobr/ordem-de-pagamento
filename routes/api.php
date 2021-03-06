<?php

use App\Http\Controllers\OrdensPagamentoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/pagamentos/criar', [OrdensPagamentoController::class,'criar']);

Route::get('/pagamentos/{id}', [OrdensPagamentoController::class,'buscar']);

Route::get('/pagamentos', [OrdensPagamentoController::class,'listar']);