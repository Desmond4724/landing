<?php

use App\Http\Controllers\api\admin\EmployeeController;
use App\Http\Controllers\api\admin\FeatureController;
use App\Http\Controllers\api\admin\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\admin\UserController;
use App\Http\Controllers\api\admin\CarouselController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\api\admin\InfoController;
use App\Http\Controllers\api\admin\PortfolioController;
use App\Http\Controllers\api\admin\QuestionController;
use App\Http\Controllers\api\site\IndexController;

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
        Route::resource('/features', FeatureController::class);
        Route::resource('/portfolios', PortfolioController::class);
        Route::get('/me', [UserController::class, 'me']);
        Route::put('/info', [InfoController::class, 'update']);
        Route::get('/info', [InfoController::class, 'show']);
        Route::resource('/services', ServiceController::class);
        Route::resource('/questions', QuestionController::class);
        Route::resource('/employees', EmployeeController::class);
    });
});

Route::get('/index', [IndexController::class, 'index']);


Route::fallback(function () {
    return response()->json([
        "message" => "Api not found"
    ]);
});

