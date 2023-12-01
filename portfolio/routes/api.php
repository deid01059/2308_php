<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TalkController;


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

Route::middleware('apiChkToken')->middleware('myValidation')->prefix('regist')->group(function() {
    Route::get('/{id}', [UserController::class, 'search']);
    Route::post('/', [UserController::class, 'insert']);
});

Route::middleware('apiChkToken')->middleware('myValidation')->post('/login', [UserController::class, 'login']);

Route::middleware('apiChkToken')->middleware('myValidation')->prefix('community')->group(function() {
    Route::get('/', [TalkController::class, 'search']);
    Route::post('/', [TalkController::class, 'insert']);
});

Route::middleware('apiChkToken')->middleware('myValidation')->prefix('shop')->group(function() {
    Route::get('/{b_no}', [BoardController::class, 'search']);
    Route::post('/', [BoardController::class, 'insert']);
});