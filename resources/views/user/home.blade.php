<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Interface</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="css/user.css">-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-2 col-xl-2 px-sm-1 px-0 bg-light">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                    <h4 class="text-center mt-3 ">Hi, {{ $user->name }}!</h4>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="{{ route('user.user-ui.user')}}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Account</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('user.feedback')}}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Feedback</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome') }}">Logout</a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-none d-sm-inline mx-1">{{ $user->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
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
        <div class="col py-3">
        <div class="col-md-9 content-container">
            <section id="features" class="section">
                <div class="container">
                    <h2 class="text-center" style="color: #458ff6;">Features</h2>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <div class="feature-box" data-section="step-tracker" style="background-color: #FFD700;">
                                <img src="{{asset('whiterun.png')}}" alt="step-tracker">
                                <p>Step Tracker</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <div class="feature-box" data-section="sleep-tracker" style="background-color: #32CD32;">
                                <img src="{{asset('whitesleep.png')}}" alt="step-tracker">
                                <p>Sleep Tracker</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <div class="feature-box" data-section="water-intake" style="background-color: #87CEEB;">
                                <img src="{{asset('whitedrink.png')}}" alt="step-tracker">
                                <p>Water Intake Reminder</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <div class="feature-box" data-section="health-journal" style="background-color: #FF69B4;">
                                <img src="{{asset('whiteeat.png')}}" alt="step-tracker">
                                <p>Health Journal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="step-tracker" class="section">
                <div class="container">
                    <h2 class="text-center" style="color: #458ff6;">Step Tracker</h2>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Daily Goal</h5>
                                    <p class="card-text" id="daily-goal">10000</p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary edit-btn">Edit</button>
                                    <button class="btn btn-danger delete-btn">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Weekly Goal</h5>
                                    <p class="card-text" id="daily-goal">10000</p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary edit-btn">Edit</button>
                                    <button class="btn btn-danger delete-btn">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Monthly Goal</h5>
                                    <p class="card-text" id="daily-goal">10000</p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary edit-btn">Edit</button>
                                    <button class="btn btn-danger delete-btn">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Steps</h5>
                                    <p class="card-text" id="daily-goal">10000</p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary edit-btn">Edit</button>
                                    <button class="btn btn-danger delete-btn">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Average</h5>
                                    <p class="card-text" id="daily-goal">10000</p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary edit-btn">Edit</button>
                                    <button class="btn btn-danger delete-btn">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Daily Goal</h5>
                                    <p class="card-text" id="daily-goal">10000</p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary edit-btn">Edit</button>
                                    <button class="btn btn-danger delete-btn">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="sleep-tracker" class="section">
                <div class="container">
                    <h2 class="text-center" style="color: #458ff6;">Sleep Tracker</h2>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Wake Up Time</h5>
                                    <h5 class="card-title">Sleep Time</h5>
                                    <p>Content</p>
                                    <p class="card-text"> <!-- Display Quality of Sleep from your database --> </p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary edit-btn">Edit</button>
                                    <button class="btn btn-danger delete-btn">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Time Slept</h5>
                                    <p>Content</p>
                                    <p class="card-text"> <!-- Display Total Sleep Time from your database --> </p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary edit-btn">Edit</button>
                                    <button class="btn btn-danger delete-btn">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Sleep</h5>
                                    <p>Content</p>
                                    <p class="card-text"> <!-- Display Average Sleep Time from your database --> </p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary edit-btn">Edit</button>
                                    <button class="btn btn-danger delete-btn">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Sleep Score</h5>
                                    <p>Content</p>
                                    <p class="card-text"> <!-- Display Quality of Sleep from your database --> </p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary edit-btn">Edit</button>
                                    <button class="btn btn-danger delete-btn">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            

            <section id="water-intake" class="section">
                <div class="container">
                    <h2 class="text-center" style="color: #458ff6;">Water Intake Reminder</h2>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Daily Goal</h5>
                                    <p>Content</p>
                                    <p class="card-text"> <!-- Display Quality of Sleep from your database --> </p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary edit-btn">Edit</button>
                                    <button class="btn btn-danger delete-btn">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Intake</h5>
                                    <p>Content</p>
                                    <p class="card-text"> <!-- Display Total Sleep Time from your database --> </p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary edit-btn">Edit</button>
                                    <button class="btn btn-danger delete-btn">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Current Intake</h5>
                                    <p>Content</p>
                                    <p class="card-text"> <!-- Display Average Sleep Time from your database --> </p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary edit-btn">Edit</button>
                                    <button class="btn btn-danger delete-btn">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Reminder</h5>
                                    <p>Content</p>
                                    <p class="card-text"> <!-- Display Quality of Sleep from your database --> </p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary edit-btn">Edit</button>
                                    <button class="btn btn-danger delete-btn">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Reminder Interval</h5>
                                    <p>Content</p>
                                    <p class="card-text"> <!-- Display Quality of Sleep from your database --> </p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary edit-btn">Edit</button>
                                    <button class="btn btn-danger delete-btn">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Today Log</h5>
                                    <p>Content</p>
                                    <p class="card-text"> <!-- Display Quality of Sleep from your database --> </p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary edit-btn">Edit</button>
                                    <button class="btn btn-danger delete-btn">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Average Volume</h5>
                                    <h5 class="card-title">Average Completion</h5>
                                    <h5 class="card-title">Drink Frequency</h5>
                                    <p>Content</p>
                                    <p class="card-text"> <!-- Display Quality of Sleep from your database --> </p>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary edit-btn">Edit</button>
                                    <button class="btn btn-danger delete-btn">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="health-journal" class="section">
                <div class="container">
                    
                </div>
            </section>

            <section id="feedbacks" class="section">
                <div class="container">
                    
                </div>
            </section>
            <section id="account" class="section">
                <div class="container">
                
                </div>
            </section>
        </div>
    </div>
</div>
        </div>
    </div>
</div>


    <!--<div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('download.jpg') }}" alt="Profile Picture" class="profile-picture mt-3">
                </a>

                <h4 class="text-center mt-3 ">Welcome, {{ $user->name }}!</h4>

                <ul class="nav flex-column mt-3 text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.feedback')}}">Feedbacks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin.user-table.{id}.edit') }}">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome') }}">Logout</a>
                    </li>
                </ul>
        </div>-->
       

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="js/user.js"></script>

</body>
</html>
