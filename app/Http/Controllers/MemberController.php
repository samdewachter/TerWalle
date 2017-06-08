<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\PaidUser;
use Hash;
use File;

use Illuminate\Http\Request;
use Image;

class MemberController extends Controller
{
    public function showMembers() {
    	$users = User::paginate(10);   

    	return view('admin.members.showMembers', compact('users'));
    }

    public function editMember(User $user) {
        $roles = Role::all();

        return view('admin.members.editMember', compact('user', 'roles'));
    }

    public function updateMember(User $user, Request $request) {
        $user->first_name = $request->first_name; 
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->birth_year = $request->birth_year;
        $user->role_id = $request->role_id;

        if ($request->file('photo')) {
            File::delete(public_path('uploads/profilePhotos/' . $user->photo));
            $file = $request->file('photo');
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
            return redirect('/admin/leden')->with('message', ['success', 'Profiel succesvol aangepast.']);
        }
        return redirect('/admin/leden')->with('message', ['error', 'Er liep iets fout bij het aanpassen van het profiel.']);
    }

    public function deleteMember(User $user) {
        if ($user->delete()) {
            return back()->with('message', ['success', 'Profiel succesvol verwijderd.']);
        }
        return back()->with('message', ['error', 'Er liep iets fout bij het verwijderen van het profiel.']);
    }

    public function searchMembers(Request $request)
    {
        if (isset($request->query->all()['query'])) {
            $keyword = $request->query->all()['query'];
        }else {
            $keyword = $request->search_member;
        }
        $users = User::search($keyword)->paginate(10);
        return view('admin.members.searchMembers', compact('users', 'keyword'));
    }

    public function paidMember(Request $request)
    {

        $year = date("Y"); 

        $paid = $request->paid;

        if ($paid == "true") {
            $paid = new PaidUser();
            $paid->user_id = $request->id;
            $paid->year = $year;
            $paid->save();
            echo "true";            
        } else {
            $paid = PaidUser::where([['year', $year], ['user_id', $request->id]])->first();
            $paid->delete();
        }
    }

    public function newMember(){
        $roles = Role::all();

        return view('admin.members.addMember', compact('roles'));
    }

    public function addMember(Request $request)
    {
        $member = new User();

        $member->first_name = $request->first_name; 
        $member->last_name = $request->last_name;
        $member->email = $request->email;
        $member->birth_year = $request->birth_year;
        $member->role_id = $request->role_id;
        $password = $request->password;
        $member->password =  Hash::make($password);

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $imageName = $file->getClientOriginalName();
            $storageName = uniqid() . $imageName;
            $file = Image::make($file);
            $file->encode($extension);
            $path = public_path('uploads\\profilePhotos\\' . $storageName);
            $file->save($path, 65);

            $member->photo = $storageName;
        }

        if ($member->save()) {
            return redirect('/admin/leden')->with('message', ['success', 'Profiel succesvol aangemaakt.']);
        }
        return redirect('/admin/leden')->with('message', ['error', 'Er liep iets fout bij het aanmaken van het profiel.']);
    }
}
