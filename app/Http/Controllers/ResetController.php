<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presale;
use App\Event;
use App\User;
use App\PaidUser;

class ResetController extends Controller
{
    public function index(){
    	$presales = Presale::orderBy('created_at', 'DESC')->limit(10)->get();

    	return view('admin.reset.resetMembers', compact('presales'));
    }

    public function resetMembers(Request $request){
    	if ($request->event_id == 0) {
    		return redirect('/admin')->with('message', ['gelukt', 'Er waren geen vvk momenten om leden om te zetten.']);
    	}

    	$year = date("Y");
    	$month = date("m");

    	if ($month == "06") {
    		$event = Event::find($request->event_id);
	    	foreach ($event->Presales as $presale) {
	    		foreach ($presale->Tickets as $ticket) {
	    			if (!$ticket->User->Paid()->where('year', $year)->exists()) {
	    				$paid = new PaidUser();
		    			$paid->user_id = $ticket->User->id;
			            $paid->year = $year;
			            $paid->save();
	    			}
	    		}
	    	}
	    	return redirect('/admin')->with('message', ['gelukt', 'Leden zijn succesvol omgezet.']);
    	}
    	return redirect('/admin')->with('message', ['waarschuwing', 'Je kan dit enkel doen als het januari is.']);
	    	
    }
}
