<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Image;
use Auth;
use File;

class EventController extends Controller
{
    public function showEvents()
    {
    	$events = Event::paginate(10);

    	return view('admin.events.showEvents', compact('events'));
    }

    public function getFacebookEvents()
    {
    	$graph_url = "https://graph.facebook.com/v2.9/404178786353325/events?fields=id,start_time,end_time,name,cover,description&access_token=EAADGadxtjdABAILwDECdzzhaveNDQJ7F6ABFe1H4ZCqbU2TZCJQQLmDwxlT6uvnvpZAyN7LAZAepXr4KafWkrVPX6YtROhlxN0bbV57sokI49RZCLbTxZCcwZAOTWqge627JhlyGGuOcS1PHbnXLnrcCOksZBndl12gZD&limit=5";

    	$ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $graph_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $output = curl_exec($ch);

        curl_close($ch);

        $events = json_decode($output);
        $count = 0;

        if (count($events->data) > 0) {
            foreach ($events->data as $data) {
                if (!$this->checkEventExists($data->id)) {
                    $event = new Event();

                    $event->title = $data->name;
                    $event->title_url = clean($event->title);
                    $event->cover = $data->cover->source;
                    $event->description = $data->description;
                    $event->facebook_id = $data->id;
                    date_default_timezone_set('Europe/Brussels');
                    $start_time = date('Y-m-d H:i:s', strtotime($data->start_time));
                    $event->start_time = $start_time;
                    $end_time = date('Y-m-d H:i:s', strtotime($data->end_time));
                    $event->end_time = $end_time;
                    $event->publish = false;

                    $event->save();
                } else {
                    $count++;
                }
            }
            if ($count == 5) {
                return redirect(url('/admin/evenementen'))->with('message', ['gelukt', 'Er zijn geen nieuwe facebook evenementen om toe te voegen.']);
            }
            return redirect(url('/admin/evenementen'))->with('message', ['gelukt', 'Facebook evenementen succesvol toegevoegd.']);
        }

        return redirect(url('/admin/evenementen'))->with('message', ['gelukt', 'Er zijn geen facebook evenementen gevonden.']);		
    }

    private function checkEventExists($facebook_id)
    {
    	if (Event::where('facebook_id', $facebook_id)->exists()) {
    		return true;
    	}
    	return false;
    }

    public function publishEvent(Request $request)
    {
        $event = Event::find($request->id);
        if ($request->publish == 'true') {
            $event->publish = true;
        } else {
            $event->publish = false;
        }
        $event->save();
    }

    public function deleteEvent(Event $event){
        if ($event->delete()) {
            return redirect(url('/admin/evenementen'))->with('message', ['gelukt', 'Evenement succesvol verwijderd.']);
        }
        return redirect(url('/admin/evenementen'))->with('message', ['error', 'Er is iets fout gegaan bij het verwijderen van het evenement']);
    }

    public function newEvent(){
        return view('admin.events.addEvent');
    }

