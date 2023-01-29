@extends('layouts.backend')

@section('title')
    Edit Banner Promo
@endsection

@section('pageTitle')
    Edit Banner Promo
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-warning">
                <h5>
                    Edit Banner Promo
                </h5>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{ route('banner.update',$dataBanner->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input value="{{ $dataBanner->name }}" type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama Banner !">
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                        <input type="hidden" name="tmpBanner" value="{{ $dataBanner->foto }}">
                        @error('foto')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <span class="text-danger">Kosongkan Jika Tidak Ingin Merubah Gambar <!DOCTYPE html>
                        <br>
                        @if ($dataBanner->foto)
                            <img src="{{ url('storage/banner/'.$dataBanner->foto) }}" alt="Gambar Promo" width="80px">
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
