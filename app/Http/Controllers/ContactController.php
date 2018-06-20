<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
     public function send(Request $request)
    {
    	//return config('mail');
    	\Mail::send('mails.contact', [ 'messageBody' => $request->message ] + $request->all(), function($message) {
    		$message->to('susmitboards@gmail.com');
    		$message->subject('Website Enquiry');
    	});
        
        \Mail::send('mail.contact-user', ['messageBody' => $request->message] + $request->all(), function($message) use($request) {
            $message->to($request->email);
            $message->subject(' Enquiry');
        });

    	return back()->with('success', 'Your query has been submitted, Our team will contact you shortly.');
    }
}
