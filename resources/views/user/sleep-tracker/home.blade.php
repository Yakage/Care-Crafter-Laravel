<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CareCrafter Home</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!--<link rel="stylesheet" href="css/user.css">-->
    <link rel="stylesheet" href="{{('assets/css/userhome.css')}}">
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

        
        <section class="mt-5 ">
            <div class="row">
                <div class="col-md-6">
                    <div class="myCharts">
                        <div class="myChart">
                            <h3 style="color: #000000;">Weekly Sleeps Statistics</h3>
                            <canvas id="barchart1" width="600" height="450"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="myCharts">
                        <div class="myChart">
                            <h3 style="color: #000000;">Monthly Sleeps Statistics</h3>
                            <canvas id="barchart2" width="600" height="460"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <section class="d-flex justify-content-center align-items-center">
                <div class="col py-3">
                    <div class="col-md-9 content-container mx-auto">
                        <div class="container">
                            <h2 style="color: #FFFFF; text-align: center;">History Of Sleep Tracker</h2>
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                    <div class="card mx-auto"> <!-- Center the card horizontally -->
                                        <img src="{{ asset('img/sleeptracker.jpg') }}" class="img-fluid card-img-top" alt="Sleep Tracking">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Sleep Tracker Logs</h5>
                                            @foreach ($scores as $score)
                                                <div class="card border">
                                                    <div class="mb-2"> <!-- Add margin-bottom to create a small gap -->
                                                        <p class="m-0">Date: {{ $score->date }}</p>
                                                        <p class="m-0">Score: {{ $score->score }}</p> 
                                                        <p class="m-0">Sleeps: {{ $score->sleeps }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
            </section>


        
        
        <!-- script js for graphs -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
        <script>
            async function fetchWaterDataWeekly() {
                try {
                    const response = await fetch('/chartDataWaterWeekly'); // Use the correct API endpoint
                    if (!response.ok) {
                        throw new Error('Failed to fetch data');
                    }
                    const data = await response.json();
                    return data;
                } catch (error) {
                    console.error('Error fetching water data:', error);
                    return [];
                }
            }

            document.addEventListener('DOMContentLoaded', async function() {
                const waterData = await fetchWaterDataWeekly();

                const labels = [];
                const values = [];

                waterData.forEach(entry => {
                    labels.push(entry.label);
                    values.push(entry.value);
                });

                const ctx3 = document.getElementById('barchart1').getContext('2d');
                new Chart(ctx3, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Water Intake',
                            data: values,
                            borderWidth: 3
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });

            
            async function fetchWaterDataMonthly() {
                try {
                    const response = await fetch('/chartDataWaterMonthly'); // Use the correct API endpoint
                    if (!response.ok) {
                        throw new Error('Failed to fetch data');
                    }
                    const data = await response.json();
                    return data;
                } catch (error) {
                    console.error('Error fetching water data:', error);
                    return [];
                }
            }

            document.addEventListener('DOMContentLoaded', async function() {
                const waterData = await fetchWaterDataMonthly();

                const labels = [];
                const values = [];

                waterData.forEach(entry => {
                    labels.push(entry.week);
                    values.push(entry.water);
                });

                const ctx6 = document.getElementById('barchart2').getContext('2d');
                new Chart(ctx6, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Water Intake',
                            data: values,
                            borderWidth: 3
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>


       

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <!-- script ng graphs -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>


</body>
</html>
