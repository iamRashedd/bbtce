@extends('layout.theme')

@section('content')

<p class="testclass">
    Login Page
</p>
<div class="login_div form">
<form action="{{route('user.login.submit')}}" method="post">
    @csrf 
    Email:
    <input type="email" name="email" >
    <br>
    Password:
    <input type="password" name="password">
    <br>
    <button type="submit" value="Login">Login</button>
    <button><a href="{{route('user.register')}}">Sugn up</a></button>
</form>

</div>

@endsection