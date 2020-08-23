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

Route::get('/', 'IndexController')->name('index');
Route::get('/soar', 'SoarController@index')->name('soar.index');
Route::post('/soar', 'SoarController@list')->name('soar.post');

Route::get("/search","SearchController@search")->name('search');

