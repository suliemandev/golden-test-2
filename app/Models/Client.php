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
    	'api_token'
    ];

    public function quiz() {
    	return $this->hasOne(Quiz::class);
    }
}
