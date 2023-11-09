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
        if(!auth()->user()->isAdmin()){
            abort(401,"You don't have access");
        }
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

        //dd($request->all());
        
        
        $action = true;


        if(!$action){
            return redirect()->back()->with("error","Not valid");
            
        }

        $ID = null;

        do {
            $ID = rand(100000, 199999);
        }
        while (
            Profile::where('ID', $ID)->exists()
        );
        
        $user = new User();
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = User::ROLE_USER;
        $user->status = USER::STATUS_INACTIVE;
        $user->save();
        
        $profile = new Profile();

        if($request->hasFile('photo')){
            $imageName = $ID.'_photo.'.$request->file('photo')->extension();
            $request->photo->move('assets/uploads/', $imageName);
            $profile->photo=$imageName;   
        }
        if($request->hasFile('nid')){
            $imageName = $ID.'_nid.'.$request->file('nid')->extension();
            $request->nid->move('assets/uploads/', $imageName);
            $profile->nid=$imageName;   
        }

        $profile->first_name = $request->firstName;
        $profile->last_name = $request->lastName;
        $profile->username = $request->username;
        $profile->phone = $request->phone;
        $profile->age = $request->age;
        $profile->gender = $request->gender;
        $profile->account_number = $ID;
        $profile->user_id = $user->id;
        $profile->save();


        $message = 'Account Registered! Pending Approval';
        $status = 'SUCCESS';

        return view("user.Login",compact("status","message"));

    }

    public function show(){
        $user = User::find(auth()->user()->id);
        return view("user.Profile",compact("user"));
    }

    public function edit(){
        $user = User::find(auth()->user()->id);
        return view("user.Edit",compact("user"));
    }

    public function update(Request $request){
        $request->validate([
            "oldPassword" => "required",
            "firstName" => "required",
            "lastName" => "required",
        ]);
        if(auth()->user()->getAuthPassword() == $request->oldPassword){
            $profile = Profile::find(auth()->user()->profile->id);

            if($request->hasFile('photo2')){
                $imageName = $profile->account_number.'_photo.'.$request->file('photo2')->extension();
                $request->photo2->move('assets/uploads/', $imageName);
                $profile->photo = $imageName;   
            }
            if($request->hasFile('nid2')){
                $imageName = $profile->account_number.'_nid.'.$request->file('nid2')->extension();
                $request->nid2->move('assets/uploads/', $imageName);
                $profile->nid = $imageName;   
            }
            
            $profile->first_name = $request->firstName;
            $profile->last_name = $request->lastName;
            $profile->phone = $request->phone;
            $profile->age = $request->age;
            $profile->gender = $request->gender;
            $profile->save();

            if(!empty($request->newPassword) && $request->newPassword == $request->confirmPassword){
                $user = User::find(auth()->user()->id);
                $user->password = $request->newPassword;
                $user->save();
            }
            $message = "Profile Updated";
            $status = "Success";
        }
        else{
            $message = "Incorrect Password";
            $status = "Failed";
        }

        return redirect()->route('user.show');

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
        $message = null;
        $status = null;
        $user = User::where('email',$request->email)->where('password',$request->password)->first();
        if($user){
            if($user->isActive()){
                Auth::login($user);
                return redirect()->route('home');
            }
            else{
                $message = 'Account is not activated yet!';
                $status = 'FAILED';
            }
        }
        else{
            $message = 'Incorrect Email/Password';
            $status = 'FAILED';
        }

        return view("user.Login",compact("status","message"));
        
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('user.login');
    }
    public function changePassword(Request $request){
    
    }


}
