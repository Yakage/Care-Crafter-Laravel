<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div>
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
    
    <div class="center">
        <h1>Register</h1>
        <form action="{{route('register.post')}}" method="POST">
            @csrf

            <div class="txt_field">
                <input type="text" class="form-control form-control-sm" name="name" required placeholder="Enter your name">
            </div>
            <div class="txt_field">
                <input type="email" class="form-control form-control-sm" name="email" required placeholder="Enter your email">
            </div>
            <div class="txt_field">
                <input type="number" class="form-control form-control-sm" name="age" required placeholder="Enter your age">
            </div>
            <div class="txt_field">
                <input type="text" class="form-control form-control-sm" name="height" required placeholder='Enter your height in centimeter'>
            </div>
            <div class="txt_field">
                <input type="text" class="form-control form-control-sm" name="weight" required placeholder="Enter your weight in kilogram">
            </div>
            <div class="txt_field">
                <input type="text" class="form-control form-control-sm" name="gender" placeholder="Enter your Gender [male or female]" required>
            </div>
            <div class="txt_field">
                <input type="password" class="form-control" name="password" required placeholder="Enter your password">
            </div>
            <div class="txt_field">
                <input type="password" class="form-control form-control-sm" required name="confirm_password" placeholder="Enter your password to confirm">
            </div>
            <input type="submit" value="Register" />
            
        </form>
        <div class="signup_link">Already have a account?  <a href="{{ route('login')}}">Login</a></div>
    </div>

</body>
</html>
