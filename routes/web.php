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


Route::get('/','IndexController@execute')->name('home');


// Route::resource('form', 'FormController1')->name('form');

Route::match(['get','post'],'form','FormController@execute')->name('form');



Route::get('list','ListController@execute')->name('list');

Route::get('page/{id}','PageController@execute')->name('page');


