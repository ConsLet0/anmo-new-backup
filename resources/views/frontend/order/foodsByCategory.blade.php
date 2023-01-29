@extends('layouts.tables.meja')

@section('title')
    Meja 1
@endsection

@section('content')
<div class="row mb-3 text-center">
    <div class="col-md-12">
        <h4 class="text-uppercase">Pundok Kupi Anglo</h4>
    </div>
</div>
<div class="row mb-3">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('static/banner-promo/1.jpeg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('static/banner-promo/2.jpeg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        {{-- <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
        </button> --}}
            {{-- <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </button> --}}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p>
            <a class="btn-sm btn btn-warning" data-toggle="collapse"
                href="#multiCollapseExample1" role="button"
                aria-expanded="false" aria-controls="multiCollapseExample1">
                Pilih Kategori Menu
            </a>
        </p>
        <div class="row">
            <div class="col">
                <div class="collapse multi-collapse"
                    id="multiCollapseExample1">
                    <div class="card card-body">
                        <a href="{{ route('pelanggan.meja1', $tables->no_meja) }}">Semua</a>
                        @foreach ($categories as $item)
                            <a href="{{ url('kategori-makanan/' . $item->slug . '/' . $tables->no_meja) }}">{{ $item->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="orderMakanan" action="{{ route('pelanggan.store') }}" method="POST">
    @csrf
    @if (isset($foods))
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="tableMenuMakanan" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Pesan Berapa</th>
                            <th>Item</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($foods as $food => $item)
                            @if ($item->status != 'Sold Out')
                                <tr>
                                    <td>
                                        <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                        <input type="hidden" class="form-control" name="tables[]" value="{{ $tables->no_meja }}">
                                        <input type="hidden" class="form-control" name="no_meja" value="{{ $tables->no_meja }}">
                                        <input type="number" value="0" name="qty[]" id="" class="form-control">
                                        <select hidden name="status" class="form-control">
                                            <option selected value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                        </select>
                                    </td>
                                    <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                    <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                </tr>
                            @else

                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="form-group mb-3">
                <label for="name">Nama Pemesan</label>
                <input type="text" class="form-control" name="name" placeholder="Contoh: Udin">
                <span class="text-danger error-text name_error"></span>
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success btn-block">
                <i class="fa fa-gift"></i>
                Checkout Pesanan
            </button>
        </div>
    </div>
</form>
@endsection

@section('tabsMenu')
    <div class="fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="tab">
                    <li class="tab-item different">
                        <a href="{{ route('pelanggan.status_orderan', $tables->no_meja) }}" class="item-link"
                            onclick="select(this)" href="/">
                            <i class="fa fa-home"></i>
                            Orderan Saya
                        </a>
                    </li>
                    <li class="tab-item">
                        <a href="{{ route('pelanggan.meja1', $tables->no_meja) }}" class="item-link"
                            onclick="select(this)" href="/">
                            <i class="fa fa-cutlery"></i>
                            Menu
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    @include('frontend.order.scripts')
@endsection
