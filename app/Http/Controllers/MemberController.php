<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\PaidUser;

use Illuminate\Http\Request;

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
        if ($user->update($request->all())) {
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
}
