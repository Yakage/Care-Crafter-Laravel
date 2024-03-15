<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Login</title>
    <link rel="stylesheet" href="{{('assets/css/login.css')}}">
</head>
<body>
    <div id="messageDialog" class="dialog">
        @if(session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>
    <div class="container">
    
        <div class="title">Login to CareCrafter <img src= "{{ asset('img/CareCrafter-removebg-preview.png')}}" style="display: inline-block; height: 50px; width: 50px; vertical-align: middle;"></div>
        
        <div class="content">
            <form id='loginForm' action="{{route('login')}}" method="POST">
                @csrf

                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" class="form-control form-control-sm" name="email" placeholder="Enter your email" required>
                    </div>
                    
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                    </div>

                    <div class="button">
                    <input type="submit" value="Login">
                    </div>
                </div>
            </form>
        </div>
        <div class="signup_link">Create a account?  <a href="{{ route('register')}}">Register</a></div>
    </div>
    <script src="js/loginandregister.js"></script>

</body>
</html>
