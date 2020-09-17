<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
    	'first_name',
    	'last_name',
    	'phone',
    	'email',
    	'address'
    ];

    public function quiz() {
    	return $this->hasOne(Quiz::class);
    }
}
