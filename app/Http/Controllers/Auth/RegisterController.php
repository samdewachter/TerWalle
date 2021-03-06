<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'birth_year' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'profile_photo' => 'max:1999',
        ], [
            'first_name.required' => 'Het voornaam veld is verplicht.',
            'last_name.required' => 'Het achternaam veld is verplicht.',
            'email.required' => 'Het email veld is verplicht.',
            'email.email' => 'Dit is een ongeldig emailadres.',
            'email.unique' => "Het email adres is al in gebruik.",
            'birth_year.required' => 'Het geboortejaar veld is verplicht.',
            'profile_photo.max' => "De foto mag maximum 2MB groot zijn."
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $storageName = "default.png";
        if (Input::file('profile_photo')) {
            $file = Input::file('profile_photo');
            $extension = $file->getClientOriginalExtension();
            $imageName = $file->getClientOriginalName();
            $storageName = uniqid() . $imageName;
            $file = Image::make($file);
            $file->encode($extension);
            $path = public_path('uploads\\profilePhotos\\' . $storageName);

            $file->save($path, 65);
        }

        $title_url = clean($data['first_name']) . '-' . clean($data['last_name']);

        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'title_url' => $title_url,
            'email' => $data['email'],
            'birth_year' => $data['birth_year'],
            'photo' => $storageName,
            'password' => bcrypt($data['password']),
        ]);
    }
}
