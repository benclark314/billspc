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








    //
    //
    // public $successStatus = 200;
    // /**
    //  * login api
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function login()
    // {
    //     if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
    //         $user = Auth::user();
    //         $success['token'] =  $user->createToken('MyApp')-> accessToken;
    //         return response()->json(['success' => $success], $this-> successStatus);
    //     }
    //     else{
    //         return response()->json(['error'=>'Unauthorised'], 401);
    //     }
    // }
    //
    // /**
    //  * Register api
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'c_password' => 'required|same:password',
    //     ]);
    //
    //     if ($validator->fails()) {
    //         return response()->json(['error'=>$validator->errors()], 401);
    //     }
    //
    //     $input = $request->all();
    //     $input['password'] = bcrypt($input['password']);
    //     $user = User::create($input);
    //     $success['token'] =  $user->createToken('MyApp')-> accessToken;
    //     $success['name'] =  $user->name;
    //     return response()->json(['success'=>$success], $this-> successStatus);
    // }
    //
    // /**
    //  * details api
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function details()
    // {
    //     $user = Auth::user();
    //     return response()->json(['success' => $user], $this-> successStatus);
    // }
    //











}
