@extends('layout.theme')

@section('content')
<div>            
            <img class="" width="150px" src="../assets/uploads/{{$user->profile->photo}}">
            <br>
            Account Name:
            <input type="text" id="ProfileFirstName" value="{{$user->profile->first_name}}" disabled>
            <input type="text" id="ProfileLastName" value="{{$user->profile->last_name}}" disabled>
            <br>
            Account Email:
            <input type="text" id="ProfileAccountNumber" value="{{$user->email}}" disabled>
            <br>
            Account Number:
            <input type="number" id="ProfileAccountNumber" value="{{$user->profile->account_number}}" disabled>
            <br>
            Account Balance:
            <br>
            <input type="number" id="ProfileBDTBalance" value="{{$user->profile->balanceBDT}}" disabled>BDT 
            <br>
            <input type="number" id="ProfileUSDBalance" value="{{$user->profile->balanceUSD}}" disabled>USD
            <br>
            <input type="number" id="ProfileETHBalance" value="{{$user->profile->balanceETH}}" disabled>ETH
            <br>

            <button><a href="/user/edit">Edit</a></button>
            <button><a href="/">Home</a></button>

            <br>
            <br>
                Cash:
                <input type="number" step=".01" value="{{$user->profile->balanceBDT}}" name="balance" id="balance">
                
                <b>Currency</b>
                <select name="currency" id="currency" onchange="displayBalance()">
                    <option value="BDT">BDT</option>
                    <option value="USD">USD</option>
                    <option value="ETH">ETH</option>
                </select>
                

</div>

<script>

    function displayBalance(){
        var currency = document.getElementById('currency').value;
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
@endsection