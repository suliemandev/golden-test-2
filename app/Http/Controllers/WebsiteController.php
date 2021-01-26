<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuizResult;
use App\Mail\QuizResultAdmin;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.index');
    }
}
