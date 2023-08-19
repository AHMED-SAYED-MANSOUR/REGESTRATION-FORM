<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css" >
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <title>Sign up</title>
</head>
<body>
@include('header');
<div class="container">
    <div class="loginbox">
        <img src="{{asset('images/pers.jpg')}}" class="person">
        <h1>{{__('index.Sign Up Form')}}</h1>
        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if(Session::get('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif
        <form action="add" method="post" enctype="multipart/form-data">
            @csrf
            <div class="inputbox">
                <input name="name" required type="text" id="FullName" onchange="Checkname(this)">
                <span>{{__('index.FullName')}}</span><br>
                <h6  id="error1"></h6>
            </div><br>
            <div class="inputbox">
                <input name="username" required type="text" id="fname" onchange="validation()" >
                <span>{{__('index.username')}}</span><br>
                <h6  id="error"></h6>@if(Session::get('error'))<p class="alert alert-danger">{{ Session::get('error') }}</p> @endif
            </div><br>
            <div class="inputbox">
                <input name="email" required type="email" id="E-mail" onchange="validation()">
                <span>{{__('index.E-mail')}}</span><br>
                <h6  id="error2"></h6>
            </div>
            <br>
            <div class="inputbox">
                <input name="phone" required type="tel" id="Phone" onchange="validation()">
                <span>{{__('index.phone')}}</span><br>
                <h6  id="error6"></h6>
            </div><br>
            <div class="inputbox">
                <input name="address" required type="text" id="Address" onchange="validation()">
                <span>{{__('index.address')}}</span><br>
                <h6  id="error7"></h6>
            </div><br>
            <div class="inputbox">
                <input name="birthday" required type="date" id="birthdate" onchange="validation()">
                <span>{{__('index.birthday')}}</span><br>
                <h6  id="error8"></h6>
            </div>

            <br>
            <div class="inputbox">
                <input name="password" required type="password" id="password" onchange="passwordValid()" >
                <span>{{__('index.Password')}}</span><br>
                <h6  id="error3"></h6>
            </div><br>
            <div class="inputbox">
                <input name="passwordConfirm" required type="password" id="confirmpassword" onchange="passwordValid()">
                <span>{{__('index.Confirm Password')}}</span><br>
                <h6  id="error5"></h6>
                <h6  id="error4"></h6>
            </div><br>
            <div class="inputbox">
                <label for="fileupLoad">{{__('index.Upload Your Photo:')}}</label>
                <input type="file" name="fileupLoad" id="fileupLoad">
            </div><br>
            <button class="button but" type="submit" name="submit" value="Login" onclick="validation()">{{__('index.Login')}}</button><br>
            <button type="button" class="button but" id="get-actors-button">{{__('index.Get Actors')}}</button>

            <br>
            <a href="#">{{__('index.Lost Your Password?')}}</a><br>
            <a href="signup.html">{{__('index.Do not have an account?')}}</a>
        </form>
    </div>
    <div id="container" style="background-color: #0e0f32;color: white;border-radius: 10px;width: 500px;height: fit-content;margin-top: 200px;"></div>
</div>
@include('footer');
<script src="js/API_Ops.js" defer></script>
<script src="js/Validation.js" defer></script>
<script src="{{asset('js/Validation.js')}}"></script>
<script src="{{asset('js/home.js')}}"></script>
<script src="js/home.js"></script>

</body>
</html>
