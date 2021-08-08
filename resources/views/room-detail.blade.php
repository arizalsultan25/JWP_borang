@extends('template.app')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Daftar Ruangan</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('ruangan.index') }}">Ruangan</a></li>
                    <li>Ruangan {{ $room->kode }}</li>
                </ol>
            </div>

        </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section class="portfolio-details">
        <div class="container">
            {{-- @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" style="padding-top: 15px; padding-bottom: 25px" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>

                    <h3><strong><i class="fas fa-check-double"></i> Borang berhasil diajukan</strong></h3>
                    {{ session('success') }}
                </div>
            @endif --}}

            <div class="portfolio-details-container">

                <div class="owl-carousel portfolio-details-carousel">
                    <img src="{{ asset('gambar/'.$room->gambar) }}" class="img-fluid" alt="">
                </div>

                <div class="portfolio-info">
                    <h3>Informasi Ruangan</h3>
                    <ul>
                        <li><strong>Kode Ruangan</strong>: {{ $room->kode }}</li>
                        <li><strong>Nama Ruangan</strong>: {{ $room->nama_ruangan }}</li>
                        <li><strong>Jenis</strong>: {{ Str::ucfirst($room->jenis) }}</li>
                        <li><strong>Daya Tampung</strong>: {{ $room->daya_tampung }} Orang</li>
                        <li><strong>Fasilitas</strong>: {{ $room->fasilitas }}</li>
                        <li><strong>Status</strong>:
                            @if ($room->status == 'available')
                            <span class="badge badge-success">Available</span>
                            @else
                            <span class="badge badge-danger">Booked</span>
                            @endif
                        </li>
                    </ul>

                    @if ($room->status == 'available')
                        <br>
                        <button class="btn btn-success btn-block" style="background-color: #EB5D1E; border: solid 1px #EB5D1E" data-toggle="modal" data-target="#modalForm"><i class='bx bx-calendar-plus'></i> Borang Ruangan</button>
                    @elseif($room->status == 'booked')
                    <?php
                    $borang = DB::table('bookings')->where('kode_ruangan', '=', $room->kode)->where('status_peminjaman', '=', 'booked')->first();
                    ?>

                        <div class="alert alert-info" role="alert">
                            <strong><h4><i class="fa fa-info-circle" aria-hidden="true"></i> info</h4></strong>
                            <p>
                                Ruangan telah diborang oleh : <br>
                                <strong>{{ $borang->nama_mahasiswa }}</strong> <br>
                                dari <strong>{{ date('d M Y (H:i)', strtotime($borang->waktu_mulai)) }}</strong> hingga <strong>{{ date('d M Y (H:i)', strtotime($borang->waktu_selesai)) }}</strong>
                            </p>
                        </div>
                    @else
                    <?php
                    $borang = DB::table('bookings')->where('kode_ruangan', '=', $room->kode)->where('status_peminjaman', '=', 'sedang digunakan')->first();
                    ?>

                        <div class="alert alert-warning" role="alert">
                            <strong><h4><i class="fa fa-info-circle" aria-hidden="true"></i> info</h4></strong>
                            <p>
                                Ruangan sedang digunakan untuk : <br>
                                <strong>{{ $borang->nama_kegiatan }}</strong> <br>
                                dari <strong>{{ date('d M Y (H:i)', strtotime($borang->waktu_mulai)) }}</strong> hingga <strong>{{ date('d M Y (H:i)', strtotime($borang->waktu_selesai)) }}</strong>
                            </p>
                        </div>
                    @endif
                </div>

            </div>

            <div class="portfolio-description" style="margin-top: 45px">
                <h2>Ruangan {{ $room->nama_ruangan }}</h2>
                {!! $room->keterangan !!}
            </div>


            <!-- Modal -->
            <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #EB5D1E; color: white">
                            <h5 class="modal-title"><i class='bx bx-detail'></i> Form Borang Ruangan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form action="{{ route('borang.store') }}" method="post">
                        <div class="modal-body">
                            @csrf
                                <input type="hidden" name="kode_ruangan" value="{{ $room->kode }}">

                            <div class="form-group">
                              <label for="nama_kegiatan">Nama Kegiatan <span class="text-danger">*</span></label>
                              <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" required placeholder="Nama Kegiatan" aria-describedby="">
                            </div>

                            <div class="form-group">
                              <label for="deskripsi">Deskripsi Kegiatan <span class="text-danger">*</span></label>
                              <textarea placeholder="Deskripsi kegiatan..." class="form-control" name="deskripsi" required id="deskripsi" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                              <label for="nama_mahasiswa">Nama Mahasiswa <span class="text-danger">*</span></label>
                              <input type="text" name="nama_mahasiswa" class="form-control" placeholder="Nama mahasiswa" required>
                            </div>

                            <div class="form-group">
                                <label for="nim">NIM Mahasiswa <span class="text-danger">*</span></label>
                                <input type="text" name="nim" maxlength="10" class="form-control" placeholder="NIM mahasiswa" required>
                              </div>

                            <div class="form-group">
                                <label for="email_dosen">Dosen Penanggung Jawab <span class="text-danger">*</span></label>
                                <select class="custom-select" name="email_dosen" id="email_dosen" required>
                                    <option selected>Pilih Dosen</option>
                                    @foreach ($semua_dosen as $dosen)
                                        <option value="{{ $dosen->email }}">{{ $dosen->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="waktu_mulai">Waktu Mulai <span class="text-danger">*</span></label>
                                        <input type="datetime-local"
                                          class="form-control" min="{{ date('Y-m-d') }}" name="waktu_mulai" id="waktu_mulai" aria-describedby="" placeholder="waktu mulai">
                                      </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="waktu_selesai">Waktu Selesai <span class="text-danger">*</span></label>
                                        <input type="datetime-local"
                                          class="form-control" name="waktu_selesai" id="waktu_selesai" aria-describedby="" placeholder="waktu selesai">
                                      </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class='bx bx-x-circle'></i> Close</button>
                            <button type="submit" class="btn btn-primary" style="background-color: #EB5D1E; border: solid 1px #EB5D1E"><i class='bx bx-calendar-check'></i> Borang</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->



@endsection
