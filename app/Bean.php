<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bean extends Model
{
    protected $fillable = ['name', 'origin'];

    public function roasts() {
        return $this->hasMany('App\Roast');
    }
}
