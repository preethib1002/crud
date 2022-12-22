<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PassportAuthController extends Controller
{

    public function register(Request $request){
        $validator = Validator::make($request->all(),
             [
                 'name'=>'required',
                 'email'=>'required|email',
                 'password'=>'required',
                // 'c_password'=>'required|same:password'
             ]
             );
         if($validator->fails()){
             return response()->json(['message'=>'validator error'],401);
         }
         $data = $request -> all();
         $data['password']=Hash::make($data['password']);
         $user=User::create($data);
         $response['token'] = $user->createToken('crud')->accessToken;
         $response['name'] = $user->name;
         return response()->json($response,200);
     }

   public function login(Request $request)
   {
       $data = [
           'email' => $request->email,
           'password' => $request->password
       ];

       if (Auth()->attempt($data)) {
           $token = Auth()->user()->createToken('crud')->accessToken;
           return response()->json(['token' => $token], 200);
       } else {
           return response()->json(['error' => 'Unauthorised'], 401);
       }
   }

     public function detail(){
         $user = Auth::user();

         $data = [
             'name'=>$user->name,
             'email'=>$user->email,
         ];
         $response['user'] = $data;
         return response()->json($response,200);
     }

}
