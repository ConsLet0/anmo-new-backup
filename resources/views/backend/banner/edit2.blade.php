@extends('layouts.backend')

@section('title')
    Edit Banner Promo 2
@endsection

@section('pageTitle')
    Edit Banner Promo 2
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-warning">
                <h5>
                    Edit Banner Promo 2
                </h5>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{ route('banner2.update',$dataBanner2->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input value="{{ $dataBanner2->name }}" type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama Banner !">
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror">
                        <input type="hidden" name="tmpBanner" value="{{ $dataBanner2->foto }}">
                        @error('foto')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                        <span class="text-danger">Kosongkan Jika Tidak Ingin Merubah Gambar <!DOCTYPE html>
                        <br>
                        @if ($dataBanner2->foto)
                            <img src="{{ url('storage/banner/'.$dataBanner2->foto) }}" alt="Gambar Promo" width="80px">
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning btn-block">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
