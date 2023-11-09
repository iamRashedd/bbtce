@extends('layout.theme')
@section('content')


  
<div class="signup">
    <!-- sign up page bg -->
    <div class="edit-container">
                        <!-- sign up form  -->
                        <h2 style="padding: 20px; text-align: center; letter-spacing: 0.1em;">Edit</h2> <br>
    <form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="signup-input">

        <img class="" align=center width="150px" src="../assets/uploads/{{$user->profile->photo}}">
        <br>
        <div class="photo">
            <label for="photo2"><p>Change Photo:</p></label>
            <br>
            <div class="photo-box">
                <input type="file" name="photo2">
                <br>
            </div>
        </div> <br>
        
        <label for="fname">First Name:</label><br>
        <input type="text" name="firstName" value="{{$user->profile->first_name}}" required pattern="(([a-zA-Z]+)([ ])([a-zA-Z]+)|([a-zA-Z]))+"><br>
        
        <label for="lname"> Last Name:</label><br>
        <input type="text" name="lastName" value="{{$user->profile->last_name}}" required pattern="(([a-zA-Z]+)([ ])([a-zA-Z]+)|([a-zA-Z]))+"><br>
        
        <label for="email">Email:</label><br>
        <input type="email" name="email" value="{{$user->email}}" disabled pattern='^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$' required><br>
        
        <label for="Phone_Number">Phone number:</label><br>
        <input type="tel" name="phone" value="{{$user->profile->phone}}" pattern="[0-9]{11}" required><br>

        <label for="User_Name">Username:</label><br>
        <input type="text" name="username" value="{{$user->profile->username}}" disabled><br>

        <label for="password">Password:</label><br>
        <input type="password" name="oldPassword" placeholder="Password" id="password" required>
        <img src="{{URL::asset('image/pwd_hide.png')}}" onclick="pass()" class="signpwd_icon" id="pass_icon"><br>

        <label for="password">New Password:</label><br>
        <input type="password" name="newPassword" placeholder="New Password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
        <img src="{{URL::asset('image/pwd_hide.png')}}" onclick="pass()" class="signpwd_icon" id="pass_icon"><br>

        <label for=" confirm password">Confirm Password:</label><br>
        <input type="password" name="confirmPassword" placeholder="Confirm New Password" id="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
        <img src="{{URL::asset('image/pwd_hide.png')}}" onclick="confpass()" class="confirepwd_icon" id="confirepwd_icon"><br>

        <div class="age_gender">
                            <!-- age gender div -->
                            <div class="age">
                                <!-- age ------- -->
                                <label for="age"><p>Age:</p></label>
                                <div class="age-box">
                                    <input type="number" name="age" value="{{$user->profile->age}}" required pattern="[1-9]{2}" min="18" max="100">
                                </div>
                            </div>

                            <div class="gender">
                                <!-- gender ------- -->
                                <p> Gender :</p>
                                <div class="option">

                                @if($user->profile->gender == 'Male')
                                    <input type="radio" name="gender" value="Male" checked>Male
                                    <input type="radio" name="gender" value="Female">Female
                                    <input type="radio" name="gender" value="Other" >Other
                                @elseif($user->profile->gender == 'Female')
                                    <input type="radio" name="gender" value="Male">Male
                                    <input type="radio" name="gender" value="Female" checked>Female
                                    <input type="radio" name="gender" value="Other" >Other
                                @else
                                    <input type="radio" name="gender" value="Male">Male
                                    <input type="radio" name="gender" value="Female">Female
                                    <input type="radio" name="gender" value="Other" checked>Other
                                @endif
                                </div>

                            </div>
                        </div>

                        Account NID:
                        <br>
                        <img class="" height="150px" width="300px" src="../assets/uploads/{{$user->profile->nid}}">
                        <br>

                        <div class="nid">
                            <label for="Nid "><p>Change NID:</p></label>
                            <br>
                            <div class="nid-box">
                                <input type="file" name="nid2">
                                <br>
                            </div>
                        </div> <br>

                        <div class="country">
                        <!-- country ------- -->
                        <label for="country"><p>Enter country:</p></label>
                        <br>
                        <div class="country-box">
                            <select name="tk" id="tk">
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="United state of America">USA</option>
                            <option value="United Kingdom">UK</option>
                        </select>
                        </div>

        
                    </div>
            <div class="button_signup">
                    <button type="submit">Save</button>
                    <button><a href="/user/show">Back</a></button>
            </div>
        </div>
    </form>


    </div>
</div>

<style>
.edit-container {

    width: 70%;
    height: 150%;
    background-color: #efebf4;
    position: relative;
    left: 17%;
    padding-left: 10px;
    max-width: 700px;
}


</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script type="text/javascript" src="{{URL::asset('js/scriprt_password.js')}}"></script>

@endsection
