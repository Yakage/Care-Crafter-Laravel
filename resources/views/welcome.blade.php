<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Your Website</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/welcome.css')}}">


    <!-- Styles -->
    <style>
        /* Your existing styles remain unchanged */

        /* Additional styles for the welcome message */
        .welcome-container {
            text-align: center;
            padding: 2rem;
            background-color: #ffffff; /* Set your desired background color */
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
            margin-top: 3rem; /* Adjust the margin as needed */
        }

        .welcome-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .welcome-text {
            font-size: 1rem;
            color: #4b5563; /* Adjust text color as needed */
        }

        .home-link {
            font-size: 1rem;
            color: #2563eb; /* Adjust link color as needed */
            text-decoration: none;
            font-weight: 600;
            margin-left: 1rem;
        }

        .home-link:hover {
            color: #1e4bb6; /* Adjust hover color as needed */
        }
    </style>
</head>
<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/login') }}" class="home-link">Login</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <!-- Welcome message container -->
        <div class="welcome-container">
            <div class="welcome-title">Welcome to CareCrafter!</div>
            <p> Your Health Companion </p>
            <div class="welcome-text">Where you can track your daily activities, Step tracker, Sleep Tracker, Water intake and more.</div>
        </div>
    </div>

    <div class="wrapper">
        <h2> Sample shit </h2>
        <div class="box">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>

</body>
</html>
