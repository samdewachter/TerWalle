<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher;

class PusherController extends Controller
{
	// public function __construct() {
 //        // parent::__construct();
 //        //Let's register our pusher application with the server.
 //        //I have used my own config files. The config keys are self-explanatory.
 //        //You have received these config values from pusher itself, when you signed up for their service.
 //        // $this->pusher = App::make('pusher');
 //        $this->pusher = new Pusher('0a8fcbf6da321a3ef863', 'cc6cbd8350dcfed83c1e', '349455');
 //    }

    public function auth(){
    	// if(\Auth::check())
     //    {
     //        //Fetch User Object
     //        $user =  \Auth::user();
     //        //Presence Channel information. Usually contains personal user information.
     //        //See: https://pusher.com/docs/client_api_guide/client_presence_channels
     //        $presence_data = array('name' => $user->first_name." ".$user->last_name);
     //        //Registers users' presence channel.
     //        echo $this->pusher->presence_auth(Input::get('channel_name'), Input::get('socket_id'), $user->id, $presence_data);       
     //    }
     //    else
     //    {
     //        return Response::make('Forbidden',403);
     //    }
        if (\Auth::check())
        {
          $pusher = new Pusher("0a8fcbf6da321a3ef863", "cc6cbd8350dcfed83c1e", "349455");
          echo $pusher->socket_auth($_POST['channel_name'], $_POST['socket_id']);
        }
        else
        {
          header('', true, 403);
          echo "Forbidden";
        }
    }
}
