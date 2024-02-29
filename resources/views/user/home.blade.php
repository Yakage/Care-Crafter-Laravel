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
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/cards.css">
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
                            <i class="fs-4 bi-universal-access"></i> <span class="ms-1 d-none d-sm-inline">Account</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('user.feedback')}}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Feedback</span></a>
                    </li>
                </ul>
                <hr>
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
                                </div><div class="card swiper-slide">
                                        <div class="image-content">
                                            <span class="overlay"></span>

                                            <div class="card-image">
                                            <img src="{{ asset('img\sleeptracker.jpg') }}" class="card-img" alt="profile image">
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <h2 class="name">Step Tracker</h2>
                                        <p class="description">Step Tracker</p>

                                        <button class="button">Get history</button>
                                    </div>
                                </div><div class="card swiper-slide">
                                        <div class="image-content">
                                            <span class="overlay"></span>

                                            <div class="card-image">
                                            <img src="{{ asset('img\steptracker.jpg') }}" class="card-img" alt="profile image">
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
                                            <img src="{{ asset('img\waterintake.jpg') }}" class="card-img" alt="profile image">
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <h2 class="name">BMI Calculator</h2>
                                        <p class="description">BMI Calculator</p>

                                        <button class="button">Get history</button>
                                    </div>
                                </div><div class="card swiper-slide">
                                        <div class="image-content">
                                            <span class="overlay"></span>

                                            <div class="card-image">
                                            <img src="{{ asset('img\bmicalcu.jpg') }}" class="card-img" alt="profile image">
                                        </div>
                                    </div>
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
        </div>
    </div>
</div>

       

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="js/user.js"></script>
    <!-- Swiper JS -->
<script src="js/swiper-bundle.min.js"></script>
<script src="js/scripts.js"></script>

</body>
</html>
