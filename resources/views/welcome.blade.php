<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CareCrafter</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- owl carousel -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- custom css -->
        <link rel = "stylesheet" href = "css/main.css" />
        <link rel = "stylesheet" href = "css/utilities.css" />
        <!-- normalize.css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        
        <div class="page-wrapper">
            <!-- header -->
            <header class = "header">
                <nav class = "navbar">
                    <div class="container">
                        <div class="navbar-content d-flex justify-content-between align-items-center">
                            <div class = "brand-and-toggler d-flex align-items-center justify-content-between">
                                <a href = "#" class = "navbar-brand d-flex align-items-center">
                                    <span class="brand-shape d-inline-block text-white">CC</span>
                                    <span class="brand-text fw-7">CareCrafter</span>
                                </a>
                                <button type = "button" class = "d-none navbar-show-btn">
                                    <i class = "fas fa-bars"></i>
                                </button>
                            </div>

                            <div class = "navbar-box">
                                <button type = "button" class = "navbar-hide-btn">
                                    <i class = "fas fa-times"></i>
                                </button>

                                <ul class = "navbar-nav d-flex align-items-center">
                                    <li class = "nav-item">
                                        <a href = "#services" class = "nav-link text-white text-nowrap">Features</a>
                                    </li>
                                    <li class = "nav-item">
                                        <a href = "#our_app" class = "nav-link text-white text-nowrap">Our app</a>
                                    </li>
                                    <li class = "nav-item">
                                        <a href = "{{ url("login")}}" class = "nav-link text-white text-nowrap">Login</a>
                                    </li>
                                    <li class = "nav-item">
                                        <a href = "{{ url("register")}}" class = "nav-link text-white text-nowrap">Register</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="element-one">
                    <img src = "element-img-1.png" alt = "">
                </div>

                <div class="banner">
                    <div class="container">
                        <div class="banner-content">
                            <div class="banner-left">
                                <div class="content-wrapper">
                                    <h1 class="banner-title">Your Virtual Health <br> Companion!</h1>
                                    <p class="text text-white">Your pocket-sized wellness wizard! Track steps, snooze smarter, and conquer fitness goals with ease. Craft your best self, one tap at a time.</p>
                                    <a href = "#services" class="btn btn-secondary">Get Started</a>
                                </div>
                            </div>

                            <div class = "banner-right d-flex align-items-center justify-content-end">
                                <img src = "banner-image.png" alt = "">
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- end of header -->

            <main>
                <section class = "sc-services" id="services">
                    <div class = "services-shape">
                        <img src = "curve-shape-1.png" alt = "">
                    </div>
                    <div class="container">
                        <div class = "services-content">
                            <div class="title-box text-center">
                                <div class = "content-wrapper">
                                    <h3 class = "title-box-name">Our services</h3>
                                    <div class = "title-separator mx-auto"></div>
                                    <p class = "text title-box-text">We provide you our best features. Track your progress and monitor cheche</p>
                                </div>
                            </div>

                            <div class = "services-list">
                                <div class = "services-item">
                                    <div class = "item-icon">
                                        <img src = "service-icon-1.png" alt = "service icon">
                                    </div>
                                    <h5 class = "item-title fw-7">Water Intake</h5>
                                    <p class = "text">Total Water Drank for the past few weeks.</p>
                                </div>

                                <div class = "services-item">
                                    <div class = "item-icon">
                                        <img src = "service-icon-2.png" alt = "service icon">
                                    </div>
                                    <h5 class = "item-title fw-7">Sleep tracker</h5>
                                    <p class = "text">Track your sleeping time.</p>
                                </div>

                                <div class = "services-item">
                                    <div class = "item-icon">
                                        <img src = "service-icon-3.png" alt = "service icon">
                                    </div>
                                    <h5 class = "item-title fw-7">Step Tracker</h5>
                                    <p class = "text">Statistics of your total steps.</p>
                                </div>

                                <div class = "services-item">
                                    <div class = "item-icon">
                                        <img src = "service-icon-4.png" alt = "service icon">
                                    </div>
                                    <h5 class = "item-title fw-7">BMI Calculator</h5>
                                    <p class = "text">Track your BMI.</p>
                                </div>

                                <div class = "services-item">
                                    <div class = "item-icon">
                                        <img src = "service-icon-6.png" alt = "service icon">
                                    </div>
                                    <h5 class = "item-title fw-7">Tracking</h5>
                                    <p class = "text">Track and save your mental history and health data</p>
                                </div>
                            </div>

                            <div class = "d-flex align-items-center justify-content-center services-main-btn">
                                <button type = "button" class = "btn btn-primary-outline">Learn more</button>
                            </div>
                        </div>
                    </div>
                </section>

                <section class = "sc-grid sc-grid-one" id="our_app">
                    <div class="container">
                        <div class = "grid-content d-grid align-items-center">
                            <div class = "grid-img">
                                <img src = "health-care-img.png" alt = "">
                            </div>
                            <div class = "grid-text">
                                <div class = "content-wrapper text-start">
                                    <div class = "title-box">
                                        <h3 class = "title-box-name text-white">CareCrafter Mobile Application</h3>
                                        <div class = "title-separator mx-auto"></div>
                                    </div>

                                    <p class = "text title-box-text text-white">Exciting News! We've launched our official mobile app, bringing convenience and innovation to your fingertips. Stay connected, track your health, and enjoy seamless well-being with the new CareCrafter app. Download now to embark on a personalized journey towards a healthier you!</p>
                                    <button type = "button" class = "btn btn-white-outline">Learn more</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class = "sc-grid sc-grid-two">
                    <div class = "container">
                        <div class = "grid-content d-grid align-items-center">
                            <div class = "grid-img">
                                <img src = "download-image.png" alt = "">
                            </div>
                            <div class = "grid-text">
                                <div class = "content-wrapper text-start">
                                    <div class = "title-box">
                                        <h3 class = "title-box-name">Download our CareCrafter mobile app</h3>
                                        <div class = "title-separator mx-auto"></div>
                                    </div>
                                    <p class = "text title-box-text">Experience the future of health tracking with CareCrafter – your all-in-one companion for daily activity monitoring. Track steps, monitor sleep, manage water intake, and more. Download now for a seamless journey to holistic well-being!</p>
                                    <button type = "button" class = "btn btn-primary-outline">
                                        Download
                                        <img src = "arrow-down.svg" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </main>
            <footer>
                <section class="footer">
                  <div class="footer-bottom">
                      <p>&copy; 2024 Care Crafter All rights reserved.</p>
                  </div>  
                </section>
              </footer>
            
        </div>
    
        <!-- jquery cdn -->
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <!-- owl carousel -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- custom js -->
        <script src = "/js/script.js"></script>
    </body>
</html>