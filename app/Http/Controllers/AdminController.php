<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Role;
use App\Grocery;
use App\Transformers\ActivityTransformer;
use App\Activity;
use App\Report;
use App\Poll;
use App\TapList;
use App\Event;
use App\WebsiteSettings;
use App\ContactMessage;
use File;
use Image;

class AdminController extends Controller
{
    public function index() {
    	$user = Auth::user()->Role->role; 

        /* Activity feed */
    	$activities = Activity::orderBy('created_at', 'DESC')->limit(7)->get();    	
    	$activities = fractal($activities, new ActivityTransformer())->respond();
    	$activities = $activities->getData();

        /* Grocery widget */
        $grocery = Grocery::orderBy('created_at', 'DESC')->first();

        /* Weather widget */
        $weather = $this->getWeather();

        /* Report widget */
        $report = Report::orderBy('created_at', 'DESC')->first();

        /* Poll widget */
        $poll = Poll::orderBy('created_at','DESC')->first();

        /* Tap widget */
        $dateNow = date('Y-m-d');
        $tappers = TapList::orderBy('start', 'ASC')->where('start', '>=', $dateNow)->limit(3)->get();

        /* Event widget */
        $events = Event::orderBy('created_at', 'ASC')->where('start_time', '>=', $dateNow)->limit(2)->get();

        /* Members widget */
        $members = User::orderBy('created_at', 'DESC')->limit(6)->get();

        /* Contact widget */
        $message = ContactMessage::orderBy('created_at', 'DESC')->first();

    	return view('admin.dashboard', compact('user', 'activities', 'grocery', 'weather', 'report', 'poll', 'tappers', 'events', 'members', 'message'));
    }

    public function getFeed(){
    	$activities = auth()->user()->activity()->latest()->get();
    	
    	return fractal($activities, new ActivityTransformer())->respond();
    }

    protected function getWeather(){
        $apiUrl = "http://api.openweathermap.org/data/2.5/weather?q=Kruibeke&units=metric&APPID=d19d3c223dc74b0f41a0826766d21445";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $output = curl_exec($ch);

        curl_close($ch);

        $data = json_decode($output);

        $hourNow = date('G');

        switch ($data->weather[0]->main) {
            case 'Clouds':
                $weather['description'] = 'Bewolkt';
                if ($hourNow >= 7 && $hourNow < 21) {
                    $weather['icon'] = 'wi-day-cloudy';
                } elseif($hourNow < 7 || $hourNow >= 21) {
                    $weather['icon'] = 'wi-night-alt-cloudy';
                }                
                break;
            
            case 'Clear':
                if ($hourNow >= 7 && $hourNow < 21) {
                    $weather['description'] = 'Zonnig';
                    $weather['icon'] = 'wi-day-sunny';
                } elseif($hourNow < 7 || $hourNow >= 21) {
                    $weather['description'] = 'Onbewolkt';
                    $weather['icon'] = 'wi-night-clear';
                }                
                break;

            case 'Rain':
                $weather['description'] = 'Regenachtig';
                if ($hourNow >= 7 && $hourNow < 21) {
                    $weather['icon'] = 'wi-day-rain';
                } elseif($hourNow < 7 || $hourNow >= 21) {
                    $weather['icon'] = 'wi-night-alt-rain';
                }                
                break;

            case 'Snow':
                $weather['description'] = 'Sneeuw';
                if ($hourNow >= 7 && $hourNow < 21) {
                    $weather['icon'] = 'wi-day-snow';
                } elseif($hourNow < 7 || $hourNow >= 21) {
                    $weather['icon'] = 'wi-night-alt-snow';
                }                
                break;

            default:
                $weather['icon'] = 'wi-cloud';
                $weather['description'] = 'Bewolkt';
                break;
        }

        $weather["celcius"] = number_format($data->main->temp,0);

        return $weather;
    }

    public function settings()
    {
        $settings = WebsiteSettings::find(1);

        return view('admin.settings.websiteSettings', compact('settings'));
    }

    public function editCoverPhoto()
    {
        return view('admin.settings.editCoverPhoto');
    }

    public function updateCoverPhoto(Request $request)
    {
        $settings = WebsiteSettings::find(1);

        if ($request->file('cover_photo')) {
            File::delete(public_path('images/' . $settings->cover_photo));
            $file = $request->file('cover_photo');
            $extension = $file->getClientOriginalExtension();
            $imageName = $file->getClientOriginalName();
            $storageName = uniqid() . $imageName;
            $file = Image::make($file);
            $file->encode($extension);
            $path = public_path('images\\' . $storageName);
            $file->save($path, 65);

            $settings->cover_photo = $storageName;
        }

        if ($settings->save()) {
            return redirect(url('/admin/websitesettings'))->with('message', ['gelukt', 'Cover foto succesvol aangepast.']);
        }
        return redirect(url('/admin/websitesettings'))->with('message', ['gelukt', 'Er is iets fout gegaan bij het aanpassen van de cover foto.']);

    }
}
