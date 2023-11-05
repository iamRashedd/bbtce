<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    
    const TYPE_ADMIN_ADDMONEY = 'ADMIN_ADDMONEY' ;
    const TYPE_ADDMONEY = 'ADDMONEY' ;
    const TYPE_CONVERSION = 'CONVERSION' ;
    const TYPE_TRANSFER = 'TRANSFER' ;
    const TYPE_WITHDRAW = 'WITHDRAW' ;

    const STATUS_SUCCESS = 'SUCCESS';
    const STATUS_FAILED = 'FAILED';
    

    protected $fillable = [
        'sender_account_number',
        'reciever_account_number',
        'type',
        'currency',
        'amount',
        'current_balance',
        'current_balance_currency',
        'status',
        'remarks',
    ];

}
