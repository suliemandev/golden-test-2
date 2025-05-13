<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Client;
use App\Mail\QuizResult;
use App\Mail\QuizResultAdmin;
use Mail;

class ApiController extends Controller
{

    public function getClient(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            "birth_year" => 'integer|between:1980,2020',
            // "math_units" => 'required',
            // "english_units" => 'required',
            // "psychometric" => 'required',
            // "study_abroad" => 'required',
            // "expectations" => '',
            // "helped" => ''
        ]);

        $validatedData['api_token'] =  Str::random(80);

        $client = Client::create($validatedData);
        
        return $client;
    }

    public function submitQuiz(Request $request)
    {
        $client = Client::where('api_token', $request->api_token)->firstOrFail();
        $quiz = (new QuizController)->create($client, $request);
        
        try {
	        // Mail::to($client->email)
	        //     ->send(new QuizResult($quiz));
	            
	        // Mail::to([env('MAIL_OWNER_ADDRESS'), env('MAIL_USERNAME')])
	        //     ->send(new QuizResultAdmin($quiz));
        } catch (\Exception $e) {
        	$quiz['mail_sent'] = false;
        	return $quiz;
        }

        return $quiz;
    }

    public function submitFeedback(Request $request)
    {
        $client = Client::where('api_token', $request->$request)->firstOrFail();

        $client->update([
            'expectations' => $request->expectations,
            'helped' => $request->helped
        ]);

        return ['sent' => true];
    }
}
