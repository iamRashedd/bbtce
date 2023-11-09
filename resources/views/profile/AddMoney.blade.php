@extends('layout.theme')

@section('content')
    <form id="addmoney" action="{{route('profile.addmoney.submit')}}" method="post">
    @csrf    
        <input type="hidden" name="message" id="message" value="{{$message ?? ''}}">
        <input type="hidden" name="status" id="status" value="{{$status ?? ''}}">
        <input type="hidden" id="ProfileBDTBalance" value="{{$profile->balanceBDT}}">
        <input type="hidden" id="ProfileUSDBalance" value="{{$profile->balanceUSD}}">
        <input type="hidden" id="ProfileETHBalance" value="{{$profile->balanceETH}}">

    <p id="ProfileDetail">
        <div class="image "><img src="../assets/uploads/{{$profile->photo}}">
                <h1><b>Account Name:
            <input type="text"  id="ProfileFirstName" value="{{$profile->first_name}}" disabled>
            <input type="text" id="ProfileLastName" value="{{$profile->last_name}}" disabled>
            <br></b></h1>
            <br>
                <p>     <b>      Account Number:</b> 
            <input type="number" id="ProfileAccountNumber" value="{{$profile->account_number}}" disabled>
            <br></p>
            </div> 
    </p>
    <br>
    <div class="cash-section">
        <b>Cash:</b>
                <input type="number" step=".01" value="{{$profile->balanceBDT}}" name="balance" id="balance" disabled>
                
                <b>Currency</b>
                <select name="balanceCurrency" id="balanceCurrency" onchange="displayBalance()">
                    <option value="BDT">BDT</option>
                    <option value="USD">USD</option>
                    <option value="ETH">ETH</option>
                </select>
                </div>


                       <!-- div for user adding-->
            <div class="add">
                <label for="fname"><b>Account Number:</b></label>
                <input type="tel" id="ProfileAccountNumber" value="{{$profile->account_number}}" placeholder="xxxxxxxxxxx" disabled>
                <br>
                <br>
                <label for="fname"><b>Amount:</b></label>
                <input type="number" name="amount" placeholder="xxxxxxxxxxx" pattern="[0-9]+" min="20" value=""/ required>
        <select name="currency" id="SelectedCurrency">
            
            <option value="BDT">BDT</option>
            <option value="USD">USD</option>
            <option value="ETH">ETH</option>
            
        </select>
                
                <br>
                <br>
                <label for="fname"><b>Password:</b></label>
                <input  type="password" placeholder="Password" name="password" id="password" required>
               
                <img src="{{URL::asset('image/pwd_hide.png')}}" onclick="pass()" class="sendpwd_icon" id="pass_icon" 
                style="margin-top: 5%; margin-right:40px;">
              
                <br>
                <br>
                <div class="button_add">
                <button type="submit">Submit</button>
                    <!--<input type="submit" value=" ADD">-->
                </div>
                <div id="alertBox"></div>
                <br>
                <br>
                <button><a href="/">Home</a></button>
                <br>
                <br>
                
                <marquee>Welcome to BlockChain Technology . </marquee>


        </div>
    
    
    </form>

    <style>
        input{
            background-color: aliceblue;
            color: black;
            margin-left: 5px;
        }
      
    </style>
    <script>

    function displayBalance(){
        var currency = document.getElementById('balanceCurrency').value;
            if (currency == 'BDT') {
                document.getElementById('balance').value = parseFloat(document.getElementById('ProfileBDTBalance').value).toFixed(2)
            }
            if (currency == 'USD') {
                document.getElementById('balance').value = parseFloat(document.getElementById('ProfileUSDBalance').value).toFixed(2)
            }
            if (currency == 'ETH') {
                document.getElementById('balance').value = parseFloat(document.getElementById('ProfileETHBalance').value).toFixed(2)
            }
        }; 
</script>

<script>
    var a;

function pass() {
    if (a == 1) {
        document.getElementById('password').type = 'password';
        document.getElementById('pass_icon').src = '../image/pwd_hide.png';
        a = 0;

    } else {
        document.getElementById('password').type = 'text';
        document.getElementById('pass_icon').src = '../image/pwd_show.png';
        a = 1;
    }
}
var b;

function confpass() {
    if (b == 1) {
        document.getElementById('confirm_password').type = 'password';
        document.getElementById('confirepwd_icon').src = '../image/pwd_hide.png';
        b = 0;

    } else {
        document.getElementById('confirm_password').type = 'text';
        document.getElementById('confirepwd_icon').src = '../image/pwd_show.png';
        b = 1;
    }
}
    var error = document.getElementById('message').value;
    var status = document.getElementById('status').value;
    console.log(error);
    if(error){
        const text = 'Transaction '+status+'! '+error;
        alert(text);
        const box = document.createTextNode(text);
        document.getElementById('alertBox').appendChild(box);
        if(status === "FAILED"){
            document.getElementById('alertBox').style.color = "red";    
        }
        else{  
            document.getElementById('alertBox').style.color = "green";    
        }

    }
    
</script>

@endsection