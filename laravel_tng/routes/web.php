<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('main');
});

// 유저쪽라우트
Route::get('/user/login', [UserController::class, 'loginget'])->name('user.login.get');
