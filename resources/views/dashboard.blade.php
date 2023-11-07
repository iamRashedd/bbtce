@extends('layout.theme')
@section('content')


<table>
    <tr>
        <td colspan="2" align=center>
            <div class="image "><img src="../assets/uploads/{{auth()->user()->profile->photo}}">
                <div style="margin-top:50px;margin-left:500px;">
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
}

.adminpage {
    margin-top: 21.5%;
    margin-left: 5%;
    height: 300px;
    width: 550px;
    background-color: rgb(231, 233, 241);
    padding: 40px;
    text-align: center;
    border-radius: 3%;
}


.adminpage1 {
    margin-top: 21.5%;
    margin-left: 55%;
    height: 300px;
    width: 550px;
    background-color: rgb(231, 233, 241);
    padding: 40px;
    text-align: center;
    border-radius: 3%;
}

</style>

@endsection

