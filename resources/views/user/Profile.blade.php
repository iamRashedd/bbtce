@extends('layout.theme')
@section('content')
<div class="signup">
    <!-- sign up page bg -->
    <div class="edit-container">
                        
    <div class="signup-input">
        <img class="" align=center onclick="showImage(src)" width="150px" src="../assets/uploads/{{$user->profile->photo}}">
        <br>
        
        <label for="fname">First Name:</label><br>
        <input type="text" id="ProfileFirstName" value="{{$user->profile->first_name}}" disabled>
        <br>
        
        <label for="lname"> Last Name:</label><br>
        <input type="text" id="ProfileLastName" value="{{$user->profile->last_name}}" disabled>
        <br>

        <label for="email">Email:</label><br>
        <input type="text" id="ProfileAccountNumber" value="{{$user->email}}" disabled>
        <br>

        <label for="Phone_Number">phone number:</label><br>
        <input type="number" id="ProfileAccountNumber" value="{{$user->profile->account_number}}" disabled>
        <br>

        <label for="User_Name">Username:</label><br>
        <input type="text" id="ProfileUsername" value="{{$user->profile->username}}" disabled><br>

        <label for="Age">Age:</label><br>
        <input type="text" id="ProfileGender" value="{{$user->profile->age}}" disabled><br>

        <label for="Gender">Gender:</label><br>
        <input type="text" id="ProfileGender" value="{{$user->profile->gender}}" disabled><br>

        <label for="NID">NID:</label><br>
        <div class="nid">
        <img class="" onclick="showImage(src)" height="150px" width="300px" src="../assets/uploads/{{$user->profile->nid}}">
        </div> 
        <br>
        <div class="button_signup">
            <button><a href="/user/edit">Edit</a></button>
                <button><a href="/">Home</a></button>
        </div>

        </div>

    </div>
    
    </div>


    </div>
</div>


<style>
.edit-container {

    width: 70%;
    height: 110%;
    background-color: #efebf4;
    position: relative;
    left: 17%;
    padding-left: 10px;
    max-width: 700px;
}


</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script type="text/javascript" src="{{URL::asset('js/scriprt_password.js')}}"></script>
<script>
    function showImage(img){
        window.open(img);
    }
</script>
@endsection