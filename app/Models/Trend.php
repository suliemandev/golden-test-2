<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Trend extends Model
{

    protected $fillable = [
    	'title',
    	'active',
    	'suitable_count'
    ];

    protected $casts = [
        'title' => 'array',
    ];

    public function scopeActive($scope) {
        return $scope->where('active', 1);
    }

    public function professions() {
    	return $this->hasMany(Profession::class);
    }
}
