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
                    <h4 class="text-center mt-3 ">Hi, !</h4>
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
                        <span class="d-none d-sm-inline mx-1"></span>
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
                        <h2 class="text-center" style="color: #458ff6;">History Of BMI Calculator</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <img src="{{ asset('img/sleep tracking.jpg') }}" class="img-fluid card-img-top" alt="Sleep Tracking">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">MBI Logs</h5>
                                        @foreach ($results as $result)
                                            <div class="card border">
                                                <div class="mb-2"> <!-- Add margin-bottom to create a small gap -->
                                                    <p class="m-0">Created at: {{ $result->created_at }}</p>
                                                    <p class="m-0">Result: {{ $result->results }}</p> <!-- Use strong tag for titles -->
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <img src="{{ asset('img\bmicalcu.jpg')  }}" class="img-fluid card-img-top " alt="Sleep Tracking" style="max-width: 320px; height: 210px;">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">BMI Calculator</h5>
                                        {{-- @foreach ($alarms as $alarm)
                                        <div class="card border">
                                            <div class="mb-2"> <!-- Add margin-bottom to create a small gap -->
                                                
                                            </div>
                                        </div>
                                        @endforeach --}}
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
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
