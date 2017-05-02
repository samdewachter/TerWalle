<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AdminController extends Controller
{
	// public function __construct()
 //    {
 //        $this->middleware('auth');
 //    }

    public function index() {
    	$user = Auth::user()->Role->role; //User::find(1)->Role->role;
    	// $user = 'test';
    	return view('admin.dashboard', compact('user'));
    }

    public function showMembers() {
    	$users = User::all();

    	return view('admin.members', compact('users'));
    }
}
