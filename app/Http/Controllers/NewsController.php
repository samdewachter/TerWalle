<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Image;
use File;

class NewsController extends Controller
{
    public function showNews(){
    	$news = News::paginate(10);

    	return view('admin.news.showNews', compact('news'));
    }

    public function newNews(){
    	return view('admin.news.addNews');
    }

    public function addNews(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
            'subtitle' => 'required',
            'cover_photo' => 'required|mimes:jpg,png,jpeg',
        ], [
            'function.required' => 'Het functie veld is verplicht',
            'text.required' => "Het tekst veld is verplicht.",
            'subtitle.required' => "Het subtitel veld is verplicht.",
            'cover_photo.required' => "Het cover foto veld is verplicht.",
            'cover_photo.mimes' => "De cover foto mag enkel jpg, png of jpeg zijn.",
        ]);

    	$news = new News();

    	$news->title = $request->title;
        $news->title_url = clean($news->title);
        if ($request->publish) {
            $news->publish = true;
        } else {
            $news->publish = false;
        }
    	$news->subtitle = $request->subtitle;
    	$news->text = $request->text;


    	$file = $request->file('cover_photo');
    	$extension = $file->getClientOriginalExtension();
        $imageName = $file->getClientOriginalName();
        $storageName = uniqid() . $imageName;
		$file = Image::make($file);
		$file->encode($extension);
		$file->save(base_path() . '/public/uploads/newsPhotos/' . $storageName, 65);

		$news->cover_photo = $storageName;

    	if ($news->save()) {
    		return redirect(url('/admin/nieuwtjes'))->with('message', ['gelukt', 'Niewsartikel succesvol aangemaakt.']);
    	}
    	return redirect(url('/admin/nieuwtjes'))->with('message', ['error', 'Er ging iets fout bij het aanmaken van het nieuwsartikel.']);
    }

    public function editNews(News $news){
    	return view('admin.news.editNews', compact('news'));
    }

    public function updateNews(Request $request, News $news){
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
            'subtitle' => 'required',
            'cover_photo' => 'required|mimes:jpg,png,jpeg',
        ], [
            'function.required' => 'Het functie veld is verplicht',
            'text.required' => "Het tekst veld is verplicht.",
            'subtitle.required' => "Het subtitel veld is verplicht.",
            'cover_photo.mimes' => "De cover foto mag enkel jpg, png of jpeg zijn.",
        ]);

    	$news->title = $request->title;
        $news->title_url = clean($news->title);
        if ($request->publish) {
            $news->publish = true;
        } else {
            $news->publish = false;
        }
    	$news->subtitle = $request->subtitle;
    	$news->text = $request->text;
    	if ($request->file('cover_photo')) {
    		File::delete(public_path('uploads/newsPhotos/' . $news->cover_photo));
    		$file = $request->file('cover_photo');
	    	$extension = $file->getClientOriginalExtension();
	        $imageName = $file->getClientOriginalName();
	        $storageName = uniqid() . $imageName;
			$file = Image::make($file);
			$file->encode($extension);
			$file->save(base_path() . '/public/uploads/newsPhotos/' . $storageName, 65);

			$news->cover_photo = $storageName;
    	}
    	if ($news->save()) {
    		return redirect(url('/admin/nieuwtjes'))->with('message', ['gelukt', 'Niewsartikel succesvol aangepast.']);
    	}
    	return redirect(url('/admin/nieuwtjes'))->with('message', ['error', 'Er ging iets fout bij het aanpassen van het nieuwsartikel.']);
    }

    public function deleteNews(News $news){
    	File::delete(public_path('uploads/newsPhotos/' . $news->cover_photo));
    	if ($news->delete()) {
    		return redirect(url('/admin/nieuwtjes'))->with('message', ['gelukt', 'Niewsartikel succesvol verwijderd.']);
    	}
    	return redirect(url('/admin/nieuwtjes'))->with('message', ['error', 'Er ging iets fout bij het verwijderen van het nieuwsartikel.']);
    }

    public function publishNews(Request $request){
    	$news = News::find($request->id);
        if ($request->publish == 'true') {
            $news->publish = true;
        } else {
            $news->publish = false;
        }
        $news->save();
    }

    public function searchNews(Request $request)
    {
        if (isset($request->query->all()['query'])) {
            $keyword = $request->query->all()['query'];
        }else {
            $keyword = $request->search_news;
        }
        $news = News::search($keyword)->paginate(10);
        return view('admin.news.searchNews', compact('news', 'keyword'));
    }

    public function index()
    {
        $news = News::orderBy('created_at', 'DESC')
            ->where('publish', true)
            ->paginate(10);

        return view('front.news', compact('news'));
    }

    public function showNewsItem(News $news)
    {
        if ($news->publish) {
            return view('front.newsItem', compact('news'));
        }
        return back()->with('message', ['error', 'U probeert een artikel te bekijken dat niet meer is gepubliceerd']);
    }
}
