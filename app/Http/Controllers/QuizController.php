<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Trend;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;


class QuizController extends Controller
{

    public function index() {
        $quizzes = Quiz::orderby('created_at', 'desc')->paginate(25);
        foreach ($quizzes as $qz) {
            $qz['trends'] = $this->get_quiz_trends($qz);
            $qz['questions'] = $this->get_quiz_questions($qz);
        }
        $quiz = $quizzes[0];

        return view('pages.quizzes.index', compact('quizzes', 'quiz'));
    }

    public function get_quiz_trends($quiz)
    {
        $trends = [];
        foreach ($quiz->top_trends as $trend_id) {
            $trends[] = Trend::with('professions')->find($trend_id);
        }
        return $trends;
    }

    private function get_quiz_questions($quiz)
    {
        $questions = [];
        if(is_array($quiz->result)) {
            foreach ($quiz->result as $question_id => $answer) {
                $question = Question::find($question_id);
                $question['answer'] = $answer;
                $questions[] = $question; 
            }
        }
        return $questions;
    }

    public function json(Request $request)
    {
        $token = \Session::get('quiz_token');
        $token_request = $request['token'];
        if($token != $token_request) {
            return [
                'status' => false,
                'message' => 'Quiz session expired!'
            ];
        }

        $quiz = Quiz::where('token', $token_request)->first();

        $quiz['trends'] = $this->get_quiz_trends($quiz);

        return [
            'status' => true,
            'message' => 'Quiz found successfully',
            'data' => $quiz
        ];

    }

    public function create(Request $request)
    {
        $trends = Trend::active()->get();

        $trends_temp = [];
        foreach($trends as $trend) {
            $trends_temp[$trend->id] = 0;
        }

        $answers = $request['answers'];
        foreach($answers as $question_id => $answer) {
            $question = Question::find($question_id);
            if($question) {
                foreach($trends as $trend) {
                    $trends_temp[$trend->id] += $question->points[$trend->id][$answer];
                }
            }
        }

        $top_trends = $this->get_top_trends($trends_temp);

        $quiz = Quiz::create([
            // 'client_id'  => $client_id,
            'result' => $answers,
            'token' => Str::random(20),
            'top_trends' => $top_trends
        ]);
        
        //save token is session to give access
        \Session::put('quiz_token', $quiz->token);

        return [
            'status' => true,
            'message' => 'Quiz created successfully',
            'data' => $quiz
        ];

    }

    private function get_top_trends($array) {
        $result = [];
        for($i=0; $i<3 && $i<count($array); $i++) {
            $max = -100;
            $index = 0;
            foreach($array as $trend_id => $num) {
                if($num > $max) {
                    $max = $num;
                    $index = $trend_id;
                }
            }
            $result[] = $index;
            $array[$index] = -100;
        }
        return $result;
    }

    public function edit($id)
    {
        $quiz = Quiz::find($id);
        $quiz['trends'] = $this->get_quiz_trends($quiz);
        $quiz['questions'] = $this->get_quiz_questions($quiz);
        return view('pages.quizzes.sidebar', compact('quiz'));
    }

    public function destroy($id)
    {
        $quiz = Quiz::find($id);

        if(!$quiz) {
            return [
                'status' => false,
                'message' => 'Quiz not found'
            ];
        }

        $quiz->delete();

        return [
            'status' => true,
            'message' => 'deleted successfully'
        ];
    }
}
