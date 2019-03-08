<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    //Table Name
    protected $table = 'pokemon';

    //Primary Key
    public $primaryKey = 'id';

    //Timestamps
    public $timestamps = true;

    protected $fillable=['id', 'pokemonName', 'pokemonTypes', 'height', 'weight', 'abilities', 'egg_groups', 'stats', 'genus', 'description'];



    public function trainerPokemon()
    {
        return $this->belongsTo('App\TrainerPokemon');
    }

}
