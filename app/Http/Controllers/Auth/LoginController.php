<?php

namespace App\Http\Controllers\Auth;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    protected function redirectTo()
    {
        if (Auth()->user()->role_id == 1) {
            return route('dashboard');
        } elseif (Auth()->user()->role_id == 2) {
            return route('dashboard');
        } elseif (Auth()->user()->role_id == 3) {
            return route('welcome');
        }
    }

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
        return view('auth.registerAndLogin');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->role_id == 1) {
                // dd($request->all());
                return redirect()->route('dashboard');
            } elseif (auth()->user()->role_id == 2) {
                // dd($request->all());
                return redirect()->route('dashboard');
            } elseif (auth()->user()->role_id == 3) {
                // dd($request->all());
                $cartCount = Cart::where('customer_id', auth()->id())->count();
                session(['cartCount' => $cartCount]);
                
                return redirect()->route('welcome');
            } else {
                // dd($request->all());
                return back()->with('logError', 'Invalid Email or Password');
            }
        } else {
            // dd($request->all());
            return back()->with('logError', 'Invalid Email or Password');
        }
    }
}
