<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/user', [UserController::class, 'store']);
Route::middleware(['apiJWT'])->group(function () {
    Route::get('produtos', [ProductController::class, 'index']);
    // List single artigo
    Route::get('produtos/{id}', [ProductController::class, 'show']);
    // Create new produtos
    Route::post('/cadastrar/produto', [ProductController::class, 'store']);
    // Update produtos
    Route::put('produtos/{id}', [ProductController::class, 'update']);
    // Delete produtos
    Route::delete('produtos/{id}', [ProductController::class,'destroy']);
});