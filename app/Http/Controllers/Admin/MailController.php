<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;

class MailController extends Controller
{
    public function send_email(Request $request){
        $validatedData = $request->validate([
            'email' => 'required',
            'subject' => 'required',
            'text' => 'required',
        ]);
		$email = $request->email;
        $details = [
            'subject' => $request->subject,
            'text' => $request->text
        ];
        Mail::to($email)->send(new SendMail($details));
	    $notification=array(
	      'message' => 'Email Successfull',
	      'alert-type' => 'success'
	    );
        return redirect()->back()->with($notification);
    }
}
