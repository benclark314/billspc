<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyPokemon;
use App\Pokemon;
use App\User;

class MyPokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $mypokemon = MyPokemon::orderBy('id','asc')->get();
      // $mypokemon = MyPokemon::orderBy('id','asc')->paginate(20);
      // return view('pokemon.mypokemon')->with('mypokemon', $mypokemon);

      //->where([['trainerId', '=', auth()->user()->id],['pokemonId', '=', $pokeId],])
      $user_id = auth()->user()->id;
      $user = User::find($user_id);
      // $trainerId = auth()->user()->id;
      // $mypokemon = Pokemon::where('votes', '=', 100)->orderBy('id','asc')->get();
      // $mypokemon = MyPokemon::orderBy('id','asc')->paginate(20);
      return view('pokemon.mypokemon')->with('mypokemon', $user->pokemon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $poke = Pokemon::find($id);
      return view('pokemon.showmypokemon')->with('poke', $poke);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
