<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrainerPokemon;
use App\MyPokemon;
use App\Pokemon;
use DB;
//use App\Http\Controllers\Auth;

class TrainerPokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('contact.form');
        $mypokemon = TrainerPokemon::orderBy('id','asc')->get();
        $mypokemon = TrainerPokemon::orderBy('id','asc')->paginate(20);
        return view('pokemon.mypokemon')->with('mypokemon', $mypokemon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pokeId)
    {
      $pokemon = Pokemon::find($pokeId);

      if(DB::table('trainer_pokemon')->where([['trainerId', '=', auth()->user()->id],['pokemonId', '=', $pokeId],])->exists()){
          return view('pokemon.added', ['pokemon' => $pokemon], ['caught' => true]);
      }
      else {
        $trainerPokemon = new TrainerPokemon;
        $trainerPokemon->trainerId = auth()->user()->id;
        $trainerPokemon->pokemonId = $pokeId;
        $trainerPokemon->save();
        return view('pokemon.added', ['pokemon' => $pokemon], ['caught' => false]);
      }
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
      // return Pokemon::find($id);
      $poke = TrainerPokemon::find($trainerId);
      return view('pokemon.mypokemon')->with('poke', $poke);
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
