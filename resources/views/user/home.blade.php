<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Interface</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/user.css">
</head>
<body>

<div class="dropdown-container">
    <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Menu
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#features">Features</a>
            <a class="dropdown-item" href="#feedbacks">Feedbacks</a>
            <a class="dropdown-item" href="#account">Account</a>
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Logout</a>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidebar d-flex flex-column justify-content-center align-items-center">
            <a href="#" class="profile-link">
                <img src="{{ asset('download.jpg') }}" alt="Profile Picture" class="profile-picture mt-3">
            </a>

            <h4 class="text-center mt-3 ">Juan Enrile</h4>

            <ul class="nav flex-column mt-3 text-center">
                <li class="nav-item">
                    <a class="nav-link" href="#features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#feedbacks">Feedbacks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#account">Account</a>
                </li>
            </ul>
        </div>
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
                </div>
            </section>

            <section id="sleep-tracker" class="section">
                <div class="container">
                    <h2 class="text-center" style="color: #458ff6;">Sleep Tracker</h2>
                </div>
            </section>

            <section id="water-intake" class="section">
                <div class="container">
                    <h2 class="text-center" style="color: #458ff6;">Water Intake Reminder</h2>
                </div>
            </section>

            <section id="health-journal" class="section">
                <div class="container">
                    <h2 class="text-center" style="color: #458ff6;">Health Journal</h2>
                </div>
            </section>

            <section id="feedbacks" class="section">
                <div class="container">
                    <h2 class="text-center" style="color: #458ff6;">Feedbacks</h2>
                </div>
            </section>
            <section id="account" class="section">
                <div class="container">
                    <h2 class="text-center" style="color: #458ff6;">Account</h2>
                </div>
            </section>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/user.js"></script>

</body>
</html>
