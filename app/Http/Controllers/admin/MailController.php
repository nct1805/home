<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{

    public function mail()
    {
        Mail::send(['text'=>'mail'],['name'=>'hoang nam'],function($message){
            $message->to('hoangnam750@gmail.com','To HoangNam')->subject('Test mail');
            $message->from('hoangnam@gmail.com','hoangnam');
        });  
        return "Your email has been sent successfully";  
    }
   
}
