<!DOCTYPE html>

<html lang="en">



<head>

  <!-- =======================================================

  * Template Name: NiceAdmin

  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/

  * Updated: Apr 20 2024 with Bootstrap v5.3.3

  * Author: BootstrapMade.com

  * License: https://bootstrapmade.com/license/

  ======================================================== -->

  <meta charset="utf-8">

  <meta content="width=device-width, initial-scale=1.0" name="viewport">



  <title>Dashboard - Admire Tourism</title>

  <meta content="" name="description">

  <meta content="" name="keywords">



  <!-- Favicons -->

  <link href="https://hindustantrips.com/admire/public/frontassets/images/admire-logo (1).png" rel="icon">

  <link href="https://hindustantrips.com/admire/public/frontassets/images/admire-logo (1).png" rel="apple-touch-icon">



  <!-- Google Fonts -->

  <link href="https://fonts.gstatic.com" rel="preconnect">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">



  <!-- Vendor CSS Files -->

  <link href="{{ url('public/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <link href="{{ url('public/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

  <link href="{{ url('public/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">

  <link href="{{ url('public/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">

  <link href="{{ url('public/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">

  <link href="{{ url('public/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">

  <link href="{{ url('public/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">



  <!-- Template Main CSS File -->

  <link href="{{ url('public/assets/css/style.css') }}" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>



  <style>

    .img-box{

        position: relative;

        height: 180px;

        width: 160px;

    }

    .img-box img{

        height: 150px;

        width: 140px;

    }

    .img-box .image-title{

        width: 100%;

        text-align: center;

    }

    .img-box a{

      text-decoration: none;

      color: red;

    }

    .img-box span.cancel-icon{

      position: absolute;

      float: right;

      cursor: pointer;

      top: -1px;

      right: 23px;

    }

  </style>

</head>



<body>

  @include("admin._layouts.navbar")

  



  @include("admin._layouts.sidebar")

  



  @yield('content')

  



  <!-- ======= Footer ======= -->

  <footer id="footer" class="footer">

    <div class="copyright">

      &copy; Copyright <strong><span>Admire Tourism</span></strong>. All Rights Reserved

    </div>

    <?php /*  <div class="credits">

      <!-- All the links in the footer should remain intact. -->

      <!-- You can delete the links only if you purchased the pro version. -->

      <!-- Licensing information: https://bootstrapmade.com/license/ -->

      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->

      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>

    </div> */ ?>

  </footer><!-- End Footer -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



  <!-- Vendor JS Files -->

  <script src="{{ url('public/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>

  <script src="{{ url('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{ url('public/assets/vendor/chart.js/chart.umd.js')}}"></script>

  <script src="{{ url('public/assets/vendor/echarts/echarts.min.js')}}"></script>

  <script src="{{ url('public/assets/vendor/quill/quill.js')}}"></script>

  <script src="{{ url('public/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>

  <script src="{{ url('public/assets/vendor/tinymce/tinymce.min.js')}}"></script>

  <script src="{{ url('public/assets/vendor/php-email-form/validate.js')}}"></script>



  <!-- Template Main JS File -->

  <script src="{{ url('public/assets/js/main.js')}}"></script>

  

</body>



</html>