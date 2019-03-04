<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pokemon;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$pokemon = Pokemon::all();
        //$pokemon = Pokemon::orderBy('id','asc')->take(1)->get();
        //return Pokemon::where('genus', 'Seed Pokemon')->get();
        //$pokemon = DB::select('SELECT * FROM pokemon');

        $pokemon = Pokemon::orderBy('id','asc')->get();
        $pokemon = Pokemon::orderBy('id','asc')->paginate(20);
        return view('pokemon.index')->with('pokemon', $pokemon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //This method will parse a CSV file and place it in the pokemon table.
     // One way to run this method:
     // 1)Place the following code in the "create" function of this class:
     //   return view('pokemon.index');
     // 2)Place the following interface code in the pokemon.index file.
     //   @extends('layouts.app')
     //   @section('content')
     //     <form action="{{url('/pokemon')}}" method="post" enctype="multipart/form-data">
     //     {{csrf_field()}}
     //         <div class="form-group">
     //             <label for="upload-file">Upload</label>
     //             <input type="file" name="upload-file" class="form-control">
     //         </div>
     //         <input class="btn btn-success" type="submit" value="Upload File" name="submit">
     //     </form>
     //   @endsection
     // 3)Navigate to the /pokemon page and upload the csv file.
    public function store(Request $request)
    {
      //get file
      $upload=$request->file('upload-file');
      $filePath=$upload->getRealPath();

      //open and read
      $file=fopen($filePath, 'r');
      $header= fgetcsv($file);
      //dd($header);
      $escapedHeader=[];
      //validate
      foreach ($header as $key => $value) {
          $lheader=strtolower($value);
          $escapedItem=preg_replace('/[^a-z]/', '', $lheader);
          //dd($escapedItem);
          array_push($escapedHeader, $escapedItem);
      } //dd($escapedHeader);

      //looping through other columns

      while($columns=fgetcsv($file, 0, ","))
      //while($columns=fgetcsv( $file [, 0 [, "," [, '"' [, "\\" ]]]] ))
      {
          if($columns[0]=="")
          {
              continue;
          }
          //trim data
          // foreach ($columns as $key => &$value) {
          //     $value=preg_replace('/\D/','',$value);
          // }
          // dd($value);

         $data= array_combine($escapedHeader, $columns);

         // setting type
         foreach ($data as $key => &$value) {
           // if($key=="id")
           // {
           //     $value=(integer)$value;
           // }
           // if($key=="height")
           // {
           //     $value=(float)$value;
           // }
           // if($key=="weight")
           // {
           //     $value=(float)$value;
           // }
           //$value=($key=="id" || $key=="month")?(integer)$value: (float)$value;
         }

         // Table update
         $id=$data['id'];
         $pokemonName=$data['name'];
         $height=$data['height'];
         $weight=$data['weight'];
         $genus=$data['genus'];
         $description=$data['description'];
         //$created_at=$data['created_at'];
         //$updated_at=$data['updated_at'];

         //$budget= Budget::firstOrNew(['id'=>$id,'month'=>$month]);
         $pokemon= Pokemon::firstOrNew(['id'=>$id]);
         $pokemon->id=$id;
         $pokemon->pokemonName=$pokemonName;
         $pokemon->height=$height;
         $pokemon->weight=$weight;
         $pokemon->genus=$genus;
         $pokemon->description=$description;
         //$pokemon->created_at=$created_at;
         //$pokemon->updated_at=$updated_at;
         $pokemon->save();
      }
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
        $poke = Pokemon::find($id);
        return view('pokemon.show')->with('pokemon', $poke);

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
