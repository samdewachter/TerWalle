<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\News;
use App\WebsiteSettings;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('start_time', 'DESC')->limit(2)->get();
        $news = News::orderBy('created_at', 'DESC')->first();
        $settings = WebsiteSettings::find(1);

        return view('home', compact('events', 'news', 'settings'));
    }
}
