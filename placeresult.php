<!DOCTYPE html>
<html>
<?php
session_start();
?>

<head>
    <title>Plan It</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/menu.css">
    <!--Google API Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">
    <!--Font Awesome Icons CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!--Boostrap CDN-->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <!--for place recommendation results only-->

    <link rel="stylesheet" href="/assets/recommendation/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/assets/recommendation/css/animate.css">
    <link rel="stylesheet" href="/assets/recommendation/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/recommendation/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/recommendation/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/recommendation/css/aos.css">
    <link rel="stylesheet" href="/assets/recommendation/css/ionicons.min.css">
    <link rel="stylesheet" href="/assets/recommendation/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/assets/recommendation/css/jquery.timepicker.css">
    <link rel="stylesheet" href="/assets/recommendation/css/flaticon.css">
    <link rel="stylesheet" href="/assets/recommendation/css/icomoon.css">
    <link rel="stylesheet" href="/assets/recommendation/css/style.css">
</head>

<body>
    <!-- Header -->
    <header id="header">
        <nav class="left">
            <a href="index.html" class="logo"><i class="far fa-map"></i>&nbsp;PlanIt</a>
        </nav>
        <nav class="right">
            <a href="route.php">My Plan</a> <!-- isi webpage signup-->
            <a href="#" class="#">Hi, <?php echo $_SESSION['userUid'] ?></a>
            <a href="includes/logout.inc.php" class="#">Logout</a>
        </nav>
    </header>

    <!-- Banner -->
    <section id="banner">
        <div>
            <h1 style="margin-top:-10%;">Weather Forecast</h1>
            <section class="wrapper" style="margin-top:-10%; margin-bottom:-15%">
                <div class="container" style="padding: 10px; margin: auto; background-color:aliceblue; border-radius:1rem">
                    <div class="container">
                        <canvas id="myChart" style="border-style: hidden;"></canvas>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <main>
        <nav id="nav-top">
            <ul>
                <li><a href="placeresult.php" class="active" style="text-decoration: none">Recommendation</a></li>
                <li><a href="route.php" style="text-decoration: none">Route</a></li>
                <li><a href="checklist.php" style="text-decoration: none">Checklist</a></li>
                <li><a href="calender.php" style="text-decoration: none">Calender</a></li>
            </ul>
        </nav>
        <!-- Two -->
        <main>
            <!-- One -->
            <!-- left side search-->
            <section id="one" class="wrapper">
                <div class="inner flex flex-3"></div>
                <div class="align-center">
                    <div>
                    </div>
                    <h2 style="margin-top:-20px;">Recommendation Result</h2>
                    <section class="ftco-section ftco-degree-bg" style="margin-top:-150px;"></section>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 sidebar ftco-animate">
                                <div class="sidebar-wrap bg-light ftco-animate">
                                    <h3 class="heading mb-4">Find City</h3>
                                    <form action="#">
                                        <div class="fields">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Destination, City">
                                            </div>
                                            <div class="form-group">
                                                <div class="select-wrap one-third">
                                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                    <select name="" id="" class="form-control" placeholder="Keyword search">
                                                        <!--change according to api-->
                                                        <option value="">Select Location</option>
                                                        <option value="">San Francisco USA</option>
                                                        <option value="">Berlin Germany</option>
                                                        <option value="">Lodon United Kingdom</option>
                                                        <option value="">Paris Italy</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="checkin_date" class="form-control" placeholder="Date from">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="checkin_date" class="form-control" placeholder="Date to">
                                            </div>
                                            <div class="form-group">
                                                <div class="range-slider">
                                                    <span>
                                                        <input type="number" value="25000" min="0" max="120000" /> -
                                                        <input type="number" value="50000" min="0" max="120000" />
                                                    </span>
                                                    <input value="1000" min="0" max="120000" step="500" type="range" />
                                                    <input value="50000" min="0" max="120000" step="500" type="range" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="sidebar-wrap bg-light ftco-animate">
                                    <h3 class="heading mb-4">Star Rating</h3>
                                    <form method="post" class="star-rating">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i></span></p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span>
                                                </p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span>
                                                </p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span>
                                                </p>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-4 ftco-animate">
                                        <div class="destination">
                                            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/destination-1.jpg);">
                                                <div class="icon d-flex justify-content-center align-items-center">
                                                    <span class="icon-search2"></span>
                                                </div>
                                            </a>
                                            <div class="text p-3">
                                                <div class="d-flex">
                                                    <div class="one">
                                                        <h3><a href="#">Paris, Italy</a></h3>
                                                        <p class="rate">
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star-o"></i>
                                                            <span>8 Rating</span>
                                                        </p>
                                                    </div>
                                                    <div class="two">
                                                        <span class="price">$200</span>
                                                    </div>
                                                </div>
                                                <p>Far far away, behind the word mountains, far from the countries</p>
                                                <p class="days"><span>2 days 3 nights</span></p>
                                                <hr>
                                                <p class="bottom-area d-flex">
                                                    <span><i class="icon-map-o"></i> San Franciso, CA</span>
                                                    <span class="ml-auto"><a href="#">Discover</a></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ftco-animate">
                                        <div class="destination">
                                            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/destination-2.jpg);">
                                                <div class="icon d-flex justify-content-center align-items-center">
                                                    <span class="icon-search2"></span>
                                                </div>
                                            </a>
                                            <div class="text p-3">
                                                <div class="d-flex">
                                                    <div class="one">
                                                        <h3><a href="#">Paris, Italy</a></h3>
                                                        <p class="rate">
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star-o"></i>
                                                            <span>8 Rating</span>
                                                        </p>
                                                    </div>
                                                    <div class="two">
                                                        <span class="price">$200</span>
                                                    </div>
                                                </div>
                                                <p>Far far away, behind the word mountains, far from the countries</p>
                                                <p class="days"><span>2 days 3 nights</span></p>
                                                <hr>
                                                <p class="bottom-area d-flex">
                                                    <span><i class="icon-map-o"></i> San Franciso, CA</span>
                                                    <span class="ml-auto"><a href="#">Discover</a></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ftco-animate">
                                        <div class="destination">
                                            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/destination-3.jpg);">
                                                <div class="icon d-flex justify-content-center align-items-center">
                                                    <span class="icon-search2"></span>
                                                </div>
                                            </a>
                                            <div class="text p-3">
                                                <div class="d-flex">
                                                    <div class="one">
                                                        <h3><a href="#">Paris, Italy</a></h3>
                                                        <p class="rate">
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star-o"></i>
                                                            <span>8 Rating</span>
                                                        </p>
                                                    </div>
                                                    <div class="two">
                                                        <span class="price">$200</span>
                                                    </div>
                                                </div>
                                                <p>Far far away, behind the word mountains, far from the countries</p>
                                                <p class="days"><span>2 days 3 nights</span></p>
                                                <hr>
                                                <p class="bottom-area d-flex">
                                                    <span><i class="icon-map-o"></i> San Franciso, CA</span>
                                                    <span class="ml-auto"><a href="#">Discover</a></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ftco-animate">
                                        <div class="destination">
                                            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/destination-4.jpg);">
                                                <div class="icon d-flex justify-content-center align-items-center">
                                                    <span class="icon-search2"></span>
                                                </div>
                                            </a>
                                            <div class="text p-3">
                                                <div class="d-flex">
                                                    <div class="one">
                                                        <h3><a href="#">Paris, Italy</a></h3>
                                                        <p class="rate">
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star-o"></i>
                                                            <span>8 Rating</span>
                                                        </p>
                                                    </div>
                                                    <div class="two">
                                                        <span class="price">$200</span>
                                                    </div>
                                                </div>
                                                <p>Far far away, behind the word mountains, far from the countries</p>
                                                <p class="days"><span>2 days 3 nights</span></p>
                                                <hr>
                                                <p class="bottom-area d-flex">
                                                    <span><i class="icon-map-o"></i> San Franciso, CA</span>
                                                    <span class="ml-auto"><a href="#">Discover</a></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ftco-animate">
                                        <div class="destination">
                                            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/destination-5.jpg);">
                                                <div class="icon d-flex justify-content-center align-items-center">
                                                    <span class="icon-search2"></span>
                                                </div>
                                            </a>
                                            <div class="text p-3">
                                                <div class="d-flex">
                                                    <div class="one">
                                                        <h3><a href="#">Paris, Italy</a></h3>
                                                        <p class="rate">
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star-o"></i>
                                                            <span>8 Rating</span>
                                                        </p>
                                                    </div>
                                                    <div class="two">
                                                        <span class="price">$200</span>
                                                    </div>
                                                </div>
                                                <p>Far far away, behind the word mountains, far from the countries</p>
                                                <p class="days"><span>2 days 3 nights</span></p>
                                                <hr>
                                                <p class="bottom-area d-flex">
                                                    <span><i class="icon-map-o"></i> San Franciso, CA</span>
                                                    <span class="ml-auto"><a href="#">Discover</a></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ftco-animate">
                                        <div class="destination">
                                            <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/destination-6.jpg);">
                                                <div class="icon d-flex justify-content-center align-items-center">
                                                    <span class="icon-search2"></span>
                                                </div>
                                            </a>
                                            <div class="text p-3">
                                                <div class="d-flex">
                                                    <div class="one">
                                                        <h3><a href="#">Paris, Italy</a></h3>
                                                        <p class="rate">
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star"></i>
                                                            <i class="icon-star-o"></i>
                                                            <span>8 Rating</span>
                                                        </p>
                                                    </div>
                                                    <div class="two">
                                                        <span class="price">$200</span>
                                                    </div>
                                                </div>
                                                <p>Far far away, behind the word mountains, far from the countries</p>
                                                <p class="days"><span>2 days 3 nights</span></p>
                                                <hr>
                                                <p class="bottom-area d-flex">
                                                    <span><i class="icon-map-o"></i> San Franciso, CA</span>
                                                    <span class="ml-auto"><a href="#">Discover</a></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col text-center">
                                        <div class="block-27">
                                            <ul>
                                                <li><a href="#">&lt;</a></li>
                                                <li class="active"><span>1</span></li>
                                                <li><a href="#">&gt;</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer id="footer">
            <div class="inner">
                <h2>Contact Us</h2>
                <ul class="actions">
                    <li><span class="icon fa-phone"></span> <a href="#">012-3456789</a></li>
                    <li><span class="icon fa-envelope"></span> <a href="#">planIt.info@gmail.com</a></li>
                    <li><span class="icon fa-map-marker"> </span>69, KK13, University Malaya</li>
                </ul>
            </div>
            <div class="copyright">
                Copyright &copy; reserved 2019 PlanIt.Co
            </div>
        </footer>

        <!--Bootstrap & JQuery-->
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script> -->

        <!-- for place recommendation only -->
        <script src="/assets/recommendation/js/jquery.min.js"></script>
        <script src="/assets/recommendation/js/jquery-migrate-3.0.1.min.js"></script>
        <script src="/assets/recommendation/js/popper.min.js"></script>
        <script src="/assets/recommendation/js/bootstrap.min.js"></script>
        <script src="/assets/recommendation/js/jquery.easing.1.3.js"></script>
        <script src="/assets/recommendation/js/jquery.waypoints.min.js"></script>
        <script src="/assets/recommendation/js/jquery.stellar.min.js"></script>
        <script src="/assets/recommendation/js/owl.carousel.min.js"></script>
        <script src="/assets/recommendation/js/jquery.magnific-popup.min.js"></script>
        <script src="/assets/recommendation/js/aos.js"></script>
        <script src="/assets/recommendation/js/jquery.animateNumber.min.js"></script>
        <script src="/assets/recommendation/js/bootstrap-datepicker.js"></script>
        <script src="/assets/recommendation/js/jquery.timepicker.min.js"></script>
        <script src="/assets/recommendation/js/scrollax.min.js"></script>
        <script src="/assets/recommendation/js/range.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
        </script>
        <script src="/assets/recommendation/js/google-map.js"></script>
        <script src="/assets/recommendation/js/main.js"></script>

        <!--Skel.io skeleton framework-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/skel/3.0.1/skel.min.js" integrity="sha256-3e+NvOq+D/yeJy1qrWpYkEUr6SlOCL5mHpc2nZfX74E=" crossorigin="anonymous"></script>
        <!--Own Scripts-->
        <script src="assets/js/jquery.scrolly.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/checklist.js"></script>
        <script src="assets/js/weather.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
        <script>
            var CITY = "<?php echo $_SESSION['country_to'] ?>";
            getWeatherData(CITY);
        </script>
        <!--end-->
    </main>
</body>

</html>