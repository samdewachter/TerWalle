<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Image;

class EventController extends Controller
{
    public function showEvents()
    {
    	$events = Event::paginate(10);

    	return view('admin.events.showEvents', compact('events'));
    }

    public function getFacebookEvents()
    {
    	$graph_url = "https://graph.facebook.com/v2.9/404178786353325/events?fields=id,start_time,end_time,name,cover,description&access_token=EAADGadxtjdABAILwDECdzzhaveNDQJ7F6ABFe1H4ZCqbU2TZCJQQLmDwxlT6uvnvpZAyN7LAZAepXr4KafWkrVPX6YtROhlxN0bbV57sokI49RZCLbTxZCcwZAOTWqge627JhlyGGuOcS1PHbnXLnrcCOksZBndl12gZD&limit=10";

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
            if ($count == 10) {
                return redirect(url('/admin/evenementen'))->with('message', ['success', 'Er zijn geen nieuwe facebook evenementen om toe te voegen.']);
            }
            return redirect(url('/admin/evenementen'))->with('message', ['success', 'Facebook evenementen succesvol toegevoegd.']);
        }

        return redirect(url('/admin/evenementen'))->with('message', ['success', 'Er zijn geen facebook evenementen gevonden.']);		
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
        if ($request->publish) {
            $event->publish = true;
        } else {
            $event->publish = false;
        }
        $event->save();
    }

    public function deleteEvent(Event $event){
        if ($event->delete()) {
            return redirect(url('/admin/evenementen'))->with('message', ['success', 'Evenement succesvol verwijderen.']);
        }
        return redirect(url('/admin/evenementen'))->with('message', ['success', 'Er is iets fout gegaan bij het verwijderen van het evenement']);
    }

    public function newEvent(){
        return view('admin.events.addEvent');
    }

    public function addEvent(Request $request){
        $event = new Event();

        $event->title = $request->title;
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
            return redirect(url('/admin/evenementen'))->with('message', ['success', 'Evenement succesvol gemaakt.']);
        }
        return redirect(url('/admin/evenementen'))->with('message', ['success', 'Er is iets fout gegaan bij het maken van het evenement']);

    }

    public function editEvent(Event $event){
        return view('admin.events.editEvent', compact('event'));
    }

    public function updateEvent(Request $request, Event $event){
        $event->title = $request->title;
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
            return redirect(url('/admin/evenementen'))->with('message', ['success', 'Evenement succesvol aangepast.']);
        }
        return redirect(url('/admin/evenementen'))->with('message', ['success', 'Er is iets fout gegaan bij het aanpassen van het evenement']);
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
}
