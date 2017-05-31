<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function showNews(){
    	return view('admin.news.showNews');
    }
}
