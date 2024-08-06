<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

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

// Rutas de autenticación
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Rutas para los recursos principales con autenticación
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('carts', CartController::class);
    Route::apiResource('contacts', ContactController::class);

    // Ruta para obtener el usuario autenticado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

// Ruta de prueba (puedes eliminarla si no es necesaria)
Route::get('/test', function () {
    $users = \App\Models\User::all();
    return response()->json($users);
});
