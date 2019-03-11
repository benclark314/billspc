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

Route::get('/', 'PagesController@getIndex')->name('pages.index');;

Route::get('/about', 'PagesController@getAbout')->name('pages.about');

Route::get('contact', 'ContactController@showForm')->name('contact.show');

Route::resource('mypokemon', 'MyPokemonController')->except([
    'create'
]);

Route::get('mypokemon/create/{pokeId}', 'MyPokemonController@create');

Route::get('MyPokemonController/json', 'MyPokemonController@showJSON')->name('mypokemon.showJSON');

Route::resource('trainerPokemon', 'TrainerPokemonController')->except([
    'create'
]);

Route::get('trainerPokemonController/{pokeId}', 'TrainerPokemonController@create');

Route::resource('pokemon', 'PokemonController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
