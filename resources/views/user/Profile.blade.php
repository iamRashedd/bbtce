            Account Name:
            <input type="text" id="ProfileFirstName" value="{{$user->profile->first_name}}" disabled>
            <input type="text" id="ProfileLastName" value="{{$user->profile->last_name}}" disabled>
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