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
            background-color: #1A64FF;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg fill-opacity='0.11'%3E%3Cpath fill='%231988ff' d='M486 705.8c-109.3-21.8-223.4-32.2-335.3-19.4C99.5 692.1 49 703 0 719.8V800h843.8c-115.9-33.2-230.8-68.1-347.6-92.2C492.8 707.1 489.4 706.5 486 705.8z'/%3E%3Cpath fill='%2318a4ff' d='M1600 0H0v719.8c49-16.8 99.5-27.8 150.7-33.5c111.9-12.7 226-2.4 335.3 19.4c3.4 0.7 6.8 1.4 10.2 2c116.8 24 231.7 59 347.6 92.2H1600V0z'/%3E%3Cpath fill='%2318bcff' d='M478.4 581c3.2 0.8 6.4 1.7 9.5 2.5c196.2 52.5 388.7 133.5 593.5 176.6c174.2 36.6 349.5 29.2 518.6-10.2V0H0v574.9c52.3-17.6 106.5-27.7 161.1-30.9C268.4 537.4 375.7 554.2 478.4 581z'/%3E%3Cpath fill='%2317d2ff' d='M0 0v429.4c55.6-18.4 113.5-27.3 171.4-27.7c102.8-0.8 203.2 22.7 299.3 54.5c3 1 5.9 2 8.9 3c183.6 62 365.7 146.1 562.4 192.1c186.7 43.7 376.3 34.4 557.9-12.6V0H0z'/%3E%3Cpath fill='%2316E5FF' d='M181.8 259.4c98.2 6 191.9 35.2 281.3 72.1c2.8 1.1 5.5 2.3 8.3 3.4c171 71.6 342.7 158.5 531.3 207.7c198.8 51.8 403.4 40.8 597.3-14.8V0H0v283.2C59 263.6 120.6 255.7 181.8 259.4z'/%3E%3Cpath fill='%232be4ff' d='M1600 0H0v136.3c62.3-20.9 127.7-27.5 192.2-19.2c93.6 12.1 180.5 47.7 263.3 89.6c2.6 1.3 5.1 2.6 7.7 3.9c158.4 81.1 319.7 170.9 500.3 223.2c210.5 61 430.8 49 636.6-16.6V0z'/%3E%3Cpath fill='%2338e2ff' d='M454.9 86.3C600.7 177 751.6 269.3 924.1 325c208.6 67.4 431.3 60.8 637.9-5.3c12.8-4.1 25.4-8.4 38.1-12.9V0H288.1c56 21.3 108.7 50.6 159.7 82C450.2 83.4 452.5 84.9 454.9 86.3z'/%3E%3Cpath fill='%2343e1ff' d='M1600 0H498c118.1 85.8 243.5 164.5 386.8 216.2c191.8 69.2 400 74.7 595 21.1c40.8-11.2 81.1-25.2 120.3-41.7V0z'/%3E%3Cpath fill='%234ddfff' d='M1397.5 154.8c47.2-10.6 93.6-25.3 138.6-43.8c21.7-8.9 43-18.8 63.9-29.5V0H643.4c62.9 41.7 129.7 78.2 202.1 107.4C1020.4 178.1 1214.2 196.1 1397.5 154.8z'/%3E%3Cpath fill='%2355DEFF' d='M1315.3 72.4c75.3-12.6 148.9-37.1 216.8-72.4h-723C966.8 71 1144.7 101 1315.3 72.4z'/%3E%3C/g%3E%3C/svg%3E");
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
                            <button type="submit" class="btn btn-link" style="color: aqua;">Logout</button>
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

                    <button type="submit" class="btn btn-primary">Update Profile</button>

            
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
