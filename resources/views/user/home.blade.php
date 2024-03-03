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

    <!--Swiper css -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <!--Swiper css -->



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!--<link rel="stylesheet" href="css/user.css">-->
    <link rel="stylesheet" href="css/cards.css">
    <link rel="stylesheet" href="css/userhome.css"
</head>

<body>
        <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand">CareCrafter</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">CareCrafter Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
            <div class="offcanvas-body">
                <h4>Hi, {{ $user->name }}!</h4>

                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
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
                        <a class="nav-link" href="#">Leaderboards</a>
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
                <div class="container">
                    <h2 class="text-center" style="color: #458ff6;">Features</h2>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-gap-2">
                        <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card">
                        <img src="{{ asset('img\sleep tracking.jpg') }}" class="img-fluid card-img-top" alt="Sleep Tracking">
                            <span class="text-center">Sleep Tracking</span>
                                <div class="card-body text-center">
                                    <p class="card-text">Step Tracking is a feature we have to track your steps!</p>
                                </div>
                        </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card">
                        <img src="{{ asset('img\step tracking.png') }}" class="img-fluid card-img-top" alt="Step Tracking">
                            <span class="text-center">Step Tracker</span>
                                <div class="card-body text-center">
                                    <p class="card-text">Step Tracking is a feature we have to track your steps!</p>
                                </div>
                        </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card">
                        <img src="{{ asset('img\water intake.jpg') }}" class="img-fluid card-img-top" alt="water intake">
                            <span class="text-center">Water intake</span>
                                <div class="card-body text-center">
                                    <p class="card-text">Step Tracking is a feature we have to track your steps!</p>
                                </div>
                        </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card">
                        <img src="{{ asset('img\bmi.png') }}" class="img-fluid card-img-top" alt="bmi">
                            <span class="text-center">BMI</span>
                                <div class="card-body text-center">
                                    <p class="card-text">Step Tracking is a feature we have to track your steps!</p>
                                </div>
                        </div>
                        </div>

                        <div class="slide-container swiper">
                            <div class="slide-content">
                            <div class="card-wrapper swiper-wrapper">
                                <div class="card swiper-slide">
                                        <div class="image-content">
                                            <span class="overlay"></span>

                                            <div class="card-image">
                                            <img src="{{ asset('img\sleeptracker.jpg') }}" class="card-img" alt="profile image">
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <h2 class="name">Sleep Tracker</h2>
                                        <p class="description">Sleep Tracker</p>

                                        <button class="button"><a href="{{url('getHistoryOfSleepTracker')}}" style="color: white">Get History</a></button>
                                    </div>
                                </div>
                                <div class="card swiper-slide">
                                        <div class="image-content">
                                            <span class="overlay"></span>

                                            <div class="card-image">
                                            <img src="{{ asset('img\steptracker.jpg')}}" class="card-img" alt="profile image">
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <h2 class="name">Step Tracker</h2>
                                        <p class="description">Step Tracker</p>

                                        <button class="button"><a href="{{url('getStepHistory')}}" style="color: white">Get History</a></button>
                                    </div>
                                </div>
                                <div class="card swiper-slide">
                                        <div class="image-content">
                                            <span class="overlay"></span>

                                            <div class="card-image">
                                            <img src="{{ asset('img\waterintake.jpg') }}" class="card-img">
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <h2 class="name">Water Intake</h2>
                                        <p class="description">Water Intake</p>

                                        <button class="button">Get history</button>
                                    </div>
                                </div><div class="card swiper-slide">
                                        <div class="image-content">
                                            <span class="overlay"></span>

                                            <div class="card-image">
                                            <img src="{{ asset('img\bmicalcu.jpg') }}" class="card-img" alt="profile image">
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <h2 class="name">BMI Calculator</h2>
                                        <p class="description">BMI Calculator</p>

                                        <button class="button"><a href="{{url('getHistoryOfBMI')}}" style="color: white">Get History</a></button>
                                    </div>
                                </div><div class="card swiper-slide">
                                        <div class="image-content">
                                            <span class="overlay"></span>

                                            <div class="card-image">
                                            <img src="" class="card-img" alt="">
                                        </div>
                                    </div>
                            </div>        
                        </div>
                    </div>
            </div>
            </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                    <ul class="list-group">
                        <li class="list-group-item active" aria-current="true">An active item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A fourth item</li>
                        <li class="list-group-item">And a fifth one</li>
                    </ul>
    </div>
</div>

       

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="js/user.js"></script>
    
<script src="js/swiper-bundle.min.js"></script>
<script src="js/scripts.js"></script>

</body>
</html>
