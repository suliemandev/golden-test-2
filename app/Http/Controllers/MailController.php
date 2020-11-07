<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class MailController extends Controller
{

    private $from = 'info@averotech.com';

    private $to = array(
        'acad.union@gmail.com', 
        'Sulieman@averotech.com'
    );

    public function sendClientMail($quiz) {

        $data = array(
            'quiz' => $quiz
        );

        $to = $this->to;
        $to[] = $quiz->client->email;

        Mail::send('mail.clientMail', $data, function($message) use($to){
            $message->to($to, 'Golden quiz | התוצאה שלך')->subject('Golden quiz | התוצאה שלך');
            $message->from($this->from, 'Golden quiz');
        });
        
        return [
            'status' => 'true',
            'message' => 'Mail send successfully.'
        ];
    }
}



