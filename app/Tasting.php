<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasting extends Model
{
    protected $fillable = [
        'tasted_at',
        'user_id',
        'overall_score',
        'dry_fragrance',
        'wet_aroma',
        'brightness',
        'flavor',
        'body',
        'finish',
        'sweetness',
        'clean_cup',
        'complexity',
        'uniformity'
    ];

    protected $attributes = [
        'overall_score' => 0,
        'dry_fragrance' => 0,
        'wet_aroma' => 0,
        'brightness' => 0,
        'flavor' => 0,
        'body' => 0,
        'finish' => 0,
        'sweetness' => 0,
        'clean_cup' => 0,
        'complexity' => 0,
        'uniformity' => 0
    ];

    public function getRadarMetrics() {
        return [
            'Dry Fragrance' => $this->dry_fragrance,
            'Wet Aroma' => $this->wet_aroma,
            'Brightness' => $this->brightness,
            'Flavor' => $this->flavor,
            'Body' => $this->body,
            'Finish' => $this->finish,
            'Sweetness' => $this->sweetness,
            'Clean Cup' => $this->clean_cup,
            'Complexity' => $this->complexity,
            'Uniformity' => $this->uniformity
        ];
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function brew() {
        return $this->belongsTo('App\Brew');
    }
}
