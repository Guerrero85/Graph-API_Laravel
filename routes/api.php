<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Url;

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

//Route::apiResource('/nodo', App\Http\Controllers\Api\NodoController::class);
Route::get('nodo', [App\Http\Controllers\Api\NodoController::class, 'index']);
Route::post('nodo', [App\Http\Controllers\Api\NodoController::class, 'store']);
Route::delete('nodo/{id}', [App\Http\Controllers\Api\NodoController::class, 'destroy']);
