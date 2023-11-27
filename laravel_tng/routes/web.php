<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BoardController;

Route::get('/', function () {
    return redirect('/main');
});
Route::get('/main', [BoardController::class, 'mainget']);


Route::get('/login', function () {
    return view('welcome');
});

Route::get('/regist', function () {
    return view('welcome');
});
Route::get('/error', [BoardController::class, 'error']);

Route::fallback(function() {
    return redirect('/error');
});


Route::get('/board', [BoardController::class, 'boardget']);
