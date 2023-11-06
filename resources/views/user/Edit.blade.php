@extends('layout.theme')

@section('content')

<form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
    @csrf
            <img class="" width="150px" src="../assets/uploads/{{$user->profile->photo}}">
            <br>
            Change Profile Picture:
            <input type="file" name="photo2" id="photo2"  accept=".jpg, .jpeg, .png">
            <br>
            <br>
            Account Number:
            <input type="number" id="ProfileAccountNumber" value="{{$user->profile->account_number}}" disabled>
            <br>
            Account Email:
            <input type="text" id="ProfileAccountNumber" value="{{$user->email}}" disabled>
            <br>
            <br>
            Account Name:
            <input type="text" name="firstName" id="firstName" value="{{$user->profile->first_name}}" >
            <input type="text" name="lastName" id="lastName" value="{{$user->profile->last_name}}" >
            <br>
            Account Phone:
            <input type="text" id="ProfilePhone" value="{{$user->profile->phone}}">
            <br>
            Account Gender:
            @if($user->profile->gender == 'Male')
                <input type="radio" name="gender" value="Male" checked>Male
                <input type="radio" name="gender" value="Female">Female
            @else
                <input type="radio" name="gender" value="Male">Male
                <input type="radio" name="gender" value="Female" checked>Female
            @endif
            <br>
            Account Age:
            <input type="text" id="ProfileAge" value="{{$user->profile->age}}">
            <br>
            Account NID:
            <br>
            <img class="" height="150px" width="300px" src="../assets/uploads/{{$user->profile->nid}}">
            <br>
           
            <br>
            Old Password:
            <input type="password" name="oldPassword" id="oldpassword" required>
            <br>
            New Password:
            <input type="password" name="newPassword" id="newpassword">
            <br>
            Confirm Password:
            <input type="password" name="confirmPassword" id="confirmpassword">
            <br>
            <br>
            
            
            

            <button type="submit">Save</button>
            <button><a href="/user/show">Back</a></button>
</form>

@endsection