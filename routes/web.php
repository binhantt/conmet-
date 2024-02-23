<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('comment')->group(function(){
    Route::get('/','App\Http\Controllers\Comment@index')->name('index');
    Route::post('/post','App\Http\Controllers\Comment@post')->name('post');
    Route::delete('/delete-{id}','App\Http\Controllers\Comment@delete')->name('delete');
});
