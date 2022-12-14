<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rapid Bootstrap Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    @vite('resources/js/app.js')
    <!-- Favicons -->
    <link href="front/images/img/favicon.png" rel="icon">
    <link href="front/images/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700"
        rel="stylesheet">
    <link href="front/css/lib/animate/animate.min.css" rel="stylesheet">
    <link href="front/css/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="front/css/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    {{-- <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Libraries CSS Files -->
    {{-- <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet"> --}}

    <!-- Main Stylesheet File -->
    {{-- <link href="css/style.css" rel="stylesheet"> --}}

</head>

<body dir="rtl">

    @include('front.navbar')




    @yield('content')




    @include('front.footer')

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>




     <div id="preloader"></div>

    {{-- <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/mobile-nav/mobile-nav.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script> --}}
    <!-- Contact Form JavaScript File -->
    {{-- <script src="contactform/contactform.js"></script> --}}

    <!-- Template Main Javascript File -->
    {{-- <script src="js/main.js"></script> --}}
    {{-- <script src="front/js/lib/wow/wow.min.js"></script>
    <script src="front/js/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="front/js/lib/lightbox/js/lightbox.min.js"></script> --}}
</body>

</html>
