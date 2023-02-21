<?php

use App\Http\Controllers\Api\PersonajeController;
use App\Http\Controllers\Api\UsuarioController;
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

Route::controller(PersonajeController::class)->group(function (){
    Route::get('/personajes', 'index');
    Route::post('/personaje', 'store');
    Route::get('/personaje/{id}', 'show');
    Route::put('/personaje/{id}', 'update');
    Route::delete('/personaje/{id}', 'destroy');
    Route::put('/nivel/{id}', 'subirNivel');
});
Route::controller(UsuarioController::class)->group(function (){
    Route::post('/register', 'store');
    Route::post('/login', 'login');
    Route::get('/usuarios', 'index');
    Route::get('/usuario/{id}', 'show');
});
