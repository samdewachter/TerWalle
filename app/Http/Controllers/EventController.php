<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function showEvents()
    {
    	return view('admin.events.showEvents');
    }

    public function getFacebookEvents()
    {
    	$graph_url = "https://graph.facebook.com/v2.9/404178786353325/events?access_token=EAADGadxtjdABAILwDECdzzhaveNDQJ7F6ABFe1H4ZCqbU2TZCJQQLmDwxlT6uvnvpZAyN7LAZAepXr4KafWkrVPX6YtROhlxN0bbV57sokI49RZCLbTxZCcwZAOTWqge627JhlyGGuOcS1PHbnXLnrcCOksZBndl12gZD";

    	$ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $graph_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $output = curl_exec($ch);

        curl_close($ch);

        $data = json_decode($output);


        echo "<pre>";
        var_dump($data->data[0]);
        echo "</pre>";		
    }
}
