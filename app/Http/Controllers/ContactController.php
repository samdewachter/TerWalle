<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactMessage;

class ContactController extends Controller
{
    public function index()
    {
    	return view('front.contact');
    }

    public function postMessage(Request $request) {
    	$this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ], [
            'name.required' => 'Het naam veld is verplicht',
            'email.required' => 'Het email veld is verplicht',
            'email.email' => 'Dit is een ongeldig emailadres',
            'subject.required' => 'Het onderwerp veld is verplicht.',
            'message' => "Het bericht veld is verplicht."
        ]);

    	$contact = new ContactMessage();
    	$contact->name = $request->name;
    	$contact->email = $request->email;
    	$contact->subject = $request->subject;
    	$contact->message = $request->message;

    	if ($contact->save()) {
            return back()->with('message', ['gelukt', 'Bericht is succesvol verzonden. U zal zo snel mogelijk een antwoord krijgen.']);
        }
        return back()->with('message', ['error', 'Er liep iets fout bij het verzenden van het bericht.']);
    }

    public function showMessages(){
    	$messages = ContactMessage::all();

    	return view('admin.messages.showMessages', compact('messages'));
    }

    public function messageAnswered(Request $request){
        $message = ContactMessage::find($request->id);
        if ($request->answered == 'true') {
            $message->answered = true;
        } else {
            $message->answered = false;
        }
        $message->save();
    }
}
