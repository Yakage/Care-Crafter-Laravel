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
                                        <a href = "#" class = "nav-link text-white text-nowrap">Features</a>
                                    </li>
                                    <li class = "nav-item">
                                        <a href = "#" class = "nav-link text-white text-nowrap">Our app</a>
                                    </li>
                                    <li class = "nav-item">
                                        <a href = "#" class = "nav-link text-white text-nowrap">About us</a>
                                    </li>
                                    <li class = "nav-item">
                                        <a href = "#" class = "nav-link text-white text-nowrap">Login</a>
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
                                    <h5 class = "item-title fw-7">Diet Plan</h5>
                                    <p class = "text">Suggestions on calories.</p>
                                </div>

                                <div class = "services-item">
                                    <div class = "item-icon">
                                        <img src = "service-icon-5.png" alt = "service icon">
                                    </div>
                                    <h5 class = "item-title fw-7">Exercise</h5>
                                    <p class = "text">Suggested excercise for certain weight loss.</p>
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

                <section class = "sc-grid sc-grid-one">
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

                <section class = "sc-feedback">
                    <div class="container">
                        <div class = "feedback-content">
                            <div class = "feedback-element">
                                <img src = "element-img-3.png">
                            </div>
                            <div class="feedback-element-2">
                                <img src = "element-img-5.png">
                            </div>
                            <div class = "title-box text-center">
                                <div class = "content-wrapper">
                                    <h3 class = "title-box-name text-white">What our customer are saying</h3>
                                    <div class = "title-separator mx-auto"></div>
                                </div>
                            </div>

                            <div class = "feedback-list feedback-slider owl-carousel owl-theme">
                                <div class = "feedback-item d-grid">
                                    <div class = "item-left d-flex align-items-center">
                                        <div class = "item-img">
                                            <img src = "catto-image.jpg" alt = "">
                                        </div>
                                        <div class = "item-info text-white">
                                            <p class = "fw-7 name">Kissune</p>
                                            <span class = "designation fw-4">Mwa</span>
                                        </div>
                                    </div>
                                    <div class = "item-right">
                                        <p class = "text text-white">"ehehehe</p>
                                    </div>
                                </div>

                                <div class = "feedback-item d-grid">
                                    <div class = "item-left d-flex align-items-center">
                                        <div class = "item-img">
                                            <img src = "catto-image.jpg" alt = "">
                                        </div>
                                        <div class = "item-info text-white">
                                            <p class = "fw-7 name">Kissune</p>
                                            <span class = "designation fw-4">loveu</span>
                                        </div>
                                    </div>
                                    <div class = "item-right">
                                        <p class = "text text-white">"ehehehe"</p>
                                    </div>
                                </div>

                                <div class = "feedback-item d-grid">
                                    <div class = "item-left d-flex align-items-center">
                                        <div class = "item-img">
                                            <img src = "catto-image.jpg" alt = "">
                                        </div>
                                        <div class = "item-info text-white">
                                            <p class = "fw-7 name">Kissune</p>
                                            <span class = "designation fw-4">mahar kita</span>
                                        </div>
                                    </div>
                                    <div class = "item-right">
                                        <p class = "text text-white">"ehehe"</p>
                                    </div>
                                </div>

                                <div class = "feedback-item d-grid">
                                    <div class = "item-left d-flex align-items-center">
                                        <div class = "item-img">
                                            <img src = "catto-image.jpg" alt = "">
                                        </div>
                                        <div class = "item-info text-white">
                                            <p class = "fw-7 name">kissune</p>
                                            <span class = "designation fw-4">i love you richa</span>
                                        </div>
                                    </div>
                                    <div class = "item-right">
                                        <p class = "text text-white">"eheh"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class = "sc-articles">
                    <div class = "articles-shape">
                        <img src = "curve-shape-2.png" alt = "">
                    </div>
                    <div class = "container">
                        <div class = "articles-content">
                            <div class = "articles-element">
                                <img src = "element-img-2.png" alt = "">
                            </div>
                            <div class = "title-box text-center">
                                <div class = "content-wrapper">
                                    <h3 class = "title-box-name">CAR NEWS!!!</h3>
                                    <div class = "title-separator mx-auto"></div>
                                </div>
                            </div>
                            
                            <div class = "articles-list d-flex flex-wrap justify-content-center">
                                <article class = "articles-item">
                                    <div class = "item-img">
                                        <img src = "article-img-1.jpg">
                                    </div>
                                    <div class = "item-body">
                                        <div class = "item-title">Crunchy cat luna with loose tooth?!</div>
                                        <p class = "text">Internet is clouded by luna the crunchy cat, now experiencing loose fangs?!</p>
                                        <a href = "#" class = "item-link text-blue d-flex align-items-baseline">
                                            <span class = "item-link-text">Read more</span>
                                            <span class = "item-link-icon">
                                                <i class = "fas fa-arrow-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </article>

                                <article class = "articles-item">
                                    <div class = "item-img">
                                        <img src = "article-img-2.jpg">
                                    </div>
                                    <div class = "item-body">
                                        <div class = "item-title">Engri black car</div>
                                        <p class = "text">This black car is very angri.</p>
                                        <a href = "#" class = "item-link text-blue d-flex align-items-baseline">
                                            <span class = "item-link-text">Read more</span>
                                            <span class = "item-link-icon">
                                                <i class = "fas fa-arrow-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </article>

                                <article class = "articles-item">
                                    <div class = "item-img">
                                        <img src = "article-img-3.jpg">
                                    </div>
                                    <div class = "item-body">
                                        <div class = "item-title">Engri whiteo catto</div>
                                        <p class = "text">Pair dp's i think they are cute.</p>
                                        <a href = "#" class = "item-link text-blue d-flex align-items-baseline">
                                            <span class = "item-link-text">Read more</span>
                                            <span class = "item-link-icon">
                                                <i class = "fas fa-arrow-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <footer class = "footer">
                <div class = "container">
                    <div class = "footer-content">
                        <div class = "footer-list d-grid text-white">
                            <div class = "footer-item">
                                <a href = "#" class = "navbar-brand d-flex align-items-center">
                                    <span class = "brand-shape d-inline-block text-white">C</span>
                                    <span class = "brand-text fw-7">kissune</span>
                                </a>
                                <p class = "text-white">yes.</p>
                            </div>

                            <div class = "footer-item">
                                <h3 class = "footer-item-title">Company</h3>
                                <ul class = "footer-links">
                                    <li><a href = "#">About us</a></li>
                                    <li><a href = "#">Contact us</a></li>
                                    <li><a href = "#">Our app</a></li>
                                </ul>
                            </div>

                            <div class = "footer-item">
                                <h3 class = "footer-item-title">Region</h3>
                                <ul class = "footer-links">
                                    <li><a href = "#">Indonesia</a></li>
                                    <li><a href = "#">Singapore</a></li>
                                    <li><a href = "#">Hongkong</a></li>
                                    <li><a href = "#">Canada</a></li>
                                </ul>
                            </div>

                            <div class = "footer-item">
                                <h3 class = "footer-item-title">Help</h3>
                                <ul class = "footer-links">
                                    <li><a href = "#">Help center</a></li>
                                    <li><a href = "#">Contact support</a></li>
                                    <li><a href = "#">Instructions</a></li>
                                    <li><a href = "#">How it works</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class = "footer-element-1">
                    <img src = "element-img-4.png" alt = "">
                </div>
                <div class = "footer-element-2">
                    <img src = "element-img-5.png" alt = "">
                </div>
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