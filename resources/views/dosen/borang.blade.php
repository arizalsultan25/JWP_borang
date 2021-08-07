@extends('dosen.template.app', [
    'active' => 'borang'
])

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Borang Ruangan</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('dosen-index') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dosen-borang') }}">Borang Ruangan</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Borang</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php $no = 1 ?>
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Ruangan</th>
                                            <th>Agenda</th>
                                            <th>Peminjam</th>
                                            <th>NIM Peminjam</th>
                                            <th>Mulai</th>
                                            <th>Selesai</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Ruangan</th>
                                            <th>Agenda</th>
                                            <th>Peminjam</th>
                                            <th>NIM Peminjam</th>
                                            <th>Mulai</th>
                                            <th>Selesai</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        @foreach ($data_borang as $borang)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>Ruangan {{ $borang->kode_ruangan }}</td>
                                            <td>{{ $borang->nama_kegiatan }}</td>
                                            <td>{{ $borang->nama_mahasiswa }}</td>
                                            <td>{{ $borang->nim }}</td>
                                            <td>{{ date('d M Y (H:i)', strtotime($borang->waktu_mulai)) }}</td>
                                            <td>{{ date('d M Y (H:i)', strtotime($borang->waktu_selesai)) }}</td>
                                            <td>
                                                @if ($borang->status_peminjaman == 'menunggu persetujuan dosen')
                                                <span class="badge badge-pill badge-warning">{{ $borang->status_peminjaman }}</span>
                                                @else
                                                <span class="badge badge-pill badge-primary">{{ $borang->status_peminjaman }}</span>
                                                @endif

                                            </td>
                                            <td>
                                                @if ($borang->status_peminjaman == 'menunggu persetujuan dosen')
                                                <form action="{{ route('dosen-borang') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $borang->id }}">
                                                <button type="submit" class="btn btn-primary">Konfirmasi peminjaman</button>
                                                 </form>
                                                @else
                                                 -
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