    public function addEvent(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'start_time' => 'required',
            'start_date' => 'required|after:yesterday',
            'end_time' => 'required',
            'end_date' => 'required|after:yesterday',
            'cover_photo' => 'required|mimes:jpg,png,jpeg',
        ], [
            'title.required' => 'Het titel veld is verplicht',
            'description.required' => "Het beschrijving veld is verplicht.",
            'start_time.required' => "Het start tijd veld is verplicht.",
            'start_date.required' => "Het start datum veld is verplicht.",
            'start_date.after' => "De datum moet vandaag of een datum na vandaag zijn.",
            'end_time.required' => "Het eind tijd veld is verplicht.",
            'end_date.required' => "Het eind datum veld is verplicht.",
            'end_date.after' => "De datum moet vandaag of een datum na vandaag zijn.",
            'cover_photo.required' => "Het cover foto veld is verplicht.",
            'cover_photo.mimes' => "De cover foto mag enkel jpg, png of jpeg zijn.",
        ]);

        $event = new Event();

        $event->title = $request->title;
        $event->title_url = clean($event->title);
        $event->description = $request->description;

        if ($request->file('cover_photo')) {
            $file = $request->file('cover_photo');
            $extension = $file->getClientOriginalExtension();
            $imageName = $file->getClientOriginalName();
            $storageName = uniqid() . $imageName;
            $file = Image::make($file);
            $file->encode($extension);
            $path = public_path('uploads\\eventPhotos\\' . $storageName);
            $file->save($path, 65);

            $event->cover = $storageName;
        }

        $event->start_time = $request->start_date . ' ' . $request->start_time;
        $event->end_time = $request->end_date . ' ' . $request->end_time;

        if ($request->publish) {
            $event->publish = true;
        } else {
            $event->publish = false;
        }

        if ($event->save()) {
            return redirect(url('/admin/evenementen'))->with('message', ['gelukt', 'Evenement succesvol gemaakt.']);
        }
        return redirect(url('/admin/evenementen'))->with('message', ['error', 'Er is iets fout gegaan bij het maken van het evenement']);

    }

    public function editEvent(Event $event){
        return view('admin.events.editEvent', compact('event'));
    }

    public function updateEvent(Request $request, Event $event){
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'start_time' => 'required',
            'start_date' => 'required|after:yesterday',
            'end_time' => 'required',
            'end_date' => 'required|after:yesterday',
        ], [
            'title.required' => 'Het titel veld is verplicht',
            'description.required' => "Het beschrijving veld is verplicht.",
            'start_time.required' => "Het start tijd veld is verplicht.",
            'start_date.required' => "Het start datum veld is verplicht.",
            'start_date.after' => "De datum moet vandaag of een datum na vandaag zijn.",
            'end_time.required' => "Het eind tijd veld is verplicht.",
            'end_date.required' => "Het eind datum veld is verplicht.",
            'end_date.after' => "De datum moet vandaag of een datum na vandaag zijn.",
            'cover_photo.mimes' => "De cover foto mag enkel jpg, png of jpeg zijn.",
        ]);

        $event->title = $request->title;
        $event->title_url = clean($event->title);
        $event->description = $request->description;

        $cover = substr($event->cover, 0, 4);

        if ($request->file('cover_photo')) {
            if ($cover != 'http') {
                File::delete(public_path('uploads/eventPhotos/' . $event->cover));
            }
            $file = $request->file('cover_photo');
            $extension = $file->getClientOriginalExtension();
            $imageName = $file->getClientOriginalName();
            $storageName = uniqid() . $imageName;
            $file = Image::make($file);
            $file->encode($extension);
            $path = public_path('uploads\\eventPhotos\\' . $storageName);
            $file->save($path, 65);

            $event->cover = $storageName;
        }

        $event->start_time = $request->start_date . ' ' . $request->start_time;
        $event->end_time = $request->end_date . ' ' . $request->end_time;

        if ($request->publish) {
            $event->publish = true;
        } else {
            $event->publish = false;
        }

        if ($event->save()) {
            return redirect(url('/admin/evenementen'))->with('message', ['gelukt', 'Evenement succesvol aangepast.']);
        }
        return redirect(url('/admin/evenementen'))->with('message', ['error', 'Er is iets fout gegaan bij het aanpassen van het evenement']);
    }

    public function searchEvents(Request $request)
    {
        if (isset($request->query->all()['query'])) {
            $keyword = $request->query->all()['query'];
        }else {
            $keyword = $request->search_event;
        }
        $events = Event::search($keyword)->paginate(10);
        return view('admin.events.searchEvents', compact('events', 'keyword'));
    }

    public function index()
    {
        $events = Event::orderBy('start_time', 'DESC')
            ->where('publish', true)
            ->paginate(10);

        return view('front.events', compact('events'));
    }

    public function showEvent(Event $event)
    {
        if ($event->publish) {
            $albums = $event->Albums()->where("publish", true)->get();

            return view('front.event', compact('event', 'albums'));
        }
        return back()->with('message', ['error', 'U probeert een evenement te bekijken dat niet meer is gepubliceerd']);
    }
}
