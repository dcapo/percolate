<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roast extends Model
{
    protected $fillable = [
        'roasted_at',
        'bean_id',
        'drying_time',
        'maillard_time',
        'development_time',
        'drop_temperature'
    ];

    protected $appends = [
        'drop_time'
    ];

    public function getDropTimeAttribute() {
        return $this->drying_time +
            $this->maillard_time +
            $this->development_time;
    }

    public function bean() {
        return $this->belongsTo('App\Bean');
    }

    public function brews() {
        return $this->hasMany('App\Brew');
    }
}
