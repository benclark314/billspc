<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyPokemon extends Model
{
    //Table Name
    protected $table = 'my_pokemons';

    //Primary Key
    public $primaryKey = 'id';

    //Timestamps
    public $timestamps = true;

    protected $fillable=['id', 'pokemonName', 'pokemonTypes', 'height', 'weight', 'abilities', 'egg_groups', 'stats', 'genus', 'description'];
}
