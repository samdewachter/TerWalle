<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\TapList;

class TapController extends Controller
{
    public function index(){
    	$users = User::with('Role')->where('role_id', 1)->orWhere('role_id', 2)->get();

    	return view('admin.taplist.showTaplist', compact('users'));
    }

    public function saveEvent(Request $request){
    	$taplist = new Taplist();

    	$taplist->title = $request->title;
    	$taplist->start = $request->start;

    	$taplist->save();

    	return 'test';
    }

    public function getTapList(Request $request){
    	$tapList = TapList::where([['start', '>', $request->start], ['start', '<', $request->end]])->get();

    	return $tapList;
    }

    public function deleteEvent(Taplist $event, Request $request){
    	if ($event->delete()) {
    		return 'gelukt';
    	}

    	return 'mislukt';
    }

    public function updateEvent(Taplist $event, Request $request){
    	$event->start = $request->start;

    	if ($event->save()) {
    		return 'gelukt';
    	}
    	return 'mislukt';
    }
}
