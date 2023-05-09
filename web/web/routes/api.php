<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\BookmarkController;

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

Route::get('/homepage', 'App\Http\Controllers\ItemController@index')->name('item');
Route::get('/item/{id}', 'App\Http\Controllers\ItemController@getItemWithRelations')->name('item');

Route::post('/bookmarks/{id}', 'App\Http\Controllers\BookmarkController@bookmark')->name('bookmark');
Route::delete('/bookmarks/{id}', 'App\Http\Controllers\BookmarkController@unbookmark')->name('unbookmark');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
