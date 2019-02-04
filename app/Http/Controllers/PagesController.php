<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //Get index page(/)
    public function getIndex(){
      return view('pages.index');
    }

    //Get index page(/)
    public function getAbout(){
      $title = 'Contact Page';
      return view('pages.about', compact('title')); //, compact('title'
    }

    public function getPokemonList(){
      //$title = 'Pokemon list';
      $data = array(
        'title' => 'Pokemon List',
        'pokemon' => ['Charmander', 'Bulbasaur', 'Ivysaur']
      );
      return view('pages.pokemonlist')->with($data); //, compact('title'
    }



    //public function getPokemonList(){
      //$title = 'Pokemon list';
      //$data = array(
        //'title' => 'Services'
      //);
      //return view('pages.pokemonlist', compact('title')); //, compact('title'
    //}
}
