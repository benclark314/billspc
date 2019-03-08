<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerPokemon extends Model
{
    //Table Name
    protected $table = 'trainer_pokemon';

    //Primary Key
    public $primaryKey = 'trainerId';

    //Timestamps
    public $timestamps = false;

    protected $fillable=['trainerId', 'pokemonId'];
}
