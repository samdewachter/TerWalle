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
    	$url = "https://graph.facebook.com/v2.9/404178786353325/events?access_token=EAACEdEose0cBAFNOXZBeks88AzoaHZCFjX6d91NcNpXWJ33RJZCNwruk1HDfRBWd8ZBdKPJsji1xVQcvWk5zalsfXAZBxBtSPGJ0WZAiTbOZCUFtn1pBeZB9BAZBex7zMDnsz6Ivif9Nl5grecwPKxUWXD6oVh018pGrQPPsOU1VXvKJHijLgFIsa0u7LjgWsJPUZD";

		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		$info = curl_getinfo($ch);
		$http_result = $info['http_code'];
		curl_close($ch);

		var_dump($http_result);
    }
}
