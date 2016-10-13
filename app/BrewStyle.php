<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrewStyle extends Model
{
    protected $fillable = ['name'];

    public function brews() {
        return $this->hasMany('App\Brew');
    }
}
