<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

    public function username(){
        return 'username';
    }

    public function defaultIndex()
    {
        // return view('login.index', ["title" => "Login Page"]);
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $registeredData = DB::table('users')->where('username', $request->get('username'))->get();
        //dd($registeredData->count());

        $validatedData = $request->validate([
            'username' => ['required', 'max:255'],
            'password' => ['required', 'min: 3', 'max: 255']
        ]);

        if ($registeredData->count() == null) {
            return back()->withErrors([
                'password' => ['The provided password does not exist.'],
                'username' => ['The provided username does not exist.']
            ]);
        }

        if (! Hash::check($validatedData['password'], $registeredData[$registeredData->count()-1]->password)) {
            return back()->withErrors([
                'password' => ['The provided password does not exist.'],
                'username' => ['The provided username does not exist.']
            ]);
        }
        
        
        return redirect('/admin?d=dashboard');
    }
}