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
        $content = $request->input('message');
        // Check for the "language" parameter
        $language = $request->has('language') && $request->input('language') === 'es' ? 'es' : 'en';

        $mailable = $language === 'es' ? new SFMailableEs($name) : new SFMailable($name);
        Mail::to($email)->send($mailable);

        $mailableReply = $language === 'es' ? new SFMailableReplyEs($name, $email, $content) : new SFMailableReply($name, $email, $content);
        Mail::to('info@lanonnarose.com')->send($mailableReply);

    }
}
