<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'IndexController@index')->name('main');
Route::prefix('event/{eventId}')->group(function () {
    Route::get('/', 'EventController@execute')->name('event');
    Route::get('page/{pageId}', 'PageController@execute')->name('page');
    Route::get('list', 'ListController@execute')->name('list');
    Route::get('form', 'FormController@getForm')->name('form');
    Route::post('form', 'FormController@postForm')->name('form');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

