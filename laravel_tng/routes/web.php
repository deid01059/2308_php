<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('welcome');
});
Route::get('/main', function () {
    return view('welcome');
});
Route::get('/regist', function () {
    return view('welcome');
});
Route::get('/error', function(){
    return view('welcome');
});

Route::fallback(function() {
    return redirect('/error');
});
