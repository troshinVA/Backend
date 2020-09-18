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

// Route to main page
Route::get('/','IndexController@execute')->name('home');

// Route for form
Route::match(['get','post'],'form','FormController@execute')->name('form');

// Route to page with list of all members
Route::get('list','ListController@execute')->name('list');

// Route to page with description of thesis by {id} - speaker
Route::get('page/{id}','PageController@execute')->name('page');


