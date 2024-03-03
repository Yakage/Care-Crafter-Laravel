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

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">CareCrafter</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

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
            </div>

            <div class="form-group password-fields">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group password-fields">
                <label for="password_confirmation">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
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
