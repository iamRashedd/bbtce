@extends('layout.theme')

@section('content')

    <form id="transfer" action="{{route('profile.transfer.submit')}}" method="post">
    @csrf

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
        

        Transfer Account Number:
        <input type="number" name="transferToAccount" />
        
        Transfer Amount:
        <input type="number" name="amount" value=""/>
        <select name="currency" id="SelectedCurrency">
            
            <option value="BDT">BDT</option>
            <option value="USD">USD</option>
            <option value="ETH">ETH</option>
            
        </select>
        <br>

    
    <button type="submit">Transfer</button>
    <button><a href="/">Home</a></button>
    </form>


@endsection