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

    public function adminaddmoney(){

        $profiles = Profile::get();
        return view("profile.AddMoney",compact("profiles"));
    }

    public function adminaddmoneySubmit(Request $request){

        $profile = $this->getProfileByAccount($request->profile);
        
        
        $profile->addBalance($request->amount,$request->currency);
        
        return redirect()->route('profile.list');

    }
    public function addmoney(){

        $profile = auth()->user()->profile;
        return view("profile.AddMoney",compact("profile"));
    }

    public function addmoneySubmit(Request $request){

        $request->validate([
            "amount"=> "required",
            "currency"=> "required",
        ]);

        $profile = auth()->user()->profile;
        
        $profile->addBalance($request->amount,$request->currency);
        
        return redirect()->route('profile.list');

    }
    public function getProfileByAccount($account){
        $profile = Profile::where("account_number",$account)->first();
        return $profile;
    }
    public function transferForm(){
        $profile = auth()->user()->profile;
        return view("profile.Transfer",compact("profile"));
    }
    public function transferSubmit(Request $request){

        //dd($request->all());

        $request->validate([
            "transferToAccount"=> "required",
            "amount"=> "required",
        ]);

        $transfer = $this->getProfileByAccount($request->transferToAccount);
        
        if(!$transfer){
            return redirect()->route("profile.transfer");
        }
        
        $action = auth()->user()->profile->removeBalance($request->amount,$request->currency);
        if($action){
            $transfer->addBalance($request->amount,$request->currency);
            return redirect()->route('home');
        }else{
            return redirect()->route('profile.transfer');
        }
        

        //return view("Transfer",compact(["profile","profile2"]));

    }

    public function changeCurrencyForm(){
        $profile = auth()->user()->profile;
        return view("profile.Conversion",compact("profile"));
    }
    public function changeCurrencySubmit(Request $request){
        
        $profile = auth()->user()->profile;
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
