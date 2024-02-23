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
    <div class="center">
      <h1>Login</h1>
      <form action="{{route('login')}}" method="POST">
        @csrf

        <div class="txt_field">
            <input type="email" class="form-control" name="email" required>
            <span></span>
            <label>Email</label>
        </div>
        <div class="txt_field">
            <input type="password" class="form-control" name="password" required>
            <span></span>
            <label>Password</label>
        </div>
        <input type="submit" value="Login" />
        
      </form>
      <div class="pass">Forgot Password?</div>
      <div class="signup_link">Create a account?  <a href="{{ route('register')}}">Register</a></div>
    </div>
</body>
</html>
