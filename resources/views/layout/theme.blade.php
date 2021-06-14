<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Foodify</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ env('APP_URL')}}/assets/css/fontawesome.css">
    <link rel="stylesheet" href="{{ env('APP_URL')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{ env('APP_URL')}}/assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <ul class="left-info">
              <li><a href="/signup"><i class="filled-button"></i>Registreer</a></li>
              <li><a href="/admin"><i class="filled-button"></i>Login</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="/"><h2>Foodify</h2></a>
          
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="{{Request::path() === '/' ? 'nav-link active active' : 'nav-link' }}" href="/">Home</a></li>

              <li class="nav-item"><a class="{{Request::path() === 'restaurant' ? 'nav-link active active' : 'nav-link' }}" href="/restaurant">Restaurants</a></li>
              <li class="nav-item"><a class="{{Request::path() === 'cart' ? 'nav-link active active' : 'nav-link' }}" href="/order">Winkelmandje</a></li>

              <li class="nav-item"><a class="{{Request::path() === 'contact' ? 'nav-link active active' : 'nav-link' }}" href="/contact">Contact</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    
    @yield('content')
     
    <!-- Footer Starts Here -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-6 footer-item">
            <h4>Foodify</h4>
            <p>Ontdek op deze site de lekkerste restaurants bij jouw in de buurt.</p>
            <ul class="social-icons">
              <li><a rel="nofollow" href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/?lang=nl"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.linkedin.com/feed/"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
          
          <div class="col-md-6 footer-item">
            <h4>Additional Pages</h4>
            <ul class="menu-list">
              <li><a href="/restaurant">Restaurants</a></li>
              <li><a href="/order">Winkemandje</a></li>
              <li><a href="/contact">Contact</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>
                Copyright © 2021 Foodify
                <!-- <span> - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a> </span> -->
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="{{ env('APP_URL')}}/assets/js/custom.js"></script>
    <script src="{{ env('APP_URL')}}/assets/js/owl.js"></script>
    <script src="{{ env('APP_URL')}}/assets/js/slick.js"></script>
    <script src="{{ env('APP_URL')}}/assets/js/accordions.js"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>