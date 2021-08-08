@extends('tata-usaha.template.app', [
    'active' => 'ruangan'
])

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Form Edit Ruangan</h4>
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
                        <a href="{{ route('tu-ruangan') }}">Data Ruangan</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a>Ruangan {{ $ruangan->nama_ruangan }}</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Ruangan {{ $ruangan->nama_ruangan }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('ruangan.update', $ruangan->kode) }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                            <div class="row">
                                <div class="col-sm-12 col-6 col-md-6">
                                    <div class="form-group @error('kode')
                                    has-error
                                @enderror">
                                      <label for="kode">Kode Ruangan</label>
                                      <input type="text" name="kode" id="kode" value="{{ $ruangan->kode }}" class="form-control" placeholder="Kode Ruangan" aria-describedby="">
                                      @error('kode')
                                            <small class="text-danger mt-2 ml-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12 col-6 col-md-6">
                                    <div class="form-group @error('nama_ruangan')
                                    has-error
                                @enderror">
                                      <label for="nama_ruangan">Nama Ruangan</label>
                                      <input type="text" name="nama_ruangan" value="{{ $ruangan->nama_ruangan }}" id="nama_ruangan" class="form-control" placeholder="Nama Ruangan" aria-describedby="">
                                      @error('nama_ruangan')
                                            <small class="text-danger mt-2 ml-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12 col-4 col-md-4">
                                    <div class="form-group @error('jenis')
                                    has-error
                                @enderror">
                                        <label for="jenis">Jenis</label>
                                        <select name="jenis" id="jenis" class="form-control">
                                            <option value="kelas" {{ $ruangan->jenis == 'kelas' ? 'selected' : null }}>Kelas</option>
                                            <option value="lab" {{ $ruangan->jenis == 'lab' ? 'selected' : null }}>Labolatorium</option>
                                        </select>
                                        @error('jenis')
                                            <small class="text-danger mt-2 ml-2">{{ $message }}</small>
                                        @enderror
                                      </div>
                                </div>

                                <div class="col-sm-12 col-4 col-md-4">
                                    <div class="form-group @error('daya_tampung')
                                    has-error
                                @enderror">
                                        <label for="daya_tampung">Daya Tampung</label>
                                        <div class="input-group mb-3">
                                            <input type="number" value="{{ $ruangan->daya_tampung }}" class="form-control"  name="daya_tampung" placeholder="Daya Tampung" aria-label="Daya Tampung"  aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">Orang</span>
                                            </div>
                                        </div>
                                        @error('daya_tampung')
                                            <small class="text-danger mt-2 ml-2">{{ $message }}</small>
                                        @enderror
                                      </div>
                                </div>

                                <div class="col-sm-12 col-4 col-md-4">
                                    <div class="form-group">
                                      <label for="gambar">Foto</label>
                                      <input type="file" class="form-control-file" name="gambar" id="gambar" placeholder="Gambar" accept="image/*" aria-describedby="fileHelpId">
                                      <small id="fileHelpId" class="form-text text-muted">Format foto adalah (.jpg, .png, .gif, .jpeg)</small>
                                      @error('gambar')
                                            <small class="text-danger mt-2 ml-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12 col-6 col-md-6">
                                    <div class="form-group @error('fasilitas')
                                    has-error
                                @enderror">
                                      <label for="fasilitas">Fasilitas</label>
                                      <textarea class="summernote" name="fasilitas" id="fasilitas" rows="3">{{ $ruangan->fasilitas }}</textarea>
                                      @error('fasilitas')
                                            <small class="text-danger mt-2 ml-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12 col-6 col-md-6">
                                    <div class="form-group @error('keterangan')
                                    has-error
                                @enderror">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="summernote" name="keterangan" id="keterangan" rows="3">{!! $ruangan->keterangan !!}</textarea>
                                        @error('keterangan')
                                            <small class="text-danger mt-2 ml-2">{{ $message }}</small>
                                        @enderror
                                      </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-edit" aria-hidden="true"></i> Update data</button>
                        </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
