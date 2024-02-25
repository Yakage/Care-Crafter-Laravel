<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css" >
</head>
<body>
    <div >
        @if(session()->has('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        
        @endif
    </div>
    <div class="container">
        <div class="title">Login</div>
        <div class="content">
            <form action="{{route('login')}}" method="POST">
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
        <div class="pass"><a href="">Forgot Password?</a></div>
        <div class="signup_link">Create a account?  <a href="{{ route('register')}}">Register</a></div>
    </div>
</body>
</html>
