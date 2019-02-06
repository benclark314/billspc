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

//Route::get('pokemonlist', 'PagesController@getPokemonList')->name('pages.pokemonlist');

Route::resource('pokemon', 'PokemonController');
//Route::get('/users/{id}/{name}', function($id, $name){
//    return 'This is user '.$name.' with an id of '.$id;
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
