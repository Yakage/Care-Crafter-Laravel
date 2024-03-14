<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Register</title>
    <link rel="stylesheet" href="{{secure_asset('assets/css/register.css')}}">
</head>
<body>
    <div id="messageDialog" class="dialog">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif  
        @if(session()->has('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>
    
    <div class="container">
        <div class="title">Register an account for CareCrafter</div>
        <div class="content">
            <form id="registerForm" action="{{route('register.post')}}" method="POST">
                @csrf

                <div class="user-details">
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text" class="form-control form-control-sm" name="name" placeholder="Enter your name" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" class="form-control form-control-sm" name="email" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <span class="details">Birthday</span>
                    <input type="date" class="form-control form-control-sm" name="birthday" placeholder="Enter your birthday" required>
                </div>
                <div class="input-box">
                <span class="details">Gender</span>
                    <select class="form-control form-control-sm" name="gender" required>
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                </div>
                <div class="input-box">
                    <span class="details">Height</span>
                    <input type="text" class="form-control form-control-sm" name="height" placeholder='Enter your height in centimeter' required>
                </div>
                <div class="input-box">
                    <span class="details">Weight</span>
                    <input type="text" class="form-control form-control-sm" name="weight" placeholder="Enter your weight in kilogram" required>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" class="form-control" name="password" placeholder="Enter your password [minimum 8 characters]" required>
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" class="form-control form-control-sm" required name="confirm_password" placeholder="Enter your password to confirm">
                </div>
                </div>
                
                <div class="button">
                <input type="submit" value="Register">
                </div>
            </form>
        </div>
        <div class="signup_link">Already have a account?  <a href="{{ route('login')}}">Login</a></div>
    </div>
    <script src="js/loginandregister.js"></script>
</body>
</html>
