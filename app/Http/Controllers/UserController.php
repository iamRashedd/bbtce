<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(){

    }
    public function store(Request $request){
        
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
            return redirect()->route('profile.list');
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
