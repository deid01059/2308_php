<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
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

Route::middleware('apiChkToken')->middleware('myUserValidation')->prefix('regist')->group(function() {
    Route::get('/{id}', [UserController::class, 'search']);
    Route::post('/', [UserController::class, 'insert']);
});

Route::middleware('apiChkToken')->middleware('myUserValidation')->post('/login', [UserController::class, 'login']);