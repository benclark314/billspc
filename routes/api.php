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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//List Pokemon
Route::get('pokemon', 'ApiControllers\\PokemonApiController@index');

//Return single pokemon
Route::get('pokemon/{id}', 'ApiControllers\\PokemonApiController@show');

//Create a new pokemon
Route::post('pokemon', 'ApiControllers\\PokemonApiController@store');

//Update a pokemon
Route::put('pokemon', 'ApiControllers\\PokemonApiController@store');

//Delete a pokemon
Route::delete('pokemon/{id}', 'ApiControllers\\PokemonApiController@destroy');
