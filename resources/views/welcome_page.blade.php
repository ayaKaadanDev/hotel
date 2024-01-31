<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- for bootstrap's file for style -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!-- for my style file -->
    <link rel="stylesheet" href="assets/css/silver_tower_hotel.css">
     <!-- for link compression file -->
     <link rel="stylesheet" href="assets/css/all.min.css">
    <title>welcome page</title>
</head>
<body>

    {{-- start navbar --}}
    <nav class="navbar navbar-expand-lg bg-black sticky-top ">
        <div class="container">
          <a class="navbar-brand" href="#">Silver Tower Hotel</a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about_us">about us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#our_rooms">our rooms</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact_us">contact us</a>
              </li>


              <li class="nav-item ">
                    @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @endauth
                    </div>
                    @endif
              </li>

          </div>
        </div>
      </nav>
    {{-- end navbar --}}

    {{-- start main phpto --}}
    <div class="carousel-inner">
        <div class="main_image">
            <div class="carousel-item active" data-bs-interval="10000">
                <img class="img-fluid bg-wight" src="assets/images/227.jpg"  alt="...">
                <div class="carousel-caption ">
                    <h1>Welcome To The <span>SILVER TOWER HOTEL</span></h1>
                </div>
            </div>
        </div>
    </div>
    {{-- end main phpto --}}

    {{-- start about us --}}
    <div id="about_us" class="about_us">
        <h1 class="caption">About us</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 text-center">
                    <img class="rounded-circle img-fluid bg-wight" src="assets/images/12.jpg" height="250" width="250">
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 text-center">
                    <h3>يقع الفندق ضمن منطقة أثرية في دمشق القديمة وهو يشكل أحد المعالم الأثريةالمحدثة فيها. يرده الزبائن من داخل سوريا ومن خارجها من السواح اللذين يهتمون بالمعالم السياحية ويقصدون الفنادق المريحة </h3>
                </div>
            </div>
        </div>
    </div>
    {{-- end about us --}}

    {{-- start out rooms --}}
    <div class="our_rooms" id="our_rooms">
        <h1 class="caption">Our rooms</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                    <img class="rounded-circle img-fluid bg-wight" src="assets/images/15.jpg" height="250" width="250">
                    <h2>room with 2 bed</h2>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                    <img class="rounded-circle img-fluid bg-wight" src="assets/images/13.jpg" height="250" width="250">
                    <h2>room with 3 bed</h2>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                    <img class="rounded-circle img-fluid bg-wight" src="assets/images/14.jpg" height="250" width="250">
                    <h2>room with 4 bed</h2>
                </div>
            </div>
        </div>
    </div>
    {{-- end out rooms --}}

    {{-- start footer --}}
    <footer id="contact_us" class="contact_us">
        <div class="container">
            <div class="row">
                <div class="item col-lg-6 col-md-12 col-sm-12">
                        <h3>OFFICE ADDRESS</h3>

                        <i class="fa fa-home"></i>
                        <span>دمشق</span> <br>

                        <i class='fas fa-phone-alt'></i>
                        <span>+963 ********* - 011 *******</span> <br>

                        <i class="fa fa-fax" aria-hidden="true"></i>
                        <span>*******</span> <br>

                </div>

            </div>
        </div>

        <div class="end">
            <div class="container">
              <p class="lead">Copyright &copy; 2022.All rights reserved, designed and developed by <span>Aya kaadan</span></p>
            </div>
            </div>
      </footer>
      {{-- end footer --}}


    <!-- any bootstrap need jquery file for work  -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- bootstrap file in js -->
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
