<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Client;
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
            $qz['trends'] = $this->get_quiz_trends($qz, 3);
            $qz['trends_all'] = $this->get_quiz_trends($qz);
            $qz['questions'] = $this->get_quiz_questions($qz);
        }
        $quiz = $quizzes[0];
        // return $quizzes;

        return view('pages.quizzes.index', compact('quizzes', 'quiz'));
    }

    public function get_quiz_trends($quiz, $limit = null)
    {
        $trends = [];
        $count = 0;
        foreach ($quiz->top_trends as $top_trend) {
            if($limit && $limit < ++$count) break;
            $trends[] = Trend::with('professions')->find($top_trend['id']);
            $trends[count($trends) - 1]['mark'] = $top_trend['mark'];
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

        $quiz['trends'] = $this->get_quiz_trends($quiz, 3);

        return [
            'status' => true,
            'message' => 'Quiz found successfully',
            'data' => $quiz
        ];

    }

    public function create(Client $client, Request $request)
    {
        $trends = Trend::active()->with('professions')->get();
        $questions = Question::active()->get();
        $answers = $request->answers;

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

        $data = $trends->map(function($trend) {
            return [
                'id' => $trend->id,
                'mark' => $trend->points,
            ];
        });

        // $top_trends = $this->get_top_trends($trends_temp);
        // $this->increase_suitable_count_for_trend($top_trends[0]);

        $quiz = Quiz::create([
            'client_id'  => $client->id,
            'result' => $answers,
            'token' => Str::random(20),
            'top_trends' => $data
        ]);

        //send mail to client
        // $quiz_mail = $quiz; 
        // $quiz_mail['trends'] = $this->get_quiz_trends($quiz_mail, 3);
        // $quiz_mail['trends_all'] = $this->get_quiz_trends($quiz_mail);
        // $quiz_mail['questions'] = $this->get_quiz_questions($quiz_mail);
        // app('App\Http\Controllers\MailController')->sendClientMail($quiz_mail);

        $quiz->trends = $trends;
        return $quiz;
    }

    private function get_top_trends($array) {
        $result = [];
        for($i=0; $i<count($array); $i++) {
            $max = -100;
            $index = 0;
            foreach($array as $trend_id => $num) {
                if($num > $max) {
                    $max = $num;
                    $index = $trend_id;
                }
            }
            $result[] = [
                'id' => $index,
                'mark' => $max
            ];
            $array[$index] = -100;
        }
        return $result;
    }

    private function increase_suitable_count_for_trend($top_trend) {
        $trend = Trend::find($top_trend['id']);
        if($trend) $trend->update(['suitable_count' => $trend['suitable_count'] + 1]);
    }

    public function edit($id)
    {
        $quiz = Quiz::find($id);
        $quiz['trends'] = $this->get_quiz_trends($quiz, 3);
        $quiz['trends_all'] = $this->get_quiz_trends($quiz);
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
