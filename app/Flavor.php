<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flavor extends Model
{
    protected $fillable = [
        'tasting_id',
        'name'
    ];

    public function tasting() {
        return $this->belongsTo('App\Tasting');
    }
}
