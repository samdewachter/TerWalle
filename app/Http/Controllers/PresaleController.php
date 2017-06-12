<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Presale;
use App\Ticket;
use Auth;

class PresaleController extends Controller
{
    public function showPresale()
    {
    	$presales = Presale::paginate(10);

    	return view('admin.presale.showPresale', compact('presales'));
    }

    public function newPresale()
    {
    	$now = date('Y-m-d');

    	$events = Event::where('start_time', '>', $now)->get();

    	return view('admin.presale.addPresale', compact('events'));
    }

    public function addPresale(Request $request)
    {
    	$presale = new Presale();

    	$presale->event_id = $request->event_id;
    	$presale->member_price = $request->member_price;
    	$presale->non_member_price = $request->non_member_price;
    	$presale->deadline = $request->deadline;
    	$presale->description = $request->description;

    	if ($presale->save()) {
    	 	return redirect('/admin/voorverkoop')->with('message', ['success', 'voorverkoop moment succesvol aangemaakt.']);
        }
        return redirect('/admin/voorverkoop')->with('message', ['error', 'Er liep iets fout bij het aanmaken van het voorverkoop moment.']);
    }

    public function deletePresale(Presale $presale)
    {
    	if ($presale->delete()) {
    		return redirect('/admin/voorverkoop')->with('message', ['success', 'voorverkoop moment succesvol verwijderd.']);
        }
        return redirect('/admin/voorverkoop')->with('message', ['error', 'Er liep iets fout bij het verwijderen van het voorverkoop moment.']);
    }

    public function editPresale(Presale $presale)
    {
    	$now = date('Y-m-d');

    	$events = Event::where('start_time', '>', $now)->get();

    	return view('admin.presale.editPresale', compact('presale', 'events'));
    }

    public function updatePresale(Presale $presale, Request $request)
    {
    	$presale->event_id = $request->event_id;
    	$presale->member_price = $request->member_price;
    	$presale->non_member_price = $request->non_member_price;
    	$presale->deadline = $request->deadline;
    	$presale->description = $request->description;

    	if ($presale->save()) {
    	 	return redirect('/admin/voorverkoop')->with('message', ['success', 'voorverkoop moment succesvol aangepast.']);
        }
        return redirect('/admin/voorverkoop')->with('message', ['error', 'Er liep iets fout bij het aanpassen van het voorverkoop moment.']);
    }

    public function buyTicket(Presale $presale)
    {
    	if (Auth::check()) {
    		$user = Auth::user();

	    	$hasPresaleTicket = false;

	    	foreach ($user->Tickets as $userTicket) {
	    		if ($userTicket->presale_id == $presale->id) {
	    			$hasPresaleTicket = true;
	    		}
	    	}

	    	if (!$hasPresaleTicket) {
	    		$year = date('Y');

		    	$paid_member = false;

		    	foreach ($user->Paid as $membership) {
		    		if ($membership->year == $year) {
		    			$paid_member = true;
		    		}
		    	}

		    	$ticket = new Ticket();

		    	$ticket->paid_member = $paid_member;
		    	$ticket->user_id = $user->id;
		    	$ticket->presale_id = $presale->id;

		    	if ($ticket->save()) {
		    		return back()->with('message', ['success', 'U staat succesvol op de gastenlijst, u krijgt zodadelijk een bevestigingsemail.']);
		        }
		        return back()->with('message', ['error', 'Er liep iets fout bij de voorverkoop. Neem contact op met het jeugdhuis zodat wij het probleem kunnen verhelpen.']);
	    	}
	    	return back()->with('message', ['success', 'U staat al op de gastenlijst.']);
    	}
    	else {
    		return back()->with('message', ['error', 'U moet ingelogd zijn om op de gastenlijst te staan.']);
    	}
    }
}
