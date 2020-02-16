<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
});

Route::group(['middleware' => 'jwt.auth'], function ($router) {
    Route::post('save-recipe', 'RecipeController@store');
    Route::post('create-recipe', 'RecipeController@create');
    Route::get('recipes', 'RecipeController@index');
});
