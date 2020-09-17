<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{

    protected $fillable = [
    	'title',
    	'trend_id'
    ];

    protected $casts = [
        'title' => 'array',
    ];

    public function trend() {
    	return $this->belongsTo(Trend::class);
    }
}
