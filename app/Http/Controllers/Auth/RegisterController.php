<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Organization;


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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $users = User::all();
        return view('auth.register', compact('users'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'regex:/^\S*$/', 'alpha'],
            'surname' => ['required', 'string', 'regex:/^\S*$/', 'alpha', 'max:255',],
            'invite' => ['required'],
            'organization' => ['required', 'string', 'max:255',],
            'phone' => ['required', 'integer', 'unique:users', 'digits_between:6,15'],
            'password' => ['required', 'string', 'confirmed'],
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function create(array $data)
    {
        $valid = $this->validator($data);
        if ($valid->fails()) {
            return redirect()->route('register')
                ->withErrors($valid)
                ->withInput();
        }
        $org = Organization::firstOrCreate([
            'name' => $data['organization']
        ]);
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'phone' => $data['phone'],
            'organization' => $org['name'],
            'invite' => $data['invite'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
