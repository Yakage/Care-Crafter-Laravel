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
            </div>
        </nav>

        <div class="container-fluid" id="content">
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img\sleep tracking.jpg') }}" class="d-block w-100 h-100" alt="...">
                            <div class="carousel-caption">
                                <h5>Sleeptracking</h5>
                                <p>Embark on a journey of nocturnal self-discovery with the illuminating power of sleep tracking, unlocking insights into your sleep patterns and paving the way for rejuvenated days ahead.</p>
                                <p><a href="#Sleeptracking" class="btn btn-primary mt-3">Go</a></p>
                            </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img\stepp.jpg') }}" class="d-block w-100 h-100" alt="...">
                            <div class="carousel-caption">
                                <h5>Steptracking</h5>
                                <p>Embark on a fitness odyssey as you conquer daily milestones and unlock a healthier you through the seamless integration of step tracking, turning every stride into a step towards vitality.</p>
                                <p><a href="#Steptracking" class="btn btn-primary mt-3">Go</a></p>
                            </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img\water intake.jpg') }}" class="d-block w-100 h-100" alt="...">
                            <div class="carousel-caption">
                                <h5>Water Intake</h5>
                                <p>Quench your well-being with mindful hydration, as tracking your water intake becomes the liquid compass guiding you towards optimal health and vitality.</p>
                                <p><a href="#Waterintake" class="btn btn-primary mt-3">Go</a></p>
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

                    <section id="Sleeptracking">
                    <div class="h2 text-center">Sleeptracking</div>
                    <div class="container statcon gap-3">
                    <div class="stats shadow">
                        <div class="stat">
                            <div class="stat-title">This Day</div>
                            <div class="stat-value">89,400</div>
                            <div class="stat-desc">21% more than last month</div>
                        </div>
                    </div>
                    <div class="stats shadow">
                        <div class="stat">
                            <div class="stat-title">This week</div>
                            <div class="stat-value">89,400</div>
                            <div class="stat-desc">21% more than last month</div>
                        </div>
                    </div>
                    <div class="stats shadow">
                        <div class="stat">
                            <div class="stat-title">This month</div>
                            <div class="stat-value">89,400</div>
                            <div class="stat-desc">21% more than last month</div>
                        </div>
                    </div>
                    </div>
                    </section>
                    <section id="Steptracking">
                    <div class="h2 text-center">Steptracking</div>
                    <div class="container statcon gap-3">
                    <div class="stats shadow">
                        <div class="stat">
                            <div class="stat-title">This day</div>
                            <div class="stat-value">89,400</div>
                            <div class="stat-desc">21% more than last month</div>
                        </div>
                    </div>
                    <div class="stats shadow">
                        <div class="stat">
                            <div class="stat-title">This week</div>
                            <div class="stat-value">89,400</div>
                            <div class="stat-desc">21% more than last month</div>
                        </div>
                    </div>
                    <div class="stats shadow">
                        <div class="stat">
                            <div class="stat-title">This month</div>
                            <div class="stat-value">89,400</div>
                            <div class="stat-desc">21% more than last month</div>
                        </div>
                    </div>
                    </div>
                    </section>
                    <section id="Waterintake">
                    <div class="h2 text-center">Water intake reminder</div>
                    <div class="container statcon gap-3">
                    <div class="stats shadow">
                        <div class="stat">
                            <div class="stat-title">This day</div>
                            <div class="stat-value">89,400</div>
                            <div class="stat-desc">21% more than last month</div>
                        </div>
                    </div>
                    <div class="stats shadow">
                        <div class="stat">
                            <div class="stat-title">This week</div>
                            <div class="stat-value">89,400</div>
                            <div class="stat-desc">21% more than last month</div>
                        </div>
                    </div>
                    <div class="stats shadow">
                        <div class="stat">
                            <div class="stat-title">This month</div>
                            <div class="stat-value">89,400</div>
                            <div class="stat-desc">21% more than last month</div>
                        </div>
                    </div>
                </div>
            </section>
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
