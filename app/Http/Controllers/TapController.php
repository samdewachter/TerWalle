<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\TapList;
use App\CoreMember;

class TapController extends Controller
{
    public function index(){
    	$users = User::with('Role')->where('role_id', 1)->orWhere('role_id', 2)->get();

    	return view('admin.taplist.showTaplist', compact('users'));
    }

    public function saveEvent(Request $request){
    	$taplist = new Taplist();

    	$taplist->title = $request->title;
    	$taplist->start = date('Y-m-d H:i:s', strtotime($request->start .' + 20 hours'));
        $taplist->end = date('Y-m-d H:i:s', strtotime($taplist->start .' + 4 hours'));
        $taplist->allDay = $request->allDay;
        $taplist->user_id = $request->user_id;

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
        $event->end = $request->end;

    	if ($event->save()) {
    		return 'gelukt';
    	}
    	return 'mislukt';
    }

    public function graphic() {
        return view('admin.taplist.graphic');
    }

    public function getData(Request $request) {
        $core_members = CoreMember::all();

        $begin_date = (string)$request->start_date;
        $end_date = (string)$request->end_date;
        $chart_data = ['aantal dagen'];
        $chart_tappers = [];

        foreach ($core_members as $core_member) {
            $tapper = $core_member->User->first_name . ' ' . $core_member->User->last_name;

            $data = TapList::where([['start', '>=', $begin_date], ['start', '<=', $end_date], ['title', $tapper]])->get();

            $chart_data[] = count($data);
            $chart_tappers[] = $tapper;
        }

        return compact('chart_data', 'chart_tappers');
    }
}
