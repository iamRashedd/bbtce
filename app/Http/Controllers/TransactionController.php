<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {

    }
    public function store(Request $request)
    {

    }
    public function show()
    {
        $account = auth()->user()->profile->account_number;

        $transactions = Transaction::where('sender_account_number',$account)->orwhere('reciever_account_number',$account)->get();
        return view('profile.Transactions', compact('transactions'));
    }
    public function showBySender($account)
    {
        
        $transactions = Transaction::where('sender_account_number',$account)->get();
        return view('profile.Transactions', compact('transactions'));
    }

    public function showByReciever($account)
    {
        
        $transactions = Transaction::where('reciever_account_number',$account)->get();
        return view('profile.Transactions', compact('transactions'));
    }
    

}
