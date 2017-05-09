<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Role;
use App\Grocery;

class AdminController extends Controller
{
    public function index() {
    	$user = Auth::user()->Role->role; //User::find(1)->Role->role;
    	// $user = 'test';
    	return view('admin.dashboard', compact('user'));
    }
}
