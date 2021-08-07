@extends('tata-usaha.template.app', [
    'active' => 'ruangan'
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
                            <div class="row">
                                <div class="col-md-10 col-10 col-sm-8">
                                    <h4 class="card-title">Data Borang</h4>

                                </div>
                                <div class="col-md-2 col-2 col-sm-4">
                                    <a href="http://" class="btn btn-tool text-success"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah kelas</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php $no = 1 ?>
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Ruangan</th>
                                            <th>Nama Ruang</th>
                                            <th>Jenis</th>
                                            <th>Daya Tampung</th>
                                            <th>Gambar</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Ruangan</th>
                                            <th>Nama Ruang</th>
                                            <th>Jenis</th>
                                            <th>Daya Tampung</th>
                                            <th>Gambar</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        @foreach ($data_ruangan as $ruang)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $ruang->kode }}</td>
                                            <td>{{ $ruang->nama_ruangan }}</td>
                                            <td>
                                                @if ($ruang->jenis == 'kelas')
                                                    <span class="badge badge-pill badge-primary">Kelas</span>
                                                @else
                                                    <span class="badge badge-pill badge-success">Labolatorium</span>
                                                @endif
                                            </td>
                                            <td>{{ $ruang->daya_tampung }} Orang</td>
                                            <td>
                                                <img src="{{ asset('gambar/'. $ruang->gambar) }}" alt="gambar ruangan" style="width: 100px; height: 100px; object-fit: cover">
                                            </td>
                                            <td>
                                                @if ($ruang->status == 'available')
                                                <span class="badge badge-pill badge-success">{{ $ruang->status }}</span>
                                                @elseif ($ruang->status == 'used')
                                                <span class="badge badge-pill badge-danger">{{ $ruang->status }}</span>
                                                @else
                                                <span class="badge badge-pill badge-warning">{{ $ruang->status }}</span>
                                                @endif

                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="">
                                                    <button type="button" class="btn btn-link">
                                                        <i class="fas fa-edit text-warning   "></i>
                                                    </button>
                                                    <button type="button" class="btn btn-link">
                                                        <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                                    </button>
                                                </div>
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
