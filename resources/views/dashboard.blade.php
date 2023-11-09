@extends('layout.theme')
@section('content')


<table>
    <tr>
        <td colspan="2" align=center>
            <div class="adminimage "><img src="../assets/uploads/{{auth()->user()->profile->photo}}">
                <div style="margin-top:30px;margin-left:0%;">
                    <h1><b>{{auth()->user()->profile->username}}</b></h1>
                    <p>Account | {{auth()->user()->profile->account_number}}</p>
                </div>
            </div>
        </td>
        
    </tr>

    <tr>
        @if(auth()->user()->isAdmin())
            <td>
                <div class="adminpage">
                    <h1>Admin Panel</h1>
                    <br>
                    <button ><a href="/admin/addmoney">Admin Add Money</a></button>
                    <button ><a href="/admin/transaction/list">Admin Transaction History</a></button>
                    <button ><a href="/admin/user/list"> Admin User List</a></button>
                    <br>

                </div>
            </td> 
            <td>
        @else
            <td colspan="2">
        @endif
            <div class="adminpage1">
                <h1>User Panel</h1>

                <br>
                <button ><a href="/profile/addmoney">Add Money</a></button>
                <button ><a href="/profile/transfer">Transfer Money</a></button>
                <button ><a href="/profile/conversion">Currency Conversion</a></button>
                <br>
                <button ><a href="/profile/withdraw">Withdraw</a></button>
                <button ><a href="/transaction/show">Transaction History</a></button>
                <br>
                <button ><a href="/user/show">Profile View</a></button>
                <button ><a href="/user/logout">Logout</a></button>
                
            </div>

        </td>
        <td>

        </td>
    </tr>
</table>
        


<style>

button{
    margin: 10px 10px 10px 10px;
    width: auto;
    height: 30px;
    border: 1px solid white;
    border-radius: 10px;
    font-size: 18px;
    background-color:#E5DFDE;
    

}
button a {
    text-decoration: none;
}

.adminpage {
    margin-top: 3%;
    margin-left: 5%;
    height: 300px;
    width: 550px;
    background-color: rgb(231, 233, 241);
    padding: 40px;
    text-align: center;
    border-radius: 3%;
}


.adminpage1 {
    margin-top: 3%;
    margin-left: 38%;
    height: 300px;
    width: 550px;
    background-color: rgb(231, 233, 241);
    padding: 40px;
    text-align: center;
    border-radius: 3%;
}

.adminimage {
    margin-left: 17%;
}


.adminimage img{
    margin-top: 9px;
    height: 110px;
    width: 113px;
    border-radius: 90%;
}

.adminimage h1 {
    font-size: 20px;
    color: rgb(255, 252, 252);
    text-align: center;
}

.adminimage p {
    opacity: 0.7;
    font-size: 15px;
    color: rgb(247, 242, 242);
    text-align: center;
}


</style>

@endsection

