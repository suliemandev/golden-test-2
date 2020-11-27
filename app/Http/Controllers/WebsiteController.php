<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuizResult;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.index');
    }

    public function client(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            "birth_year" => 'integer|between:1910,2001',
            "math_units" => 'required',
            "english_units" => 'required',
            "psychometric" => 'required',
            "study_abroad" => 'required',
            "expectations" => '',
            "helped" => ''
        ]);

        $token =  Str::random(80);
        session(['api_token' => $token]);
        $client = Client::create($validatedData);
        $client->update(['api_token' => session('api_token')]);

        return $client;
    }

    public function quiz(Request $request)
    {
        $client = Client::where('api_token', session('api_token'))->firstOrFail();

        $quiz = (new QuizController)->create($client, $request);
            
        Mail::to($client->email)
            ->cc('Academic.golden.test@gmail.com')
            ->send(new QuizResult($quiz));

        return $quiz;
    }

    public function feedback(Request $request)
    {
        $client = Client::where('api_token', session('api_token'))->firstOrFail();

        $client->update([
            'expectations' => $request->expectations,
            'helped' => $request->helped
        ]);

        return ['sent' => true];
    }
}
