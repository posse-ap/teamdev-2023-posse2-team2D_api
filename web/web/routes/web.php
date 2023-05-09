<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BookmarkController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/homepage', 'App\Http\Controllers\ItemController@index')->name('item');
Route::get('/item/{id}', 'App\Http\Controllers\ItemController@getItemWithRelations')->name('item');

Route::post('/bookmarks/{id}', 'App\Http\Controllers\BookmarkController@bookmark')->name('bookmark');
Route::delete('/bookmarks/{id}', 'App\Http\Controllers\BookmarkController@unbookmark')->name('unbookmark');

