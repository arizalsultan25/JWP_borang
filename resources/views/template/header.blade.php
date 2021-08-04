<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container-fluid d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="{{ route('home') }}"><span>BorangKuy</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="ninestar/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('room-list') }}">Ruangan</a></li>

          @auth
              <li><a href="{{ route('room-list') }}">Log out</a></li>
              @if (Auth::user()->role == 'tu')
                  <li class="get-started"><a href="{{ route('tu-index') }}">Dashboard</a></li>
              @else
                  <li class="get-started"><a href="{{ route('dosen-index') }}">Dashboard</a></li>
              @endif
          @else
              <li class="get-started"><a href="{{ route('login') }}">Masuk</a></li>
          @endauth
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
