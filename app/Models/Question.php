<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = [
    	'title',
        'points',
    	'active'
    ];

    protected $casts = [
        'title' => 'array',
        'points' => 'array'
    ];

    public function scopeActive($scope) {
        return $scope->where('active', 1);
    }
    
}
