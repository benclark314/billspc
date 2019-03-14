<?php

namespace App\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pokemon;
use App\Http\Resources\Pokemon as PokemonResource;
use App\Http\Controllers\Controller;

class PokemonApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pokemon = Pokemon::orderBy('id','asc')->get();
        $pokemon = Pokemon::orderBy('id','asc')->paginate(20);
        return PokemonResource::collection($pokemon);
    }

    public function show($id)
    {
        // return Pokemon::find($id);
        $poke = Pokemon::find($id);
        return new PokemonResource($poke);
    }

    public function store($id)
    {
        // return Pokemon::find($id);
    }

    public function destroy($id)
    {
        // return Pokemon::find($id);
    }

}
