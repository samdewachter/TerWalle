<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Presale;
use App\Ticket;
use Auth;
use Mail;
use App\Mail\PresaleConfirm;

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
        $this->validate($request, [
            'description' => 'required',
            'member_price' => 'required',
            'non_member_price' => 'required',
            'event_id' => 'required',
            'deadline' => 'required|date|after:yesterday',
        ], [
            'description.required' => 'Het korte beschrijving veld is verplicht.',
            'member_price.required' => 'Het lid prijs veld is verplicht.',
            'non_member_price.required' => 'Het niet lid prijs veld is verplicht.',
            'event_id.required' => 'Het evenement veld is verplicht.',
            'deadline.required' => 'Het deadline veld is verplicht.',
            'deadline.after' => 'De datum moet vandaag of een datum na vandaag zijn.',
        ]);

    	$presale = new Presale();

    	$presale->event_id = $request->event_id;
    	$presale->member_price = $request->member_price;
    	$presale->non_member_price = $request->non_member_price;
    	$presale->deadline = $request->deadline;
    	$presale->description = $request->description;

    	if ($presale->save()) {
    	 	return redirect('/admin/voorverkoop')->with('message', ['gelukt', 'voorverkoop moment succesvol aangemaakt.']);
        }
        return redirect('/admin/voorverkoop')->with('message', ['error', 'Er liep iets fout bij het aanmaken van het voorverkoop moment.']);
    }

    public function deletePresale(Presale $presale)
    {
    	if ($presale->delete()) {
    		return redirect('/admin/voorverkoop')->with('message', ['gelukt', 'voorverkoop moment succesvol verwijderd.']);
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
        $this->validate($request, [
            'description' => 'required',
            'member_price' => 'required',
            'non_member_price' => 'required',
            'event_id' => 'required',
            'deadline' => 'required|date|after:yesterday',
        ], [
            'description.required' => 'Het korte beschrijving veld is verplicht.',
            'member_price.required' => 'Het lid prijs veld is verplicht.',
            'non_member_price.required' => 'Het niet lid prijs veld is verplicht.',
            'event_id.required' => 'Het evenement veld is verplicht.',
            'deadline.required' => 'Het deadline veld is verplicht.',
            'deadline.after' => 'De datum moet vandaag of een datum na vandaag zijn.',
        ]);
        
    	$presale->event_id = $request->event_id;
    	$presale->member_price = $request->member_price;
    	$presale->non_member_price = $request->non_member_price;
    	$presale->deadline = $request->deadline;
    	$presale->description = $request->description;

    	if ($presale->save()) {
    	 	return redirect('/admin/voorverkoop')->with('message', ['gelukt', 'voorverkoop moment succesvol aangepast.']);
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
                    $event = $ticket->Presale->Event->title;
                    $email = $user->email;
                    Mail::to($email)->queue(new PresaleConfirm($ticket));
		    		return back()->with('message', ['gelukt', 'U staat succesvol op de gastenlijst, u krijgt zodadelijk een bevestigingsemail.']);
		        }
		        return back()->with('message', ['error', 'Er liep iets fout bij de voorverkoop. Neem contact op met het jeugdhuis zodat wij het probleem kunnen verhelpen.']);
	    	}
	    	return back()->with('message', ['gelukt', 'U staat al op de gastenlijst.']);
    	}
    	else {
    		return back()->with('message', ['error', 'U moet ingelogd zijn om op de gastenlijst te staan.']);
    	}
    }

    public function showDetails(Presale $presale)
    {
        return view('admin.presale.showDetails', compact('presale'));
    }

    public function downloadPaidMember(Presale $presale)
    {
        $tickets = $presale->Tickets()->where('paid_member', true)->get();

        $filename = $presale->description . " paidmembers.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('Betalende leden'));
        fputcsv($handle, array('Naam'));

        foreach($tickets as $ticket) {
            fputcsv($handle, array($ticket->User->first_name . ' ' . $ticket->User->last_name));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return response()->download($filename, $filename, $headers);
    }

    public function downloadNonPaidMember(Presale $presale)
    {
        $tickets = $presale->Tickets()->where('paid_member', false)->get();

        $filename = $presale->description . " nonpaidmembers.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('Niet betalende leden'));
        fputcsv($handle, array('Naam'));

        foreach($tickets as $ticket) {
            fputcsv($handle, array($ticket->User->first_name . ' ' . $ticket->User->last_name));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return response()->download($filename, $filename, $headers);
    }
}
