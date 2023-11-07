<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function addmoney(){
        if(!auth()->user()->isAdmin()){
            abort(401,"You don't have access");
        }
        $profiles = Profile::get();
        return view("admin.AddMoney",compact("profiles"));
    }

    public function addmoneySubmit(Request $request){
        
        if(!auth()->user()->isAdmin()){
            abort(401,"You don't have access");
        }

        $profile = Profile::where("account_number",$request->profile)->first();
        $message = null;
        $status = null;
        
        $profile->addBalance($request->amount,$request->currency);
        $message = 'Balance Added';
        $status = Transaction::STATUS_SUCCESS;

        Transaction::create([
            "sender_account_number" => 111111,
            "reciever_account_number" => $profile->account_number,
            "type" => Transaction::TYPE_ADMIN_ADDMONEY,
            "amount"=> $request->amount,
            "currency"=> $request->currency,
            "current_balance"=> $profile->getBalance($request->currency),
            "current_balance_currency"=> $request->currency,
            "status" => $status,
            "remarks" => $message,
        ]);
        $profiles = Profile::get();
        return view("admin.AddMoney",compact("profiles","message","status"));

    }

    public function showTransactions()
    {
        if(!auth()->user()->isAdmin()){
            abort(401,"You don't have access");
        }
        $transactions = Transaction::all();
        return view("profile.Transactions", compact("transactions"));
    }

    public function showProfiles(){
        if(!auth()->user()->isAdmin()){
            abort(401,"You don't have access");
        }
        $profiles = Profile::all();
        return view("admin.Accounts",compact("profiles"));
    }
    public function showUsers(){
        if(!auth()->user()->isAdmin()){
            abort(401,"You don't have access");
        }
        $users = User::all();
        return view("admin.Users",compact("users"));
    }
    public function activateUser($id){
        $user = User::find($id);
        $user->status = USER::STATUS_ACTIVE;
        $user->save();
        return redirect()->route("admin.user.list");
    }
    
    public function deactivateUser($id){
        $user = User::find($id);
        if(!$user->isAdmin()){
            $user->status = USER::STATUS_INACTIVE;
        }
        $user->save();
        return redirect()->route("admin.user.list");
    }
    
    public function deleteUser($id){
        $user = User::find($id);
        if(!$user->isAdmin()){
            $user->delete();
        }
        return redirect()->route("admin.user.list");
    }
}
