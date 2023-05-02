<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SFMailable;
use App\Mail\SFMailableEs;
use App\Mail\SFMailableReply;
use App\Mail\SFMailableReplyEs;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Check the Authorization header
        $authHeader = $request->header('Authorization');
        if ($authHeader !== 'lanonnarose2023') {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
        $language = $request->has('language') ? $request->input('language') : 'en';

        $mailable = new SFMailable($name);
        if($language == 'es'){
            $mailable = new SFMailableEs($name);
        }
        Mail::to($email)
            ->send($mailable);

        $mailableReply = new SFMailableReply($name, $email, $message);
        if($language == 'es'){
           $mailableReply = new SFMailableReplyEs($name, $email, $message);
        }

        Mail::to('info@lanonnarose.com')
            //->cc(['mariela@slanonnarose.com'])
            ->send($mailableReply);
    }
}
