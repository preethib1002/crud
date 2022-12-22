<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


          // $user = User::find($id);
           // $contacts = Contact::all();
            //return view('home')->with('users', $user);

      //  return view('home');
   // }
   // public function show($id){
            // $users = User::find($id);
            $user = Auth::user();
            $users = User::all();
           return view('home')->with('users', $users);
    }
}
