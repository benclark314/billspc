<?php

namespace App\Http\Controllers\ApiControllers;

use Illuminate\Http\Request;
use App\TrainerPokemon;
use App\MyPokemon;
use App\Pokemon;
use App\User;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Resources\Pokemon as PokemonResource;

class MyPokemonApiController extends Controller
{

    function __construct()
    {
        return $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      // $pokemon = Pokemon::orderBy('id','asc')->get();
      // $pokemon = Pokemon::orderBy('id','asc')->paginate(20);
      // return PokemonResource::collection($pokemon);

      $pokemon = $request->user()->pokemon;
      // $pokemon = $request()->user()->pokemon;
      return PokemonResource::collection($pokemon);
  }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pokeId)
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
      $contact=$request->user()->contacts()->create($request->all());
      return new ContactResource($contact);
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
      $poke = $request->user()->pokemon;
      // $pokemon = $request()->user()->pokemon;
      $pokemon = PokemonResource::collection($poke);


      if(! $pokemon->contains('id', $id))
      {
          return response()->json(['error'=>'Pokemon not found'],401);
      }
      return new PokemonResource(Pokemon::find($id)); //::find($id)
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
        if($request->user()->id !== $contact->user_id){
            return response()->json(['error'=>'Unauthorized action'],401);
        }
          $contact->update($request->all());
        return new ContactResource($contact);
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(request()->user()->id !== $contact->user_id){
           return response()->json(['error'=>'Unauthorized action'],401);
        }
        $contact=$contact->delete();
        return response()->json(null,200);
    }
}
