<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    // check if authenticated, then redirect to dashboard
    // protected function authenticated() {
    //     if (\Auth::check()) {
    //         return redirect()->route('admin.home');
    //     }
    // }



    // protected function authenticated(Request $request, $user) {
    //     if ($user->role_id == 1) {
    //         return redirect('/admin');
    //     } else if ($user->role_id == 2) {
    //         return redirect('/author');
    //     } else {
    //         return redirect('/blog');
    //     }
    // }
    
}
