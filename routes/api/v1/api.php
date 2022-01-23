<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/user')->group(function(){

    Route::post('/login', [LoginController::class, 'login']);

});

Route::prefix('/book')->group(function(){

    Route::get('/all', [BookController::class, 'index']);
    Route::post('/store', [BookController::class, 'store'])->middleware('auth:api');
    Route::get('/show/{id}', [BookController::class, 'show']);
    Route::put('/update/{id}', [BookController::class, 'update'])->middleware('auth:api');
    Route::delete('/delete/{id}', [BookController::class, 'destroy'])->middleware('auth:api');
    Route::post('/recomended', [BookController::class, 'indexRandom']);
});