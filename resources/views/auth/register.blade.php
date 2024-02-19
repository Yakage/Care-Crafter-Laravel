<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="registration-box mt-5">
            @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <form action="{{route('register.post')}}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col text-center">
                        <label class="form-label" style="font-size: 24px; font-weight: bold;"> Register </label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label class="form-label"> Name </label>
                            <input type="text" class="form-control form-control-sm" name="name">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label"> Email </label>
                    <input type="email" class="form-control form-control-sm" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label"> Age </label>
                    <input type="number" class="form-control form-control-sm" name="age">
                </div>
                <div class="mb-3">
                    <label class="form-label">Height</label>
                    <input type="text" class="form-control form-control-sm" name="height">
                </div>
                <div class="mb-3">
                    <label class="form-label">Weight</label>
                    <input type="text" class="form-control form-control-sm" name="weight">
                </div>
                <div class="mb-3">
                    <label class="form-label"> Gender </label>
                    <input type="text" class="form-control form-control-sm" name="gender" placeholder="male or female (lowercase)">
                </div>
                <div class="mb-3">
                    <label class="form-label"> Password </label>
                    <input type="password" class="form-control form-control-sm" name="password">
                </div>
                <div class="mb-3">
                    <label class="form-label"> Confirm Password </label>
                    <input type="password" class="form-control form-control-sm" name="confirm_password">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <p class="text-center mt-3">Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>
    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>
