@extends('layout.theme')

@section('content')
<div align=center style="padding-top: 20%;font-size:50px;">

<button ><a href="/admin/addmoney">Admin Add Money</a></button>
<button ><a href="/profile/list">Profile List</a></button>
<button ><a href="/profile/addmoney">Add Money</a></button>
<button ><a href="/profile/transfer">Transfer Money</a></button>
<button ><a href="/profile/conversion">Currency Conversion</a></button>
<button ><a href="/user/show">Profile View</a></button>
<button class="btn btn-success" href="/user/logout">Logout</button>

</div>

@endsection