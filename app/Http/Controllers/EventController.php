<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function showEvents()
    {
    	$events = Event::all();

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
        	}    	
        }

        // $event = new Event();

        // $event->title = $data->name;
        // $event->cover = $data->cover->source;

        // echo "<pre>";
        // var_dump($events->data[0]->id);
        // echo "</pre>";		
    }

    private function checkEventExists($facebook_id)
    {
    	if (Event::where('facebook_id', $facebook_id)->exists()) {
    		return true;
    	}
    	return false;
    }
}
