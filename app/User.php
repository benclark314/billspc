<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function pokemon()
    {
      return $this->hasManyThrough(
          'App\Pokemon',
          'App\TrainerPokemon',
          'trainerId', // Foreign key on country table
          'id', // Foreign key on pokemon table
          'id', // Local key on users table
          'pokemonId' // Local key on trainer_pokemon table
      );
    }


}
