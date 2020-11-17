<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\CarouselController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\admin\InfoController;

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


Route::get('/test', [\App\Http\Controllers\TestController::class, 'test']);


Route::group(["middleware" => "auth"], function () {
    Route::post('/upload-file', [FileController::class, 'uploadFile']);
    Route::delete('/delete-file', [FileController::class, 'deleteFile']);
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('/carousel', CarouselController::class);
        Route::get('/me', [UserController::class, 'me']);
        Route::put('/info', [InfoController::class, 'update']);
        Route::get('/info', [InfoController::class, 'show']);
    });
});

http://192.168.45.25/storage/files/XhTsrJIKXVN2I9YepqGUFVhOpntRFBkqcvGcdogF.jpeg
