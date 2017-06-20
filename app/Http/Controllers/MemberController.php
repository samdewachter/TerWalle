<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\PaidUser;
use Hash;
use File;

use Illuminate\Http\Request;
use Image;
use App\CoreMember;
use Mail;
use App\Mail\MemberCreated;

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
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'birth_year' => 'required',
            'role_id' => 'required'
        ], [
            'first_name.required' => 'Het voornaam veld is verplicht.',
            'last_name.required' => 'Het achternaam veld is verplicht.',
            'email.required' => 'Het email veld is verplicht.',
            'email.email' => 'Dit is een ongeldig emailadres.',
            'email.unique' => "Het email adres is al in gebruik.",
            'birth_year.required' => 'Het geboortejaar veld is verplicht.',
            'role_id' => "Het role veld is verplicht."
        ]);

        $user->first_name = $request->first_name; 
        $user->last_name = $request->last_name;
        $title_url = clean($user->first_name) . '-' . clean($user->last_name);
        $user->title_url = $title_url;
        $user->email = $request->email;
        $user->birth_year = $request->birth_year;

        if($user->role_id != $request->role_id) {
            switch ($request->role_id) {
                case 3:
                    $user->CoreMember->delete();
                    break;

                case 2:
                    if ($user->role_id == 3) {
                        $core_member = new CoreMember();
                        $core_member->user_id = $user->id;
                        $core_member->save();
                    }
                    break;

                case 1:
                    if ($user->role_id == 3) {
                        $core_member = new CoreMember();
                        $core_member->user_id = $user->id;
                        $core_member->save();
                    }
                    break;
                
                default:
                    break;
            }
        }

        $user->role_id = $request->role_id;

        if ($request->file('photo')) {
            File::delete(public_path('uploads/profilePhotos/' . $user->photo));
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $imageName = $file->getClientOriginalName();
            $storageName = uniqid() . $imageName;
            $file = Image::make($file);
            $file->encode($extension);
            $file->fit(500);
            $path = public_path('uploads\\profilePhotos\\' . $storageName);
            $file->save($path, 65);

            $user->photo = $storageName;
        }

        if ($user->save()) {
            return redirect('/admin/leden')->with('message', ['gelukt', 'Profiel succesvol aangepast.']);
        }
        return redirect('/admin/leden')->with('message', ['error', 'Er liep iets fout bij het aanpassen van het profiel.']);
    }

    public function deleteMember(User $user) {
        if ($user->delete()) {
            return back()->with('message', ['gelukt', 'Profiel succesvol verwijderd.']);
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
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'birth_year' => 'required',
            'role_id' => 'required',
            'password' => 'required|min:6'
        ], [
            'first_name.required' => 'Het voornaam veld is verplicht.',
            'last_name.required' => 'Het achternaam veld is verplicht.',
            'email.required' => 'Het email veld is verplicht.',
            'email.email' => 'Dit is een ongeldig emailadres.',
            'email.unique' => "Het email adres is al in gebruik.",
            'birth_year.required' => 'Het geboortejaar veld is verplicht.',
            'role_id.required' => "Het role veld is verplicht.",
            'password.required' => "Het paswoord veld is verplicht.",
            'password.min' => "Het paswoord moet minstens :min karakters hebben."
        ]);

        $member = new User();

        $member->first_name = $request->first_name; 
        $member->last_name = $request->last_name;
        $title_url = clean($member->first_name) . '-' . clean($member->last_name);
        $member->title_url = $title_url;
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
            $file->fit(500);
            $path = public_path('uploads\\profilePhotos\\' . $storageName);
            $file->save($path, 65);

            $member->photo = $storageName;
        } else {
            $member->photo = "default.png";
        }

        if ($member->save()) {
            Mail::to($member->email)->queue(new MemberCreated($member, $password));
            return redirect('/admin/leden')->with('message', ['gelukt', 'Profiel succesvol aangemaakt.']);
        }
        return redirect('/admin/leden')->with('message', ['error', 'Er liep iets fout bij het aanmaken van het profiel.']);
    }

    public function showCoreMembers() {
        $core_members = CoreMember::all();

        return view('admin.members.showCoreMembers', compact('core_members'));
    }

    public function editCoreMember(CoreMember $core_member) {
        $roles = Role::all();

        return view('admin.members.editCoreMember', compact('core_member', 'roles'));
    }

    public function updateCoreMember(CoreMember $core_member, Request $request) {
        $this->validate($request, [
            'function' => 'required',
            'role_id' => 'required',
        ], [
            'function.required' => 'Het functie veld is verplicht',
            'role_id.required' => "Het role veld is verplicht.",
        ]);

        $core_member->User->role_id = $request->role_id;

        if ($request->role_id == 3) {
            if ($core_member->User->save() && $core_member->delete()) {
                return redirect('/admin/kernleden')->with('message', ['gelukt', 'Kernlid succesvol verwijderd.']);
            }
            return redirect('/admin/kernleden')->with('message', ['error', 'Er liep iets fout bij het verwijderen van het kernlid.']);
        }

        $core_member->function = $request->function;
        

        if ($core_member->save() && $core_member->User->save()) {
            return redirect('/admin/kernleden')->with('message', ['gelukt', 'Kernlid succesvol aangepast.']);
        }
        return redirect('/admin/kernleden')->with('message', ['error', 'Er liep iets fout bij het aanpassen van het kernlid.']);
    }

    public function index() {
        $core_members = CoreMember::all();

        return view('front.coreMembers', compact('core_members'));
    }
}
