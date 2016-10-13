<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brew extends Model
{
    protected $fillable = [
        'roast_id',
        'brew_style_id'
    ];

    public function style() {
        return $this->belongsTo('App\BrewStyle', 'brew_style_id');
    }

    public function tastings() {
        return $this->hasMany('App\Tasting');
    }

    public function roast() {
        return $this->belongsTo('App\Roast');
    }
}
