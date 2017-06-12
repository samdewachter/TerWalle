<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use File;
use Image;

class AccountController extends Controller
{
    public function index(User $user) {
    	return view('front.account', compact('user'));
    }

    public function editAccount(User $user) {
    	return view('front.editAccount', compact('user'));
    }

    public function updateAccount(User $user, Request $request) {
    	$user->first_name = $request->first_name;
    	$user->last_name = $request->last_name;
    	$user->email = $request->email;
    	$user->birth_year = $request->birth_year;

        if ($request->file('profile_photo')) {
            if ($user->photo != 'default.png') {
                File::delete(public_path('uploads/profilePhotos/' . $user->photo));
            }
            $file = $request->file('profile_photo');
            $extension = $file->getClientOriginalExtension();
            $imageName = $file->getClientOriginalName();
            $storageName = uniqid() . $imageName;
            $file = Image::make($file);
            $file->encode($extension);
            $path = public_path('uploads\\profilePhotos\\' . $storageName);
            $file->save($path, 65);

            $user->photo = $storageName;
        }

    	if ($user->save()) {
    		return redirect('/account/' . $user->id)->with('message', ['success', 'Uw account is succesvol gewijzigd.']);
        }
        return redirect('/account/' . $user->id)->with('message', ['error', 'Er liep iets fout bij het wijzigen van uw account.']);
    }

    public function editPassword(User $user) {
    	return view('front.editPassword', compact('user'));
    }

    public function updatePassword(User $user, Request $request) {
    	$newPassword = $request->password;
    	$confirmationPassword = $request->password_confirmation;
    	if ($newPassword != $confirmationPassword) {
    		return back()->with('message', ['error', 'De 2 paswoorden komen niet overeen. Probeer opnieuw.']);
    	}
    	$password = Hash::make($newPassword);
    	$user->password = $password;
    	if ($user->save()) {
    		return redirect('/account/' . $user->id)->with('message', ['success', 'Uw paswoord is succesvol gewijzigd.']);
        }
        return redirect('/account/' . $user->id)->with('message', ['error', 'Er liep iets fout bij het wijzigen van uw paswoord.']);
    }
}
