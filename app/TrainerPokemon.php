<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerPokemon extends Model
{
    //Table Name
    protected $table = 'trainer_pokemon';

    //Primary Key
    public $primaryKey = 'trainerPokemonId';

    //Timestamps
    public $timestamps = false;

    protected $fillable=['trainerId', 'pokemonId'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
