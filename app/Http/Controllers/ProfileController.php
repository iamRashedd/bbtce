<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
  
    public function show($id){
        
        $profile = Profile::find($id);

        return $profile;

    }

    public function addmoney(){

        $profile = auth()->user()->profile;
        
        return view("profile.AddMoney",compact("profile"));
    }

    public function addmoneySubmit(Request $request){

        $request->validate([
            "amount"=> "required",
            "currency"=> "required",
            "password" => "required",
        ]);

        $profile = auth()->user()->profile;
        $message = null;
        $status = null;

        if(auth()->user()->getAuthPassword() == $request->password){
            $profile->addBalance($request->amount,$request->currency);
            $status = Transaction::STATUS_SUCCESS;
            $message = 'Balance Added';
            
        }
        else{
            $status = Transaction::STATUS_FAILED;
            $message = 'Incorrect Password';
        }

        Transaction::create([
            "sender_account_number" => $profile->account_number,
            "reciever_account_number" => $profile->account_number,
            "type" => Transaction::TYPE_ADDMONEY,
            "amount"=> $request->amount,
            "currency"=> $request->currency,
            "current_balance"=> $profile->getBalance($request->currency),
            "current_balance_currency"=> $request->currency,
            "status" => $status,
            "remarks" => $message,
        ]);

        return view("profile.AddMoney",compact("profile","status","message"));
        

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
            "transferToAccount" => "required",
            "amount" => "required",
            "password" => "required",
        ]);
        $message = null;
        $status = null;

        $profile = auth()->user()->profile;
        if(auth()->user()->getAuthPassword() == $request->password){
            $transfer = $this->getProfileByAccount($request->transferToAccount);
            
            if($transfer){
                $action = auth()->user()->profile->removeBalance($request->amount,$request->currency);

                if($action){
                    $transfer->addBalance($request->amount,$request->currency);
                    $status = Transaction::STATUS_SUCCESS;
                    $message = "Balance Transfered";
                }else{
                    $status = Transaction::STATUS_FAILED;
                    $message = 'Insufficient Balance';
                }
            }else{
                $status = Transaction::STATUS_FAILED;
                $message = 'No Account Found';
            }
        }
        else{
            $status = Transaction::STATUS_FAILED;
            $message = 'Incorrect Password';
        }
        
        
        Transaction::create([
            "sender_account_number" => $profile->account_number,
            "reciever_account_number" => $request->transferToAccount,
            "type" => Transaction::TYPE_TRANSFER,
            "amount"=> $request->amount,
            "currency"=> $request->currency,
            "current_balance"=> auth()->user()->profile->getBalance($request->currency),
            "current_balance_currency"=> $request->currency,
            "status" => $status,
            "remarks" => $message,
        ]);

        return view("profile.Transfer",compact("profile","status","message"));

    }

    public function changeCurrencyForm(){
        $profile = auth()->user()->profile;
        return view("profile.Conversion",compact("profile"));
    }
    public function changeCurrencySubmit(Request $request){

        $request->validate([
            "currency" => "required",
            "currency2"=> "required",
            "amount" => "required",
            "password" => "required",
        ]);

        
        $profile = auth()->user()->profile;
        $message = null;
        $status = null;
        if( auth()->user()->getAuthPassword() == $request->password ){
            $action = $profile->removeBalance($request->amount,$request->currency);

            if($action){
                $profile->addBalanceWithConversion($request->amount,$request->currency,$request->currency2);
                $message = "Currency Converted";
                $status = Transaction::STATUS_SUCCESS;
            }
            else{
                $message = "Insufficient Balance";
                $status = Transaction::STATUS_FAILED;
            }
        }
        else{
            $message = "Incorrect Password";
            $status = Transaction::STATUS_FAILED;
        }

        Transaction::create([
            "sender_account_number" => $profile->account_number,
            "reciever_account_number" => $profile->account_number,
            "type" => Transaction::TYPE_CONVERSION,
            "amount"=> $request->amount,
            "currency"=> $request->currency2,
            "current_balance"=> $profile->getBalance($request->currency),
            "current_balance_currency"=> $request->currency,
            "status" => $status,
            "remarks" => $message,
        ]);
        

        return view("profile.Conversion",compact("profile","status","message"));

    }

    public function withdrawForm(){
        $profile = auth()->user()->profile;
        return view("profile.Withdraw",compact("profile"));
    }
    public function withdrawSubmit(Request $request){

        $request->validate([
            "currency" => "required",
            "amount" => "required",
            "password" => "required",
        ]);

        $profile = auth()->user()->profile;

        $message = null;
        $status = null;
        
        if( auth()->user()->getAuthPassword() == $request->password ){
            $action = $profile->removeBalance($request->amount,$request->currency);
            if($action){
                $status = Transaction::STATUS_SUCCESS;
                $message = "Balance Withdrawn";
            }
            else{
                $status = Transaction::STATUS_FAILED;
                $message = "Insufficient Balance";    
            }

        }
        else{
            $status = Transaction::STATUS_FAILED;
            $message = "Incorrect Password";
        }

        Transaction::create([
            "sender_account_number" => $profile->account_number,
            "reciever_account_number" => $profile->account_number,
            "type" => Transaction::TYPE_WITHDRAW,
            "amount"=> $request->amount,
            "currency"=> $request->currency,
            "current_balance"=> $profile->getBalance($request->currency),
            "current_balance_currency"=> $request->currency,
            "status" => $status,
            "remarks" => $message,
        ]);

        return view("profile.Withdraw",compact("profile","status","message"));

    }
}
