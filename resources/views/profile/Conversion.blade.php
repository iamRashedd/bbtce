<html>
<body>

    <form id="conversion" action="{{route('profile.conversion.submit')}}" method="post">
    @csrf

        <p id="ProfileDetail">
            Account Name:
            <input type="text" id="ProfileFirstName" value="{{$profile->first_name}}" disabled>
            <input type="text" id="ProfileLastName" value="{{$profile->first_name}}" disabled>
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

        <select name="currency2" id="SelectedCurrency2">
            
            <option value="BDT">BDT</option>
            <option value="USD">USD</option>
            <option value="ETH">ETH</option>
            
        </select>

        <br>
    
    <button type="submit">Convert</button>
    </form>
</body>


<script>

</script>

</html>