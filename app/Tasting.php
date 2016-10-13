<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasting extends Model
{
    protected $fillable = [
        'tasted_at',
        'user_id',
        'brew_id',
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

    public function getRadarMetrics() {
        return [
            'dry_fragrance' => $this->dry_fragrance ?: 0,
            'wet_aroma' => $this->wet_aroma ?: 0,
            'brightness' => $this->brightness ?: 0,
            'flavor' => $this->flavor ?: 0,
            'body' => $this->body ?: 0,
            'finish' => $this->finish ?: 0,
            'sweetness' => $this->sweetness ?: 0,
            'clean_cup' => $this->clean_cup ?: 0,
            'complexity' => $this->complexity ?: 0,
            'uniformity' => $this->uniformity ?: 0
        ];
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function brew() {
        return $this->belongsTo('App\Brew');
    }
}
