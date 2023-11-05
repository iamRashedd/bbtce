@extends('layout.theme')

@section('content')


    Login Page

<div class="login_div form">
<form action="{{route('user.login.submit')}}" method="post">
    @csrf 
    <input type="hidden" name="message" id="message" value="{{$message ?? ''}}">
    <input type="hidden" name="status" id="status" value="{{$status ?? ''}}">
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
<div id="alertBox"></div>

<script>
    var error = document.getElementById('message').value;
    var status = document.getElementById('status').value;
    console.log(error);
    if(error){
        const text = 'Login '+status+'! '+error;
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