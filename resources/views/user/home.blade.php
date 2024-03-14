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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!--<link rel="stylesheet" href="css/user.css">-->
    <link rel="stylesheet" href="{{secure_asset('assets/css/userhome.css')}}">

    <style>
        .yawa {
            font-size: 34px;
            /* margin-top: 10px;
            margin-bottom: 10px; */
        }
        .card {
            margin-bottom: 30px; 
        }

        .card-img-top {
            height: auto;
            width: 100%;
        }

        .statistics-head {
            margin-top: 100px;
            margin-bottom: 150px;
        }

        .statistics {
            height: 230px;
        }

        .statistics .card-body {
            position: relative;
            padding: 10px;
        }

        .statistics .card-body i {
            position: absolute;
            top: 0;
            right: 0;
            margin: 10px; /* Adjust as needed */
        }


        </style>

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
        

        <div class="container p-5 statistics-head">
            <h1 class="text-center text-white mb-5">Today's Statistics</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="card statistics">
                        <div class="card-body">
                            <h3 class="card-title"><i class="fas fa-walking"></i> Steps</h3>
                            <p class="text-center mt-5">Goal: {{ $userDailyGoal }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card statistics">
                        <div class="card-body">
                            <h3 class="card-title"><i class="fas fa-tint"></i> Water</h3>
                            <p class="text-center mt-5">Total Water Intake: {{ $totalWaterIntake}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card statistics">
                        <div class="card-body">
                            <h3 class="card-title"><i class="fas fa-weight"></i> BMI</h3>
                            <p class="text-center mt-5">BMI: {{ $bmi}}</p>
                            <p class="text-center mt-5">Classification: {{ $bmiClassification }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card statistics">
                        <div class="card-body">
                            <h3 class="card-title"><i class="fas fa-bed"></i> Sleep</h3>
                            <p class="text-center mt-5">Total Sleep: {{ $totalSleepTime}}</p>
                            <p class="text-center mt-5">Score: {{ $sleepScore}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="container text-center p-5 mt-5">
            <span class="mx-auto yawa mb-3">Dietary Suggestions</span>
            <p class="mx-auto par">On our website, we offer personalized dietary suggestions tailored to your preferences, restrictions, and health goals. Simply navigate to your user profile, input your dietary information, and let our system generate customized recommendations for you.</p>
            <span class="mx-auto yawa" style="margin-top: 100px; margin-bottom: 100px;">Meats for diet</span>
            <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <img src="{{ asset('img/chicken breasts.jpg')}}" alt="Chicken Breast" class="card-img-top img-fluid" style=" border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title">Chicken Breast</h5>
                            <p class="card-text">Here's the nutrition breakdown for a skinless chicken breast:</p>
                            <p class="card-text">Calories: 128g</p>
                            <p class="card-text">Protein: 25.9</p>
                            <p class="card-text">Fat: 2.69</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <img src="{{ asset('img/leanbeef.jpg')}}" alt="Lean Beef" class="card-img-top img-fluid" style=" border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title">Lean Beef</h5>
                            <p class="card-text">Here's the nutrition breakdown for Lean Beef:</p>
                            <p class="card-text">Calories: 250g</p>
                            <p class="card-text">Protein: 26g</p>
                            <p class="card-text">Fat: 25g</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <img src="{{ asset('img/bison.jpg')}}" alt="Lean Beef" class="card-img-top img-fluid" style=" border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title">Bison meat</h5>
                            <p class="card-text">Here's the nutrition breakdown for Lean Beef:</p>
                            <p class="card-text">Calories: 124g</p>
                            <p class="card-text">Protein: 20g</p>
                            <p class="card-text">Fat: 7g</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <img src="{{ asset('img/duck.jpg')}}" alt="Lean Beef" class="card-img-top img-fluid" style=" border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title">Duck meat</h5>
                            <p class="card-text">Here's the nutrition breakdown for Lean Beef:</p>
                            <p class="card-text">Calories: 337g</p>
                            <p class="card-text">Protein: 19g</p>
                            <p class="card-text">Fat: 5g</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center my-5">
                    <span class="mx-auto yawa">Nuts for diet</span>
                    <p class="mx-auto">A nut-rich diet offers numerous health benefits due to their high nutritional content. Rich in healthy fats, protein, fiber, vitamins, and minerals, nuts can support heart health by reducing bad cholesterol levels and lowering the risk of cardiovascular diseases.</p>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <img src="{{ asset('img/walnuts.jpg')}}" alt="Walnut" class="card-img-top img-fluid" style=" border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title">Walnut</h5>
                            <p class="card-text">Here's the nutrition breakdown for Walnut:</p>
                            <p class="card-text">Calories: 654g</p>
                            <p class="card-text">Protein: 15g</p>
                            <p class="card-text">Fat: 65g</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <img src="{{ asset('img/pistachio.png')}}" alt="Pistachio Nuts" class="card-img-top img-fluid" style=" border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title">Pistachio Nuts</h5>
                            <p class="card-text">Here's the nutrition breakdown for Pistachio Nuts:</p>
                            <p class="card-text">Calories: 59</p>
                            <p class="card-text">Protein: 10g</p>
                            <p class="card-text">Fat: 0.4g</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <img src="{{ asset('img/macadamia.jpg')}}" alt="Pistachio Nuts" class="card-img-top img-fluid" style=" border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title">Macadamia Nuts</h5>
                            <p class="card-text">Here's the nutrition breakdown for Macadamia Nuts:</p>
                            <p class="card-text">Calories: 718g</p>
                            <p class="card-text">Protein: 8g</p>
                            <p class="card-text">Fat: 76g</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <img src="{{ asset('img/cashew.jpg')}}" alt="Pistachio Nuts" class="card-img-top img-fluid" style=" border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title">Cashew Nuts</h5>
                            <p class="card-text">Here's the nutrition breakdown for Cashew Nuts:</p>
                            <p class="card-text">Calories: 157g</p>
                            <p class="card-text">Protein: 5g</p>
                            <p class="card-text">Fat: 12g</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center my-5">
                    <span class="mx-auto yawa">Dairy for diet</span>
                    <p class="mx-auto">Incorporating dairy into your diet offers numerous health benefits. Dairy products are rich sources of essential nutrients like calcium, protein, vitamins, and minerals, which are crucial for bone health, muscle function, and overall well-being. Additionally, dairy consumption may lower the risk of osteoporosis, improve dental health, and support weight management when consumed in moderation as part of a balanced diet.</p>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <img src="{{ asset('img/greek yogurt.jpg')}}" alt="Greek Yogurt" class="card-img-top img-fluid" style=" border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title">Greek Yogurt</h5>
                            <p class="card-text">Here's the nutrition breakdown for Greek Yogurt:</p>
                            <p class="card-text">Calories: 59g</p>
                            <p class="card-text">Protein: 10g</p>
                            <p class="card-text">Fat: 0.4g</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <img src="{{ asset('img/kefir.jpg')}}" alt="Kefir" class="card-img-top img-fluid" style=" border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title">Kefir</h5>
                            <p class="card-text">Here's the nutrition breakdown for Kefir Drink:</p>
                            <p class="card-text">Calories: 104g</p>
                            <p class="card-text">Protein: 10g per serving</p>
                            <p class="card-text">Fat: 2.5g</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <img src="{{ asset('img/swisscheese.jpg')}}" alt="Kefir" class="card-img-top img-fluid" style=" border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title">Swiss Cheese</h5>
                            <p class="card-text">Here's the nutrition breakdown for Swiss Cheese:</p>
                            <p class="card-text">Calories: 380g</p>
                            <p class="card-text">Protein: 27g per serving</p>
                            <p class="card-text">Fat: 28g</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <img src="{{ asset('img/bluecheese.jpg')}}" alt="Kefir" class="card-img-top img-fluid" style=" border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title">Blue Cheese</h5>
                            <p class="card-text">Here's the nutrition breakdown for Blue Cheese:</p>
                            <p class="card-text">Calories: 353g</p>
                            <p class="card-text">Protein: 21g per serving</p>
                            <p class="card-text">Fat: 29g</p>
                        </div>
                    </div>
                </div>

                <span class="mx-auto yawa mb-3">Fish for diet</span>
                <p class="mx-auto par">Fish is a highly nutritious addition to any diet. Packed with high-quality protein, omega-3 fatty acids, vitamins, and minerals, it offers numerous health benefits. Not only is fish low in saturated fat, but it also provides essential nutrients like vitamin D and B12.</p>

                <div class="col-md-6">
                    <div class="card">
                        <img src="{{ asset('img/salmon.jpg')}}" alt="Kefir" class="card-img-top img-fluid" style=" border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title">Salmon</h5>
                            <p class="card-text">Here's the nutrition breakdown for Kefir Drink:</p>
                            <p class="card-text">Calories: 104g</p>
                            <p class="card-text">Protein: 20g per serving</p>
                            <p class="card-text">Fat: 13g</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <img src="{{ asset('img/tilapia.jpg')}}" alt="Kefir" class="card-img-top img-fluid" style=" border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title">Tilapia</h5>
                            <p class="card-text">Here's the nutrition breakdown for Kefir Drink:</p>
                            <p class="card-text">Calories: 208g</p>
                            <p class="card-text">Protein: 26g per serving</p>
                            <p class="card-text">Fat: 2.7g</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <img src="{{ asset('img/sardine.jpg')}}" alt="Kefir" class="card-img-top img-fluid" style=" border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title">Sardine</h5>
                            <p class="card-text">Here's the nutrition breakdown for Sardine:</p>
                            <p class="card-text">Calories: 134g</p>
                            <p class="card-text">Protein: 23g per serving</p>
                            <p class="card-text">Fat: 8g</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <img src="{{ asset('img/mackarel.jpg')}}" alt="Kefir" class="card-img-top img-fluid" style=" border-radius: 12px;">
                        <div class="card-body">
                            <h5 class="card-title">Mackarel</h5>
                            <p class="card-text">Here's the nutrition breakdown for Mackarel:</p>
                            <p class="card-text">Calories: 305g</p>
                            <p class="card-text">Protein: 19g per serving</p>
                            <p class="card-text">Fat: 25g</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


       

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <!-- script ng graphs -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>


</body>
</html>
