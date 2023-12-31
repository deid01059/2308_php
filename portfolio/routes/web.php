<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    return view('welcome');
});
Route::get('/login',function(){
    return view('welcome');
});
Route::get('/main',function(){
    return view('welcome');
});
Route::get('/regist',function(){
    return view('welcome');
});
Route::get('/info',function(){
    return view('welcome');
});
Route::get('/community',function(){
    return view('welcome');
});
Route::get('/shop',function(){
    return view('welcome');
});

Route::fallback(function(){
    return response()->json([
        'code' => 'E03'
    ], 404);
});