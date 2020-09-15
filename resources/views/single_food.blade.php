<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Single Page</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">
</head>
<body>
<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-phone"></i> +234 000 0000 000
        <span class="d-none d-lg-inline-block"><i class="icofont-clock-time icofont-rotate-180"></i> Mon-Sat: 9:00 AM - 11:00 PM</span>
      </div>
      <div class="languages">
        <ul>
          <li>En</li>
          <li><a href="#">Fr</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">RestauLav</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{ route('home_website') }}">Home</a></li>          
          @if(Auth::check())
           <li class="book-a-table text-center"><a href="/login">{{ Auth::user()->name }}</a></li>
          @else
           <li class="book-a-table text-center"><a href="/login">Login</a></li>
          @endif
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <div class="container" >
<div style="margin-top:120px">

    @if($dish)
      <div class="row">
          <div class="col-lg-5">
              <img src="{{ $dish->photo->name }}" class="img-rounded rounded img-thumbnail img-responsive" alt="Imagery">
          </div>

          <div class="col-lg-7">
            <p style="text-align:justify;">
                {{ $dish->content }}
            </p> 
            <small> - Category: {{ $dish->category->name }}</small>   
            <small> - Price: ${{ $dish->price }}</small> 
            <small> - Food Plan: {{ $dish->food_plan }}</small>     
            <small> - Author: {{ $dish->user->name }}</small>

            <div class="row">
                <!-- DISQUS -->

            </div>        
          </div>

      </div>  

     
    @endif

</div>
</div>   



<div style="margin-top:10px">
    @include('includes.foot')
</div>
</body>