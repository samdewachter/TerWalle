<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\PaidUser;
use Mail;
use App\Mail\MailMembers;


class MailController extends Controller
{
    public function index(){
    	return view('admin.mail.mailMembers');
    }
    public function mailMembers(Request $request){

    	$this->validate($request, [
            'message' => 'required',
            'subject' => 'required',
        ], [
            'message.required' => 'Het bericht veld is verplicht',
            'subject.required' => 'Het onderwerp veld is verplicht',
        ]);

    	switch ($request->kind_of_member) {
    		case 'all-members':
    			$members = User::all();
    			$this->sendMail($members, $request->message, $request->subject);
    			break;

    		case 'paid-members':
    			$year = date('Y');
    			$members = User::whereHas('Paid', function($query) use($year)
				{
				     $query->where('year', $year);
				})
				    ->get();

    			$this->sendMail($members, $request->message, $request->subject);
    			break;
    		
    		default:
    			break;
    	}

    	return redirect('/admin')->with('message', ['gelukt', 'Emails succesvol verzonden']);
    }

    public function sendMail($members, $text, $subject){
    	foreach ($members as $member) {
    		$email = $member->email;
            Mail::to($email)->queue(new MailMembers($text, $subject));
			// Mail::send('emails.mailMembers', ['text' => $text, 'subject' => $subject], function ($message) use ($email, $subject)
			// {
			// 	$message->from('me@gmail.com', 'Christian Nwamba');
			// 	$message->to($email)->subject($subject);  
			// });
		}
    }
}
