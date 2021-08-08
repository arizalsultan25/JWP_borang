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
                                    <a href="{{ route('tu-create-ruangan') }}" class="btn btn-tool text-success"><i class="fa fa-plus-circle"
                                            aria-hidden="true"></i> Tambah kelas</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php $no = 1 ?>
                                <table id="basic-datatables" class="display table table-striped table-hover">
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
                                                <a href="{{ asset('gambar/'. $ruang->gambar) }}" target="_blank" rel="noopener noreferrer">
                                                <img src="{{ asset('gambar/'. $ruang->gambar) }}" alt="gambar ruangan"
                                                    style="width: 100px; height: 100px; object-fit: cover">
                                                </a>
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
                                                    <a href="{{ route('tu-edit-ruangan', $ruang->kode) }}" class="btn btn-link">
                                                        <i class="fas fa-edit text-warning   "></i>
                                                    </a>
                                                    <button type="button" class="btn btn-link" data-toggle="modal"
                                                        data-target="#modalDelete{{$ruang->kode}}">
                                                        <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>


                                        <!-- Modal Hapus-->
                                        <div class="modal fade" id="modalDelete{{$ruang->kode}}" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">


                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"><i class="fa fa-trash text-danger"
                                                                aria-hidden="true"></i> Konfirmasi Hapus Ruangan
                                                            {{$ruang->kode}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('ruangan.destroy', $ruang->kode) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            Apakah anda yakin ingin menghapus ruangan <span
                                                                class="badge badge-pill badge-warning">{{$ruang->kode}}</span>
                                                            ?
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal"><i class="far fa-times-circle"
                                                                aria-hidden="true"></i> Close</button>
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fa fa-trash" aria-hidden="true"></i>
                                                            Delete</button>
                                                    </div>
                                                </form>

                                                </div>

                                            </div>
                                        </div>


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
