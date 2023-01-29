@extends('layouts.backend')

@section('title')
    Banner Promo
@endsection

@section('pageTitle')
    Banner Promo
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-warning">
                <h5>
                    Upload Banner 1
                </h5>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{ route('banner.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama Banner !">
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                        @error('foto')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning btn-block">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-warning">
                <h5>Preview Banner 1</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                @if (isset($dataBanner))
                                    {{ $dataBanner->name }}
                                @else
                                    Data Belum Ada !
                                @endif
                            </td>
                            <td>
                                @if (isset($dataBanner->foto))
                                    <img src="{{ url('storage/banner/'.$dataBanner->foto) }}"
                                    alt="Gambar Banner Promo" width="90px">
                                @else
                                    Gambar Tidak Ada !
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    @if (isset($dataBanner))
                                        <a href="{{ url('update/banner-promo/'.$dataBanner->id) }}" class="btn btn-success btn-sm">
                                            Edit
                                        </a>
                                        <form onsubmit="return confirm('Yakin ingin menghapus banner ini !')" action="{{ route('banner.destroy', $dataBanner->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    @else
                                        Data Belum Tersedia !
                                    @endif
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-warning">
                <h5>
                    Upload Banner 2
                </h5>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{ route('banner2.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama Banner !">
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                        @error('foto')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning btn-block">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-warning">
                <h5>Preview Banner 2</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                @if (isset($dataBanner))
                                    {{ $dataBanner2->name }}
                                @else
                                    Data Belum Tersedia !
                                @endif
                            </td>
                            <td>
                                @if (isset($dataBanner2))
                                    <img src="{{ url('storage/banner/'.$dataBanner2->foto) }}"
                                    alt="Gambar Banner Promo" width="90px">
                                @else
                                    Gambar Tidak Ada !
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    @if (isset($dataBanner2))
                                        <a href="{{ url('update/banner-promo2/'.$dataBanner2->id) }}" class="btn btn-success btn-sm">
                                            Edit
                                        </a>
                                        <form onsubmit="return confirm('Yakin ingin menghapus banner ini !')" action="{{ route('banner2.destroy', $dataBanner2->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    @else
                                        Data Belum Tersedia
                                    @endif
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
