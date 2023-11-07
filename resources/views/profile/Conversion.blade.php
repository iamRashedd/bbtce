@extends('layout.theme')

@section('content')

    <form id="conversion" action="{{route('profile.conversion.submit')}}" method="post">
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


        <div class="swap">
                <div class="swap-text">
                    <label for="fname"><b>Currency:</b></label>
                    <div class="swap-drop">
                        <select name="currency" id="SelectedCurrency" onchange="showConversion()">
                
                            <option value="BDT">BDT</option>
                            <option value="USD">USD</option>
                            <option value="ETH">ETH</option>
                
                        </select>

                        <select name="currency2" id="SelectedCurrency2" onchange="showConversion()">
                
                            <option value="BDT">BDT</option>
                            <option value="USD">USD</option>
                            <option value="ETH">ETH</option>
                
                        </select>
                    </div>
                </div>

                


                <br>
                <label for="fname"><b>Amount:</b></label>
                <input type="number" oninput="showConversion()" name="amount" id="amount" value="" placeholder="xxxxxxxxxxx" pattern="[0-9]+" min="20" required>
                <br>
                <br>
                <label for="fname"><b>Password:</b></label>
                <input type="password" name="password" placeholder="Password" id="password" required>
               
                <img src="{{URL::asset('image/pwd_hide.png')}}" onclick="pass()" class="sendpwd_icon" id="pass_icon"><br><br>
                <br>
                <div id="convertedBalance">
                    Converted Amount: 
                    <input type="number" id="convertedAmount" name="convertedAmount" disabled>
                </div>
                <br>
                <div class="button_swap">
                    <button type="submit" value="submit">Swap</button>
                </div>
                <div id="alertBox"></div>
                <br>
                <br>
                <button><a href="/">Home</a></button>
                <br>
                <br>
                <marquee>Welcome to BlockChain Technology . </marquee>
            </div>


        <br>
    </form>

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

<script>
    function showConversion(){
        var currency1 = document.getElementById('SelectedCurrency').value;
        var currency2 = document.getElementById('SelectedCurrency2').value;
        var amount = document.getElementById('amount').value;

        if(currency1 == "BDT" && currency2 == "USD"){
            amount /= 110;
        }
        if(currency1 == "BDT" && currency2 == "ETH"){
            amount *= 195513;
        }
        if(currency1 == "USD" && currency2 == "BDT"){
            amount *= 110;
        }
        if(currency1 == "USD" && currency2 == "ETH"){
            amount /= 1774;
        }
        if(currency1 == "ETH" && currency2 == "BDT"){
            amount /= 195513;
        }
        if(currency1 == "ETH" && currency2 == "USD"){
            amount *= 1774;
        }
        document.getElementById('convertedAmount').value = parseFloat(amount).toFixed(4);

    }
</script>

@endsection