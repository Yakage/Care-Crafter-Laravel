<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <div class="mt-5">
        @if(session()->has('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        
        @endif
    </div>
    <div class="container">
        <form action="{{route('login')}}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px">
            @csrf
            
            <div class="mb-3">
                <label class="form-label"> Email </label>
                <input type="email" class="form-control" name="email">
            </div>
            
            <div class="mb-3">
                <label class="form-label"> Password </label>
                <input type="password" class="form-control" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <p>Don't have an account? <a href="{{ route('register') }}">Create an account</a></p>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
</body>
</html>
