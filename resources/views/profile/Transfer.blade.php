@extends('layout.theme')

@section('content')

    <form id="transfer" action="{{route('profile.transfer.submit')}}" method="post">
    @csrf
        <input type="hidden" name="message" id="message" value="{{$message ?? ''}}">
        <input type="hidden" name="status" id="status" value="{{$status ?? ''}}">
        <input type="hidden" id="ProfileBDTBalance" value="{{$profile->balanceBDT}}"> 
        <input type="hidden" id="ProfileUSDBalance" value="{{$profile->balanceUSD}}">
        <input type="hidden" id="ProfileETHBalance" value="{{$profile->balanceETH}}">

        <p id="ProfileDetail">
        <div class="image "><img src="../assets/uploads/{{$profile->photo}}">
            <h1><b>Account Name:
            <input type="text" id="ProfileFirstName" value="{{$profile->first_name}}" disabled>
            <input type="text" id="ProfileLastName" value="{{$profile->last_name}}" disabled>
            <br></b></h1>
            <p>Account Number:
            <input type="number" id="ProfileAccountNumber" value="{{$profile->account_number}}" disabled>
            <br></p>
        </div> </p>

        
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
           


                    <!-- div for user sending-->
                    <div class="send">
                <label for="fname"><b>Account Number:</b></label>
                <input type="number" name="transferToAccount" placeholder="xxxxxxxxxxx" required>
                <br>
                <br>
                <label for="fname"><b>Amount:</b></label>
                <input type="number" name="amount" value="" placeholder="xxxxxxxxxxx" pattern="[0-9]+" min="20" required>
                <select name="currency" id="SelectedCurrency">
            
                <option value="BDT">BDT</option>
                <option value="USD">USD</option>
                <option value="ETH">ETH</option>
                
                </select>
                <br>
                <br>
                <label for="fname"><b>Password:</b></label>
                <input type="password" placeholder="Password" name="password" id="password" required>
                <img src="{{URL::asset('image/pwd_hide.png')}}" onclick="pass()" class="sendpwd_icon" id="pass_icon">
                <br>
                <br>
                <br>
                <div class="button_send">
                <button type="submit">Transfer</button>
                </div>
                <br>
                <div id="alertBox"></div>
                <br>
                <button><a href="/">Home</a></button>
                <br>
                <br>
                <br>


                <marquee>Welcome to BlockChain Technology . </marquee>
            </div>


    
    
    
    </form>
<style>
.send input[name="transferToAccount"] {
    margin-left: 13px;
}

.send input[name="amount"] {
    right: 10px;
    margin-left: 13px;
}
 #SelectedCurrency{
    position: relative;
    right: 57px;
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