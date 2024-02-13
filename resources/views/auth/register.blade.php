<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <div class="container">
        <div class="mt-5">
            @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            
            @endif
        </div>
        <form action="{{route('register.post')}}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px">
        @csrf
        
            <div class="mb-3">
                <label class="form-label"> Name </label>
                <input type="text" class="form-control" name="name">
            </div>
            
            <div class="mb-3">
                <label class="form-label"> Email </label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label"> Age </label>
                <input type="number" class="form-control" name="age">
            </div>

            <div class="mb-3">
                <label class="form-label"> Height </label>
                <input type="number" class="form-control" name="height">
            </div>
            <div class="mb-3">
                <label class="form-label"> Weight </label>
                <input type="number" class="form-control" name="weight">
            </div>

            <div class="mb-3">
                <label class="form-label"> Gender </label>
                <input type="text" class="form-control" name="gender" placeholder="Male or Female only">
            </div>

            <div class="mb-3">
                <label class="form-label"> Password </label>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="mb-3">
                <label class="form-label"> Confirm Password </label>
                <input type="password" class="form-control" name="confirm_password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>

