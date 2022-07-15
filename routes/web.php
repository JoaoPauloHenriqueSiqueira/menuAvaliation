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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/item', [\App\Http\Controllers\ItemController::class, 'store']);
Route::patch('/item/{item}', [\App\Http\Controllers\ItemController::class, 'update']);
Route::delete('/item/{item}', [\App\Http\Controllers\ItemController::class, 'destroy']);


Route::get('upload', '\App\Http\Controllers\FileController@index');
Route::post('store', '\App\Http\Controllers\FileController@store');