@extends('layout.theme')

@section('content')
<div align=center style="padding-top: 15%;font-size:50px;">

@if(auth()->user()->isAdmin())
    Admin Operations:
    <br>
    <button ><a href="/admin/addmoney">Admin Add Money</a></button>
    <button ><a href="/admin/transaction/list">Admin Transaction List</a></button>
    <button ><a href="/admin/profile/list"> Admin Profile List</a></button>
    <button ><a href="/admin/user/list"> Admin User List</a></button>
    <br>

@endif
User Operations:
<br>
<button ><a href="/profile/addmoney">Add Money</a></button>
<button ><a href="/profile/transfer">Transfer Money</a></button>
<button ><a href="/profile/conversion">Currency Conversion</a></button>
<br>
<button ><a href="/profile/withdraw">Withdraw</a></button>
<button ><a href="/transaction/show">Transaction List</a></button>
<br>
<button ><a href="/user/show">Profile View</a></button>
<button ><a href="/user/logout">Logout</a></button>

</div>

@endsection