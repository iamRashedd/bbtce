@extends('layout.theme')

@section('content')
    <form id="addmoney" action="{{route('profile.addmoney.submit')}}" method="post">
    @csrf    

    <input type="hidden" name="message" id="message" value="{{$message ?? ''}}">
    <input type="hidden" name="status" id="status" value="{{$status ?? ''}}">

    <p id="ProfileDetail">
            Account Name:
            <input type="text" id="ProfileFirstName" value="{{$profile->first_name}}" disabled>
            <input type="text" id="ProfileLastName" value="{{$profile->last_name}}" disabled>
            <br>
            Account Number:
            <input type="number" id="ProfileAccountNumber" value="{{$profile->account_number}}" disabled>
            <br>
            Account Balance:
            <br>
            <input type="number" id="ProfileBDTBalance" value="{{$profile->balanceBDT}}" disabled>BDT 
            <br>
            <input type="number" id="ProfileUSDBalance" value="{{$profile->balanceUSD}}" disabled>USD
            <br>
            <input type="number" id="ProfileETHBalance" value="{{$profile->balanceETH}}" disabled>ETH
            
        </p>
        <input type="number" name="amount" value=""/>
        <select name="currency" id="SelectedCurrency">
            
            <option value="BDT">BDT</option>
            <option value="USD">USD</option>
            <option value="ETH">ETH</option>
            
        </select>
        <br>
        Password:
        <input type="password" name="password">
        <br>
    
    <button type="submit">Submit</button>
    <button><a href="/">Home</a></button>
    </form>

    <div id="alertBox"></div>
</body>
<script>
    var error = document.getElementById('message').value;
    var status = document.getElementById('status').value;
    console.log(error);
    if(error){
        const text = 'Transaction '+status+'! '+error;
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