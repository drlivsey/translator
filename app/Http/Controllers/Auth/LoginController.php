<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('authorisation');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'login' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);
    }

    public function Login(Request $request)
    {
        $validator = $this->validator($request->all()); // ВОЗМОЖНА ОШИБКА
        if ($validator->fails()) {          
            return Redirect::back()->withErrors($validator)->withInput();
        };
        if (Auth::attempt(['login' => $request->login, 'password' => $request->password], true)){
            return redirect('home');
        }
        return Redirect::back()->withErrors(['password' => 'Wrong e-mail or password'])->withInput(); 
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
