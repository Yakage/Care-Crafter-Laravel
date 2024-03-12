<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            margin: 0;
            background-image: url('/img/bg1.jpg');
            background-attachment: fixed;
            background-size: cover;
        }

        .container {
            text-align: center;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        form {
            width: 100%;
        }

        /* Custom style to position labels at the beginning */
        .form-group label {
            text-align: left;
            display: block;
            margin-bottom: 0.5rem;
        }

        /* Centering user information fields */
        .user-info-fields {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group {
            width: 100%;
            max-width: 400px;
            margin-bottom: 1rem;
        }

        /* Centering password fields */
        .password-fields {
            margin-left: auto;
            margin-right: auto;
            max-width: 400px;
        }

        /* Style for logout button */
        .navbar-nav .nav-link {
            color: black !important;
            text-decoration: none !important;
        }

        .navbar-nav .nav-link:hover {
            color: black !important;
        }

        .navbar-nav .btn-link {
            color: black !important;
            text-decoration: none !important;
        }

        .navbar-nav .btn-link:hover {
            color: black !important;
        }
    </style>
</head>

<body>
<!--update users page-->
<nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('img/CareCrafter-removebg-preview.png')}}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                    CareCrafter
                </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">CareCrafter Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
            <div class="offcanvas-body">
                <h4>Welcome, {{ $userData ['name'] }}!</h4>

                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.home')}}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Features</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Step Tracking</a></li>
                            <li><a class="dropdown-item" href="#">Sleep Tracking</a></li>
                            <li><a class="dropdown-item" href="#">Water Intake Reminder</a></li>
                            <li><a class="dropdown-item" href="#">BMI Calculator</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.user-ui.user')}}">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.leaderboards')}}">Leaderboards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.feedback')}}">Feedback</a>
                    </li>
                </ul>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-none d-sm-inline mx-1 text-primary">{{ $userData ['name'] }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-white text-small shadow">
                        <li>
                            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
            </div>
        </nav>
    <div>
    <h1>Welcome, {{ $userData['name'] }}!</h1>
    <p>Your email address is: {{ $userData['email'] }}</p>

        <form action="{{ route('user.user-ui.user') }}" method="POST">
            @csrf

            <div class="user-info-fields">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $userData['name'] }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="birthday">Birthday</label>
                    <input type="date" name="birthday" id="birthday" value="{{ $userData['birthday'] }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="height">Height</label>
                    <input type="number" name="height" id="height" value="{{ $userData['height'] }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="number" name="weight" id="weight" value="{{ $userData['weight'] }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="male" @if ($userData['gender'] === 'male') selected @endif>Male</option>
                        <option value="female" @if ($userData['gender'] === 'female') selected @endif>Female</option>
                    </select>
                </div>

                <h3>Change Password</h3>
                    <div class="form-group password-fields">
                        <label for="password">New Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group password-fields">
                        <label for="password_confirmation">Confirm New Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary" style="color: white; background-color: #56C2F2;">Update Profile</button>

            
        </form>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>
