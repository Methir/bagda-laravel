<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

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

    public function rpgs() 
    {
        return $this->belongsToMany('App\Rpg')
                    ->as('player')
                    ->withPivot('credential', 'gold', 'cash', 'detail');
    }

    public function my_rpgs()
    {
        return $this->hasMany('App\Rpg');
    }

    public function quests()
    {
        return $this->belongsToMany('App\Quest');
    }

    public function my_quests()
    {
        return $this->hasMany('App\Quest');
    }

    public function items()
    {
        return $this->belongsToMany('App\Item')
                    ->as('process')
                    ->withPivot('status');
    }
}
