@extends('layout.theme')
@include('layout.Home_navbar')
@section('content')
<div class="signup">
    <!-- sign up page bg -->
    <div class="signup-container">
                        <!-- sign up form  -->
                        <h2 style="padding: 20px; text-align: center; letter-spacing: 0.1em;">Sign Up</h2> <br>
<form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="signup-input">
        
        <label for="fname">First Name:</label><br>
        <input type="text" name="firstName"placeholder=" Enter Your First Name" required pattern="(([a-zA-Z]+)([ ])([a-zA-Z]+)|([a-zA-Z]))+"><br>
        
        <label for="lname"> Last Name:</label><br>
        <input type="text" name="lastName"placeholder="Enter Your Last Name" required pattern="(([a-zA-Z]+)([ ])([a-zA-Z]+)|([a-zA-Z]))+"><br>
        
        <label for="email">Email:</label><br>
        <input type="email" name="email" placeholder="Enter Your Email" pattern='^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$' required><br>
        
        <label for="Phone_Number">Enter a phone number:</label><br>
        <input type="tel" name="phone" placeholder="xxxxxxxxxxx" pattern="[0-9]{11}" required><br>

        <label for="User_Name">Enter a Username:</label><br>
        <input type="text" name="username" placeholder="UserName"><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" placeholder="Password" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <img src="{{URL::asset('image/pwd_hide.png')}}" onclick="pass()" class="signpwd_icon" id="pass_icon"><br>

        <label for=" confirm password">Confirm Password:</label><br>
        <input type="password" name="confirmPassword" placeholder=" Confirm Password" id="confirm_password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <img src="{{URL::asset('image/pwd_hide.png')}}" onclick="confpass()" class="confirepwd_icon" id="confirepwd_icon"><br>

        <div class="age_gender">
                            <!-- age gender div -->
                            <div class="age">
                                <!-- age ------- -->
                                <label for="age"><p>Age:</p></label>
                                <div class="age-box">
                                    <input type="number" name="age" required pattern="[1-9]{2}" min="18" max="100">
                                </div>
                            </div>

                            <div class="gender">
                                <!-- gender ------- -->
                                <p> Gender :</p>
                                <div class="option">

                                    <input id="male" type="radio" name="gender" value="Male">
                                    <label for="male"><p>Male</p></label>
                                    <input id="female" type="radio" name="gender" value="Female">
                                    <label for="female"><p>Female</p></label>
                                    <input id="other" type="radio" name="gender" value="Other">
                                    <label for="other"><p>Other</p></label>
                                </div>

                            </div>
                        </div>

        
                        <div class="photo">
                            <label for="photo"><p>Upload Photo:</p></label>
                            <br>
                            <div class="photo-box">
                                <input type="file" name="photo" required>
                                <br>
                            </div>
                        </div> <br>

                        <div class="nid">
                            <label for="Nid "><p>Upload NID:</p></label>
                            <br>
                            <div class="nid-box">
                                <input type="file" name="nid" required>
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
        <button type="submit">Create Account</button>
        <button><a href="/">Home</a></button>
    </div>
    </div>
</form>


    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script type="text/javascript" src="{{URL::asset('js/scriprt_password.js')}}"></script>

@endsection