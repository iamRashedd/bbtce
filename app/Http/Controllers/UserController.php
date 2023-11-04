<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(){

    }
    public function register(){

        return view("user.Register");
    }
    public function store(Request $request){
        /*
        $request->validate([
            "email"=> "required",
            "password"=> "required",
            "confirmPassword" => "required",
            "firstName"=> "required",
            "lastName"=> "required",
            "username"=> "required",
            ]);
        */

        
        
        $action = true;


        if(!$action){
            return redirect()->back()->with("error","Not valid");
            
        }

        $ID = null;

        do {
            $ID = rand(100, 99999);
        }
        while (
            Profile::where('ID', $ID)->exists()
        );
        
        $user = new User();
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        
        $profile = new Profile();

        $profile->first_name = $request->firstName;
        $profile->last_name = $request->lastName;
        $profile->username = $request->username;
        $profile->account_number = $ID;
        $profile->user_id = $user->id;
        $profile->save();


        Auth::login($user);
        return redirect()->route('home')->with("success","Successfully created");

    }

    public function show(){
        $user = User::find(auth()->user()->id);
        return view("user.Profile",compact("user"));
    }

    public function edit(){
        $user = User::find(auth()->user()->id);
        return view("user.Edit",compact("user"));
    }

    public function update(Request $request, $id){

    }

    public function destroy($id){
    
    }

    public function login(){
        if(auth()->user()){
            return redirect()->route('home');
        }
        return view("user.Login");
    }
    public function loginSubmit(Request $request){
        //dd($request->all());
        $request->validate([
            "email"=> "required",
            "password"=> "required",
        ]);
        $user = User::where('email',$request->email)->where('password',$request->password)->first();
        if($user){
            Auth::login($user);
            return redirect()->route('home');
        }else{
        return redirect()->route('user.login');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('user.login');
    }
    public function changePassword(Request $request){
    
    }


}
