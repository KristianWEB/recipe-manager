<?php

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

// Route::get('/recipes', 'RecipeController@index');
// Route::get('/storage', 'StorageController@index')->middleware('auth');
// Route::get('/account', 'AccountController@index')->middleware('auth');

// Route::post('/recipes', 'RecipeController@store')->middleware('auth');

// Route::post('/search-recipes', 'SearchRecipesController@store');


// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();


Route::get('/{any}', function () {
    return view('main');
})->where('any', '.*');
