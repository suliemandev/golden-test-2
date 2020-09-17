<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{

    protected $fillable = [
    	'client_id',
        'token',
        'result',
    	'top_trends'
    ];

    protected $casts = [
        'result' => 'array',
        'top_trends' => 'array',
    ];

    public function client() {
    	return $this->belongsTo(Client::class);
    }

}
