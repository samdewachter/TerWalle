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
    	$news = new News();

    	$news->title = $request->title;
    	$news->subtitle = $request->subtitle;
    	$news->text = $request->text;


    	$file = $request->file('cover_photo');
    	$extension = $file->getClientOriginalExtension();
        $imageName = $file->getClientOriginalName();
        $storageName = uniqid() . $imageName;
		$file = Image::make($file);
		$file->encode($extension);
		$path = public_path('uploads\\newsPhotos\\' . $storageName);
		$file->save($path, 65);

		$news->cover_photo = $storageName;

    	if ($news->save()) {
    		return redirect(url('/admin/nieuwtjes'))->with('message', ['success', 'Niewsartikel succesvol aangemaakt.']);
    	}
    	return redirect(url('/admin/nieuwtjes'))->with('message', ['error', 'Er ging iets fout bij het aanmaken van het nieuwsartikel.']);
    }

    public function editNews(News $news){
    	return view('admin.news.editNews', compact('news'));
    }

    public function updateNews(Request $request, News $news){
    	$news->title = $request->title;
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
			$path = public_path('uploads\\newsPhotos\\' . $storageName);
			$file->save($path, 65);

			$news->cover_photo = $storageName;
    	}
    	if ($news->save()) {
    		return redirect(url('/admin/nieuwtjes'))->with('message', ['success', 'Niewsartikel succesvol aangepast.']);
    	}
    	return redirect(url('/admin/nieuwtjes'))->with('message', ['error', 'Er ging iets fout bij het aanpassen van het nieuwsartikel.']);
    }

    public function deleteNews(News $news){
    	File::delete(public_path('uploads/newsPhotos/' . $news->cover_photo));
    	if ($news->delete()) {
    		return redirect(url('/admin/nieuwtjes'))->with('message', ['success', 'Niewsartikel succesvol verwijderd.']);
    	}
    	return redirect(url('/admin/nieuwtjes'))->with('message', ['error', 'Er ging iets fout bij het verwijderen van het nieuwsartikel.']);
    }

    public function publishNews(Request $request){
    	$news = News::find($request->id);
        if ($request->publish) {
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
}
