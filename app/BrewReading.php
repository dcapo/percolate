<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrewReading extends Model
{
    protected $fillable = [
        'brew_id',
        'time',
        'temperature',
        'pressure'
    ];

    public function brew() {
        return $this->belongsTo('App\Brew');
    }
}
