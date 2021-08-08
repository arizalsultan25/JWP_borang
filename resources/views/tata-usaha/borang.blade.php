@extends('tata-usaha.template.app', [
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
                        <a href="{{ route('tu-index') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tu-borang') }}">Borang Ruangan</a>
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
                                                @if ($borang->status_peminjaman == 'menunggu konfirmasi TU')
                                                <span class="badge badge-pill badge-warning">{{ $borang->status_peminjaman }}</span>
                                                @elseif ($borang->status_peminjaman == 'booked')
                                                <span class="badge badge-pill badge-primary">{{ $borang->status_peminjaman }}</span>
                                                @elseif ($borang->status_peminjaman == 'sedang digunakan')
                                                <span class="badge badge-pill badge-danger">{{ $borang->status_peminjaman }}</span>
                                                @else
                                                <span class="badge badge-pill badge-success">{{ $borang->status_peminjaman }}</span>
                                                @endif

                                            </td>
                                            <td>
                                                @if ($borang->status_peminjaman == 'menunggu konfirmasi TU')
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalKonfirmasi{{ $borang->id }}">Konfirmasi peminjaman</button>

                                                <!-- Modal Konfirmasi -->
                                                <div class="modal fade" id="modalKonfirmasi{{ $borang->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><i class="fa fa-question-circle text-warning" aria-hidden="true"></i> Konfirmasi Peminjaman {{ $borang->nama_kegiatan }}</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah anda ingin mengkonfirmasi Peminjaman ruangan <span class="text-primary">{{ $borang->kode_ruangan }}</span> pada <span class="text-primary">{{ date('d M Y (H:i)', strtotime($borang->waktu_mulai)) }}</span> hingga <span class="text-primary">{{ date('d M Y (H:i)', strtotime($borang->waktu_selesai)) }}</span> ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('borang.update', $borang->id) }}" method="post">
                                                                @method('PUT')
                                                                @csrf
                                                                <input type="hidden" name="status" value="rejected">
                                                                    <button type="submit" class="btn btn-danger"><i class="far fa-times-circle" aria-hidden="true"></i> Tolak</button>
                                                            </form>

                                                            <form action="{{ route('borang.update', $borang->id) }}" method="post">
                                                                @method('PUT')
                                                                @csrf
                                                                <input type="hidden" name="status" value="approved">
                                                                <button type="submit" class="btn btn-success"><i class="far fa-check-circle" aria-hidden="true"></i> Setuju</button>
                                                            </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @elseif ($borang->status_peminjaman == 'booked')
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalPinjam{{ $borang->id }}">Pinjamkan Ruangan</button>

                                                <!-- Modal Pinjamkan -->
                                                <div class="modal fade" id="modalPinjam{{ $borang->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><i class="fa fa-question-circle text-success" aria-hidden="true"></i> Konfirmasi Peminjaman {{ $borang->nama_kegiatan }}</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                            <div class="modal-body">
                                                               Apakah anda ingin meminjamkan ruangan {{ $borang->kode_ruangan }}  ? <br>
                                                                <span class="text-danger">Ketika sedang dipinjamkan, status ruangan akan berubah menjadi 'sedang digunakan'</span>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i> Close</button>

                                                            <form action="{{ route('borang.update', $borang->id) }}" method="post">
                                                                @method('PUT')
                                                                @csrf
                                                                <input type="hidden" name="status" value="pinjamkan">
                                                                <button type="submit" class="btn btn-success"><i class="far fa-check-circle" aria-hidden="true"></i> Pinjamkan</button>
                                                            </form>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                @elseif ($borang->status_peminjaman == 'sedang digunakan')
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalKembali{{ $borang->id }}">Konfirmasi Pengembalian</button>

                                                <!-- Modal Pinjamkan -->
                                                <div class="modal fade" id="modalKembali{{ $borang->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><i class="fa fa-question-circle text-success" aria-hidden="true"></i> Konfirmasi Pengembalian {{ $borang->nama_kegiatan }}</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                            <div class="modal-body">
                                                               Apakah anda ingin mengkonfirmasi pengembalian ruangan {{ $borang->kode_ruangan }}  ? <br>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i> Close</button>

                                                            <form action="{{ route('borang.update', $borang->id) }}" method="post">
                                                                @method('PUT')
                                                                @csrf
                                                                <input type="hidden" name="status" value="kembalikan">
                                                                <button type="submit" class="btn btn-success"><i class="far fa-check-circle" aria-hidden="true"></i> Konfirmasi Pengembalian</button>
                                                            </form>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
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
