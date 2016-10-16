<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brew extends Model
{
    protected $fillable = [
        'brewed_at',
        'roast_id',
        'brew_style_id',
        'average_temperature',
        'temperature_delta',
        'fine',
        'finer',
        'extra_fields'
    ];

    public static function calculateDelta($values) {
        return max($values) - min($values);
    }

    public static function calculateAverage($values) {
        return array_sum($values) / count($values);
    }

    public function style() {
        return $this->belongsTo('App\BrewStyle', 'brew_style_id');
    }

    public function readings() {
        return $this->hasMany('App\BrewReading');
    }

    public function tastings() {
        return $this->hasMany('App\Tasting');
    }

    public function roast() {
        return $this->belongsTo('App\Roast');
    }
}
