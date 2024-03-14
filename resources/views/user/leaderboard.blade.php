<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leaderboards</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!--<link rel="stylesheet" href="css/user.css">-->
    <link rel="stylesheet" href="{{secure_asset('assets/css/leaderboards.css')}}">
</head>

<body>
    <header>
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
                    <h4>Hi, {{ $user->name }}! How are you feeling today?</h4>

                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.home')}}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Features</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('user.stepTracker')}}">Step Tracking</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.sleepsTracker')}}">Sleep Tracking</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.waterIntake')}}">Water Intake Reminder</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.leaderboards')}}">Leaderboards</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.feedback')}}">Feedback</a>
                        </li>
                    </ul>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-none d-sm-inline mx-1 text-primary">{{ $user->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-white text-small shadow">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.user-ui.user')}}">Account</a>
                        </li>
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
    </header>
    
    <main style="padding-top: 150px;">
        <section id="StepTracker">
        <h1><span>Step Leaderboard</span></h1>
            <div class="tbl-container bdr">
            <table class="table">
                <thead class="table-info">
                    <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Steps</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topUsers as $key => $user) 
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->total_steps }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </section>

        <section id="SleepTracker">
            <h1><span>Sleeps Leaderboard</span></h1>
                <div class="tbl-container bdr">
                <table class="table">
                    <thead class="table-info">
                        <tr>
                            <th>Rank</th>
                            <th>Name</th>
                            <th> Sleep time </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topSleepers as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{-- Convert seconds to HH:MM:SS format --}}
                                    @php
                                        $hours = floor($user->total_sleeps / 3600);
                                        $minutes = floor(($user->total_sleeps / 60) % 60);
                                        $seconds = $user->total_sleeps % 60;
                                    @endphp
                                    {{ sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds) }}
                                </td>  
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
        </section>
        <section id="WaterIntake">
            <h1><span> Intake Leaderboard</span></h1>
                <div class="tbl-container bdr">
                <table class="table">
                    <thead class="table-info">
                        <tr>
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Water Intake (mL)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topWaterDrinkers as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->total_water }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>  
                </div>  
        </section>
    </main>
        


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>