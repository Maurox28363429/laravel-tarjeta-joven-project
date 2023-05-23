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
Route::get('yappy',function(){
    return view('yappy');
});
Route::get('/pagosbg.php',function(){
    return 10;
});

Route::get('/', function () {
    //return view('yappy');
    return view('welcome');
});
