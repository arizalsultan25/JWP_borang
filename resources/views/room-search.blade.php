@extends('template.app')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Cari Ruangan</h2>
          <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('ruangan.index') }}">Ruangan</a></li>
            <li>Cari Ruangan</li>
          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

          <div class="section-title" data-aos="fade-up">
            <p>Ruangan</p>
          </div>

          <div id="footer" class="mb-4">
            <div class="footer-newsletter" data-aos="fade-up">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h2>Hasil pencarian dengan kata kunci '<span style="color: #EB5D1E">{{ $keyword }}</span>'</h2>
                        <form action="{{ route('search') }}" method="GET">
                            {{-- @csrf --}}
                          <input type="text" placeholder="Cari ruangan..." style="border: 0; padding: 4px 4px; width: calc(100% - 100px);" name="s"><input type="submit" value="Cari">
                        </form>
                    </div>
                  </div>
                </div>
              </div>
          </div>


          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

            @foreach ($rooms as $room)
            <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $room->jenis }}">
                <div class="portfolio-wrap">
                  <img src="{{ asset('gambar/'.$room->gambar) }}" class="img-fluid" style="display: flex; height: 250px; width: 100%; object-fit: cover"  alt="">
                  <div class="portfolio-links">
                    <a href="gambar/{{ $room->gambar }}" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="icofont-plus-circle"></i></a>
                    <a href="{{ route('ruangan.show', $room->kode) }}" title="More Details"><i class="icofont-link"></i></a>
                  </div>
                  <div class="portfolio-info">
                    <h4>{{ $room->kode }}</h4>
                    {{-- <p>{{ $room->nama_ruangan }}</p> --}}
                    @if ($room->status == 'available')

                    <span class="badge badge-pill badge-success mb-4">Available</span>
                    @elseif($room->status == 'booked')
                    <?php
                        $borang = DB::table('bookings')->where('kode_ruangan', '=', $room->kode)->where('status_peminjaman', '=', 'booked')->first();
                    ?>

                    <span class="text-white mb-4" style="margin-top: 10px">Telah diborang mulai </span><br>
                    <p class="text-white">
                    <span class="badge badge-pill badge-warning">{{ date('d M Y (H:i)', strtotime($borang->waktu_mulai)) }}</span> - <span class="badge badge-pill badge-warning">{{ date('d M Y (H:i)', strtotime($borang->waktu_selesai)) }}</span>
                    </p>
                    @else
                    <span class="badge badge-pill badge-danger mb-4">Sedang digunakan</span>

                    @endif
                  </div>
                </div>
              </div>
            @endforeach

          </div>

        </div>
      </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

@endsection
