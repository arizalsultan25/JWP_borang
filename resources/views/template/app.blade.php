<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Borang Kuy</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="{{ asset('argon-login/img/brand/favicon.png') }}" type="image/png">
  <link rel="apple-touch-icon" href="argon-login/img/brand/favicon.png" type="image/png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('ninestar/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('ninestar/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('ninestar/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('ninestar/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('ninestar/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('ninestar/vendor/aos/aos.css') }}" rel="stylesheet">

  {{-- Sweet alert --}}
  <link rel="stylesheet" href="{{ asset('argon-login/vendor/sweetalert2/dist/sweetalert2.min.css') }}">

  <!-- Template Main CSS File -->
  <link href="{{ asset('ninestar/css/style.css') }}" rel="stylesheet">

  {{-- Font awesome icon --}}
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <style>
        .link-ruangan:hover{
            color : #EE723C
        }
    </style>

  <!-- =======================================================
  * Template Name: Ninestars - v2.3.1
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  {{-- Custom css --}}
  <style>
      .tombol {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        border: 0;
        background: none;
        font-size: 16px;
        padding: 0 20px;
        background: #eb5d1e;
        color: #fff;
        transition: 0.3s;
        border-radius: 4px;
        box-shadow: 0px 2px 15px rgb(0 0 0 / 10%);
      }
  </style>
</head>

<body>

  @include('template.header')

  @yield('content')

  @include('template.footer')


  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('ninestar/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('ninestar/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('ninestar/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('ninestar/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('ninestar/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('ninestar/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('ninestar/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('ninestar/vendor/aos/aos.js') }}"></script>

  {{-- Sweet Alert 2 --}}
  <script src="{{ asset('argon-login/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>


  <!-- Template Main JS File -->
  <script src="{{ asset('ninestar/js/main.js') }}"></script>


@if (session('success'))
<script>
    Swal.fire(
        'Borang berhasil diajukan',
        'Borang ruangan telah berhasil diajukan, Silahkan hubungi dosen yang bersangkutan untuk melakukan approval',
        'success'
    )
</script>
@endif

</body>

</html>
