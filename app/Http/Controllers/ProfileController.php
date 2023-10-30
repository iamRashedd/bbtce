<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        dump(auth()->user()->profile->first_name);
        $profiles = Profile::all();

        return view("profile.Accounts",compact("profiles"));

    }
    public function store(Request $request){
    
    }
    public function show($id){
        
        $profile = Profile::find($id);

        return $profile;

    }
    public function edit($id){

    }
    public function update(Request $request, $id){
    
    }
    public function destroy($id){
    
    }
    public function get($id){


    }
    public function getProfileByAccount($account){
        $profile = Profile::where("account_number",$account)->first();
        return $profile;
    }
    public function transferForm(){
        $profiles = Profile::get();
        return view("Transfer",compact("profiles"));
    }
    public function transferSubmit(Request $request){

        //dd($request->all());

        $profile = $this->getProfileByAccount($request->profile);
        
        
        $profile->addBalance($request->amount,$request->currency);
        
        return redirect()->route('profile.list');

        //return view("Transfer",compact(["profile","profile2"]));

    }

    public function changeCurrencyForm(){
        $profiles = Profile::get();
        return view("Conversion",compact("profiles"));
    }
    public function changeCurrencySubmit(Request $request){

        //dd($request->all());

        $profile = $this->getProfileByAccount($request->profile);
        
        
        $action = $profile->removeBalance($request->amount,$request->currency);

        if($action){
            $profile->addBalanceWithConversion($request->amount,$request->currency,$request->currency2);
            return redirect()->route('profile.list');
        }
        
        return redirect()->route('profile.conversion')->withErrors("Insufficient Balance");

        //return view("Transfer",compact(["profile","profile2"]));

    }

    public function withdrawForm(){
        $profiles = Profile::get();
        return view("Withdraw",compact("profiles"));
    }
    public function withdrawSubmit(Request $request){

        //dd($request->all());

        $profile = $this->getProfileByAccount($request->profile);
        
        
        $action = $profile->removeBalance($request->amount,$request->currency);
        if($action){
            return redirect()->route('profile.list');
        }
        else{
            return redirect()->route('profile.withdraw')->withErrors("Insufficient Balance");
        }
        //return view("Transfer",compact(["profile","profile2"]));

    }
}
