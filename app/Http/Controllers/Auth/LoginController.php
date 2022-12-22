<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{


    // Connect to DB and post notification

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
    //public function postNotification($contacts, $countries){


   // protected $redirectTo = RouteServiceProvider::HOME;
  //}

    protected function redirectTo()
  {
  if (Auth::user()->role == 'Admin')
  {
    return 'contacts';
   // return "hi!! Admin" ; // admin dashboard path
  } else {
    return 'contacts';  // member dashboard path
  }
  //dd('Auth::user()');
}




/*protected function authenticated(Request $request, $user)
{
  if ($user->role == 'Admin') {
     return redirect('/home');
  } else if($user->role == 'user') {
     return redirect('/home');
  }
  abort(401);
}
*/





    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
