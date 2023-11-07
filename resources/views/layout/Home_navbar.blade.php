

@section('navbar')
<nav>
            <a href="home.html"><img src="{{URL::asset('image/blockchain_logo.png')}}"class="logo "></a>
            <ul>
                <li><a href="/home">Home</a></li>
                <li><a href="{{route('user.login')}}">Log In</a></li>
                <li><a href="{{route('user.register')}}">Create Account</a></li>


                <li><a href="about_us.html">About Us</a></li>
            </ul>

        </nav>
@endsection