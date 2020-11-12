<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\CarouselController;
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

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::group(['middleware' => 'auth'], function () {
   Route::post('/upload-file', [\App\Http\Controllers\FileController::class, 'uploadFile']);
});

Route::group(["middleware" => 'auth', "prefix" => 'admin'], function () {
    Route::resource('/carousel', CarouselController::class);
    Route::get('/me', [UserController::class, 'me']);

});
