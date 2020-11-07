<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Trend;

class Quiz extends Model
{

    protected $fillable = [
    	'client_id',
        'token',
        'result',
    	'top_trends',
    ];

    protected $casts = [
        'result' => 'array',
        'top_trends' => 'array',
    ];

    public function client() {
    	return $this->belongsTo(Client::class);
    }

    public function loadTrends()
    {
        $trends = Trend::active()->with('professions')->get();
        $questions = Question::active()->get();
        $answers = $this->result;

        foreach($answers as $question_id => $answer) {
            $question = $questions->where('id', $question_id)->first();

            if($question)
                foreach($trends as $trend)  {
                    if(isset($question->points[$trend->id])) {
                        $value = $trend->points ?: 0;
                        $trend->points = $value + $question->points[$trend->id][$answer];
                    }
                }
        }

        $trends = $trends->sortByDesc('points')->values();
        $this->trends = $trends;
        return $this;
    }
}
