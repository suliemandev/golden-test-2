<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
    	'name',
    	'phone',
    	'email',
    	'address',
        'birth_year',
        'math_units',
        'english_units',
        'psychometric',
        'study_abroad',
        'expectations',
        'helped',
        'api_token',
    ];

    public function quiz() {
    	return $this->hasOne(Quiz::class);
    }
}
