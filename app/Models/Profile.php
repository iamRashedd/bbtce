<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';


    public function addBalance($amount,$currency){
        
        if($currency === "BDT"){
            $this->balanceBDT += $amount;
        }
        if($currency === "USD"){
            $this->balanceUSD += $amount;
        }
        if($currency === "ETH"){
            $this->balanceETH += $amount;
        }

        $this->save();
    }
    public function removeBalance($amount,$currency){
        
        $action = false;
        if($currency === "BDT"){
            if($this->balanceBDT >= $amount){
                $this->balanceBDT -= $amount;
                $action = true;
            }
        }
        if($currency === "USD"){
            if($this->balanceUSD >= $amount){
                $this->balanceUSD -= $amount;
                $action = true;
            }
        }
        if($currency === "ETH"){
            if($this->balanceETH >= $amount){
                $this->balanceETH -= $amount;
                $action = true;
            }
        }

        if($action){
            $this->save();
        }
        return $action;
    }

    public function addBalanceWithConversion($amount,$currency,$currency2){
        
        if($currency === "BDT" && $currency2 == "USD"){
            $amount /= 110;
        }
        if($currency === "BDT" && $currency2 == "ETH"){
            $amount *= 195513;
        }
        if($currency === "USD" && $currency2 == "BDT"){
            $amount *= 110;
        }
        if($currency === "USD" && $currency2 == "ETH"){
            $amount /= 1774;
        }
        if($currency === "ETH" && $currency2 == "BDT"){
            $amount /= 195513;
        }
        if($currency === "ETH" && $currency2 == "USD"){
            $amount *= 1774;
        }

        $this->addBalance($amount,$currency2);
    }
}
