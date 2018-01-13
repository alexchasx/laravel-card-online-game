<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator as Validation;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Jobs\SendVerificationEmail;

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
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  Request $request
     *
     * @return Validation
     */
    protected function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param Request $request
     *
     * @return User
     */
    protected function create(Request $request)
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_token' => str_random($request->email),
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function register(Request $request)
    {
        $this->validator($request)
            ->validate();

        event(new Registered(
            $user = $this->create($request)
        ));

        dispatch(new SendVerificationEmail($user));

        return view('verification');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param string $token
     *
     * @return Response
     */
    public function verify($token)
    {
        $user = User::where('email_token', $token)->first();
        $user->verified = true;
        if ($user->save()) {

            return view('email_confirm', ['user' => $user]);
        }
    }
}
