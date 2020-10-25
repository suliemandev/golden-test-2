<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Trend;

class DashboardController extends Controller
{
    public function get_analytics() {
        $question_model = new Question();
        $quiz_model = new Quiz();
        $trend_model = new Trend();

        $analytics = [
            'questions' => [
                'count' => $question_model->count(),
                'active' => $question_model->active()->count()
            ],
            'quizzes' => [
                'count' => $quiz_model->count()
            ],
            'trends' => [
                'count' => $trend_model->count(),
                'active' => $trend_model->active()->count()
            ],
            'top_trends' => $trend_model->orderby('suitable_count', 'desc')->limit(3)->get()
        ];
        
        return $analytics;
    }
}
