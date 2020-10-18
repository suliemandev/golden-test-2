<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Trend;
use Illuminate\Http\Request;
use Validator;

class QuestionController extends Controller
{

    public function index(Request $request)
    {
        $questions = Question::orderby('created_at', 'desc')->paginate(25);
        $question = Question::orderby('created_at', 'desc')->first();
        $id = isset($request['item']) ? $request['item'] : null;
        if($id) $question = Question::find($id);
        $trends = Trend::active()->orderby('created_at', 'desc')->get();

        return view('pages.questions.index', compact('questions', 'trends', 'question'));
    }

    public function json()
    {
        return Question::active()->orderby('created_at')->get();
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if($validator->fails()) {
            return [
                'status' => false,
                'message' => $validator->errors(),
            ];
        }

        $question = Question::create([
            'title'  => $request['title'],
            'active' => $request['active'] == 'true' ? 1 : 0,
            'points' => $request['points'] ? $request['points'] : "{}"
        ]);

        return [
            'status' => true,
            'message' => 'Question created successfully',
            'data' => $question
        ];
    }

    public function edit($id) {
        $question = Question::find($id);
        $trends = Trend::active()->orderby('created_at', 'desc')->get();
        return view('pages.questions.sidebar', compact('question', 'trends'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if($validator->fails()) {
            return [
                'status' => false,
                'message' => $validator->errors(),
            ];
        }

        $question = Question::find($id);

        if(!$question) {
            return [
                'status' => false,
                'message' => 'Question not found'
            ];
        }

        $question->update([
            'title'  => $request['title'],
            'active' => $request['active'] == 'true' ? 1 : 0,
            'points' => isset($request['points']) ? $request['points'] : []
        ]);

        return [
            'status' => true,
            'message' => 'Question updated successfully',
            'data' => $question
        ];
    }

    public function destroy($id)
    {
        $question = Question::find($id);

        if(!$question) {
            return [
                'status' => false,
                'message' => 'Question not found'
            ];
        }

        $question->delete();

        return [
            'status' => true,
            'message' => 'deleted successfully'
        ];
    }
}
