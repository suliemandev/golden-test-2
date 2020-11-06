<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Client;

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
            "birth_year" => 'required',
            "math_units" => 'required',
            "english_units" => 'required',
            "psychometric" => 'required',
            "study_abroad" => 'required',
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

    	return $quiz;
    }
}
