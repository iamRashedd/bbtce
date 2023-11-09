@extends('layout.theme')
@include('layout.Home_navbar')
@section('content')


<div class="login_div">


<form action="{{route('user.login.submit')}}" method="post">
    @csrf 
    <input type="hidden" name="message" id="message" value="{{$message ?? ''}}">
    <input type="hidden" name="status" id="status" value="{{$status ?? ''}}">
    <h2>Log In</h2>
                <br>
                <div class="input-login">
    <h3>Enter Email:</h3>
    <!-- <input type="email" name="email" > -->
    <input type="email" name="email" placeholder="User Email">
                </div>
    <br>
    <div class="password">
    <h3>Enter Password:</h3>
    <input type="password" name="password" placeholder="User Password" id="password">
    <img src="{{URL::asset('image/pwd_hide.png')}}" onclick="pass()" class="pass_icon" id="pass_icon">
    </div>
    <br>
    <div class="login-button">
    <button type="submit" value="Login" style="margin-left:10%;">Login</button>
    </div>
    <div id="alertBox"></div>

    <div class="login-link">
                    <!--login link div -->


                    <a href="#">Forget Password ? &nbsp; </a>

                    <a href="{{route('user.register')}}">Sign Up</a></li>
                </div>
</form>


<div class="log_image">
            <nav>
                <img src="{{URL::asset('image/023.gif')}}" class="logo ">
            </nav>
        </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script type="text/javascript" src="{{URL::asset('js/scriprt_password.js')}}"></script>
<script>
    var error = document.getElementById('message').value;
    var status = document.getElementById('status').value;
    console.log(error);
    if(error){
        const text = 'Login '+status+'! '+error;
        alert(text);
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
<style>
    .input-login h3{
        color: aliceblue;
    }
    .password h3{
        color: aliceblue;
    }
   
</style>

@endsection