<form action="{{route('user.login.submit')}}" method="post">
    @csrf 
    Email:
    <input type="email" name="email" >
    <br>
    Password:
    <input type="password" name="password">
    <br>
    <button type="submit" value="Login">Login</button>
</form>