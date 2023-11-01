@extends('layout.theme')

@section('content')

<form action="{{route('user.update')}}" method="post">
    @csrf
            Account Number:
            <input type="number" id="ProfileAccountNumber" value="{{$user->profile->account_number}}" disabled>
            <br>
            Account Email:
            <input type="text" id="ProfileAccountNumber" value="{{$user->email}}" disabled>
            <br>
            <br>
            Account Name:
            <input type="text" name="firstName" id="ProfileFirstName" value="{{$user->profile->first_name}}" >
            <input type="text" name="lastName" id="ProfileLastName" value="{{$user->profile->last_name}}" >
            <br>
           
            <br>
            Old Password:
            <input type="password" name="oldPassword" id="oldpassword">
            <br>
            New Password:
            <input type="password" name="newPassword" id="newpassword">
            <br>
            Confirm Password:
            <input type="password" name="confirmPassword" id="confirmpassword">
            <br>
            
            

            <button type="submit">Save</button>
            <button><a href="/user/show">Back</a></button>
</form>

@endsection