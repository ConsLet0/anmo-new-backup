@extends('layouts.backend')

@section('title')
    Makanan
@endsection

@section('pageTitle')
    Data Menu Makanan
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="title">Filter By Kategori</h4>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary float-md-right" data-toggle="modal" data-target="#modalAddMakanan">
                            <i class="fas fa-plus"></i>
                            Tambah Makanan / Minuman
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success">Pilih Kategori</button>
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="{{ route('makanan') }}">Semua</a>
                                @foreach ($categories as $item)
                                    <a class="dropdown-item" href="{{ url('kategori-makanan/' . $item->slug) }}">{{ $item->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table id="table_makanan" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Makanan</th>
                                    <th>Foto</th>
                                    <th>Harga Beli</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modalAddMakanan --}}
@include('backend.food.modalAddMakanan')
{{-- modalEditMakanan --}}
@include('backend.food.modalEditMakanan')

@endsection

@section('footer-scripts')
    @include('backend.food.scripts')
@endsection
