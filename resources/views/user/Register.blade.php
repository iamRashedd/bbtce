@extends('layout.theme')

@section('content')

<form action="{{route('user.store')}}" method="post">
@csrf
First Name:
<input type="text" name="firstName">
<br>
Last Name:
<input type="text" name="lastName">
<br>
Email:
<input type="email" name="email">
<br>
Username:
<input type="text" name="username">
<br>
Password:
<input type="password" name="password">
<br>
Confirm Password:
<input type="password" name="confirmPassword">
<br>
<button type="submit">Sign Up</button>
<button><a href="/">Home</a></button>
</form>

<script>

</script>

@endsection