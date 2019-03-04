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
        $pokemon = Pokemon::orderBy('id','asc')->paginate(1);
        return view('pokemon.index')->with('pokemon', $pokemon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pokemon.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    //This method is undergoing experimentation.
    //It is supposed to upload the pokedex.csv file.
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
          foreach ($columns as $key => &$value) {
              $value=preg_replace('/\D/','',$value);
          }
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









        // public $data = array();
        // public $int = 0;
        //
        //
        //$pokemon = DB::select('SELECT * FROM pokemon');
        //Schema::rename('pokemon', 'nomekop');
              //
              // //Schema::create('pokemo1', Blueprint($table){
              // //C:/xampp/htdocs/BillsPC/
              // $filename = 'public/extras/pokedex1.csv';
              // $delimiter = ',';
              // if (!file_exists($filename) || !is_readable($filename)){
              //   echo 'file WWAAAAAAAAAAAAAAAAAAAAAAAASNT FOUND';
              //   return false;
              // }
              // $header = null;
              //
              // //Put CSV into array
              // if (($handle = fopen($filename, 'r')) !== false)
              // {
              //   echo 'file WWAAAAAAAAAAAAAAAAAAAAAAAAS FOUND!!!!!!!!!!!';
              //   while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
              //   {
              //     if (!$header)
              //         $header = $row;
              //     else
              //         $data[] = array_combine($header, $row);
              //   }
              //   fclose($handle);
              // }
              //
              //
              //
              // //Create a Pokemon table
              // // $sql = "CREATE TABLE Pokemo1 (
              // // id INT(4) UNSIGNED PRIMARY KEY,
              // // name VARCHAR(500) NOT NULL,
              // // types VARCHAR(500) NOT NULL,
              // // height FLOAT NOT NULL,
              // // weight FLOAT NOT NULL,
              // // abilities VARCHAR(500) NOT NULL,
              // // egg_groups VARCHAR(500) NOT NULL,
              // // stats VARCHAR(500) NOT NULL,
              // // genus NVARCHAR(500) NOT NULL,
              // // description VARCHAR(500) NOT NULL
              // // )";
              // // DB::statement($sql);
              //
              //
              // for ($i = 0; $i < count($data); $i ++)
              // {
              //   //dd($data);
              //   //$table->increments($data[$i]);
              //   $int = $i;
              //   Schema::create('pokemon', function (Blueprint $table) {
              //
              //   //dd($this->data);
              //   //$temp = $this->data[$this->int];
              //
              //   $table->id($this->data["id"]);
              //   $table->string("2");
              //   $table->string($temp);
              //   $table->string($data[$i]);
              //   $table->string($data[$i]);
              //   $table->string($data[$i]);
              //   $table->string($data[$i]);
              //   $table->string($data[$i]);
              //   $table->string($data[$i]);
              //   $table->string($data[$i]);
              //   $table->string($data[$i]);
              //   });
              //   DB::table('pokemo1')->insert($data[$i]);
              // }
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
