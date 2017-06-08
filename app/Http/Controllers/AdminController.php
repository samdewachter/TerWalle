<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Role;
use App\Grocery;
use App\Transformers\ActivityTransformer;
use App\Activity;

class AdminController extends Controller
{
    public function index() {
    	$user = Auth::user()->Role->role; 

    	$activities = Activity::orderBy('created_at', 'DESC')->limit(10)->get();
    	
    	$activities = fractal($activities, new ActivityTransformer())->respond();

    	$activities = $activities->getData();

    	return view('admin.dashboard', compact('user', 'activities'));
    }

    public function getFeed(){
    	$activities = auth()->user()->activity()->latest()->get();
    	
    	return fractal($activities, new ActivityTransformer())->respond();
    }
}
