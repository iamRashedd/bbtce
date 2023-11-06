@extends('layout.theme')

@section('content')

    <form id="adminaddmoney" action="{{route('admin.addmoney.submit')}}" method="post">
    @csrf    
        <select name="profile" id="SelectedProfile" value="" onchange="displayProfileDetails()">
            @foreach($profiles as $profile)
            <option value="{{$profile->account_number}}">{{$profile->first_name}}</option>
            @endforeach
        </select>

        <p id="ProfileDetail">
            Account Name:
            <input type="text" id="ProfileFirstName" value="" disabled>
            <input type="text" id="ProfileLastName" value="" disabled>
            <br>
            Account Number:
            <input type="number" id="ProfileAccountNumber" value="" disabled>
            <br>
            Account Balance:
            <br>
            <input type="number" id="ProfileBDTBalance" value="" disabled>BDT 
            <br>
            <input type="number" id="ProfileUSDBalance" value="" disabled>USD
            <br>
            <input type="number" id="ProfileETHBalance" value="" disabled>ETH
            
        </p>
        <input type="number" name="amount" value=""/>
        <select name="currency" id="SelectedCurrency">
            
            <option value="BDT">BDT</option>
            <option value="USD">USD</option>
            <option value="ETH">ETH</option>
            
        </select>
        <br>
    
    <button type="submit">Submit</button>
    <button><a href="/">Home</a></button>
    </form>
    
    <div id="alertBox"></div>
    
</body>


<script>

    var profiles = <?php echo json_encode($profiles); ?>;

    function displayProfileDetails(){
        profiles.forEach(function (profile) {
            if (profile.account_number == document.getElementById('SelectedProfile').value) {
                document.getElementById('ProfileFirstName').value = profile.first_name;
                document.getElementById('ProfileLastName').value = profile.last_name;
                document.getElementById('ProfileAccountNumber').value = profile.account_number;
                document.getElementById('ProfileBDTBalance').value = profile.balanceBDT;
                document.getElementById('ProfileUSDBalance').value = profile.balanceUSD;
                document.getElementById('ProfileETHBalance').value = profile.balanceETH;
            }
    });  
}
</script>
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