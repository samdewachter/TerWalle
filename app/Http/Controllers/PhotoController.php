<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\EventPhoto;
use App\Album;
use App\Event;
use Image;
use File;

class PhotoController extends Controller
{
    public function showAlbums()
    {
    	$albums = Album::orderBy('updated_at', 'DESC')->get();

    	return view('admin.photos.showAlbums', compact('albums'));
    }

    public function newAlbum()
    {
    	$events = Event::all();
    	return view('admin.photos.addAlbum', compact('events'));
    }

    public function addAlbum(Request $request)
    {
    	$this->validate($request, [
            'album_name' => 'required',
            'file' => 'required',
            'date' => 'required',
            'event_id' => 'required'
        ]);

    	$album_name = $request->album_name;
    	$date = $request->date;
    	$album = Album::where([['album_name', $album_name], ['date', $date]])->first();
    	if (!$album) {
    		$album = new Album();
    		$album->album_name = $album_name;
    		$album->date = $date;
    		$album->save();
    		$album->Events()->attach($request->event_id);
    	}

    	foreach ($request->file as $file) {
            $extension = $file->getClientOriginalExtension();
            $imageName = $file->getClientOriginalName();
            $storageName = uniqid() . $imageName;
            $file = Image::make($file);
            $file->encode($extension);
            if (!file_exists(public_path('uploads\\photos\\' . $album->id))) {
                mkdir(public_path('uploads\\photos\\' . $album->id), 666, true);
            }
            $path = public_path('uploads\\photos\\' . $album->id . '\\' . $storageName);

            $file->save($path, 65);

    		$photo = new EventPhoto();
    		$photo->album_id = $album->id;
    		$photo->photo = $storageName;
    		$photo->save();
    	}
    }

    public function deleteAlbum(Album $album){
        if ($album->Events()->detach() && $album->delete()) {
            return redirect(url('/admin/albums'))->with('message', ['success', 'Album succesvol verwijderd.']);
        }
        return redirect(url('/admin/albums'))->with('message', ['error', 'Er ging iets fout bij het verwijderen van het album.']);
        
    }

    public function showAlbum(Album $album) {
        $events = Event::all();
        return view('admin.photos.showAlbum', compact('album', 'events'));
    }

    public function deletePhoto(EventPhoto $photo){
        if ($photo->delete()) {
            return back()->with('message', ['success', 'Foto succesvol verwijderd.']);
        }
        return back()->with('message', ['error', 'Er ging iets fout bij het verwijderen van de foto.']);
    }

    public function newPhotos(Album $album){
        return view('admin.photos.addPhotos',compact('album'));
    }

    public function addPhotos(Request $request, Album $album){
        $album_name = $album->album_name;

        foreach ($request->file as $file) {
            $extension = $file->getClientOriginalExtension();
            $imageName = $file->getClientOriginalName();
            $storageName = uniqid() . $imageName;
            $file = Image::make($file);
            $file->encode($extension);
            if (!file_exists(public_path('uploads\\photos\\' . $album->id))) {
                mkdir(public_path('uploads\\photos\\' . $album->id), 666, true);
            }
            $path = public_path('uploads\\photos\\' . $album->id . '\\' . $storageName);

            $file->save($path, 65);

            $photo = new EventPhoto();
            $photo->album_id = $album->id;
            $photo->photo = $storageName;
            $photo->save();
        }
    }

    public function updateAlbum(Request $request, Album $album) {
        $album_name = $request->album_name;
        $album->album_name = $album_name;        
        $album->date = $request->date;
        $album->Events()->detach();
        $album->Events()->attach($request->event_id);
        if ($album->save()) {
            return back()->with('message', ['success', 'Album succesvol aangepast.']);
        }
        return back()->with('message', ['error', 'Er ging iets fout bij het aanpassen van het album.']);
    }

    public function searchAlbums(Request $request){
        if (isset($request->query->all()['query'])) {
            $keyword = $request->query->all()['query'];
        }else {
            $keyword = $request->search_album;
        }
        $albums = Album::search($keyword)->get();
        return view('admin.photos.searchAlbums', compact('albums', 'keyword'));
    }

    public function test(){
    	$event = Event::find(1);
    	var_dump($event->albums[0]->album_name);
    }
}
