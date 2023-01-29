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
            @if (isset($dataBanner1))
            <div class="carousel-item active">
                <img src="{{ url('storage/banner/'.$dataBanner->foto) }}" class="d-block w-100" alt="...">
            </div>
            @else
            Data Banner 1 Belum Di Upload !
            @endif
            <div class="carousel-item">
                @if (isset($dataBanner2))
                <img src="{{ url('storage/banner/'.$dataBanner2->foto) }}" class="d-block w-100" alt="...">
                @else
                Data Banner 2 Belum Di Upload !
                @endif
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
<form id="orderMakanan" action="{{ route('pelanggan.store') }}" method="POST">
    @csrf
    @if (isset($foods))
    <div class="row mb-3">
        <div class="col-md-12">
            <h5 class="title text-center">
                <span class="fas fa-hamburger btn btn-danger mb-2"></span>
                <br>
                Menu
            </h5>
        </div>
    </div>
    <hr class="my-3">
    <div class="row">
        <!-- start loop -->
        @foreach ($categories as $categories)
        <div class="col-md-12">
            <p>
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                    <span class="fas fa-eye"></span>
                    {{ $categories-> name}}
                </a>
            </p>
            <div class="collapse multi-collapse" id="multiCollapseExample1">
                <div class="card card-body">
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
                                @if ($item->status != 'Tidak Tersedia')
                                @if ($categories->name)
                                <tr>
                                    <td>
                                        <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                        <input type="number" value="0" name="qty[]" id="" class="form-control">
                                        <select hidden name="status" class="form-control">
                                            <option selected value="0">Menunggu Konfirmasi</option>
                                        </select>
                                        <input type="hidden" name="no_meja" value="{{ $tables->no_meja }}">
                                        <input type="hidden" name="tables[]" value="{{ $tables->no_meja }}">
                                    </td>
                                    <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                    <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                </tr>
                                @endif
                                @else
                                Produk Tidak Tersedia
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End loop -->
        @endforeach
    </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-md-12">
            <h5 class="title text-center">
                <span class="fas fa-coffee btn btn-danger mb-2"></span><br>
                Menu Minuman
            </h5>
        </div>
    </div>
    <hr class="my-3">
    <div class="row" style="margin-bottom: 350px;">
        <div class="col-md-12">
            <p>
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse" href="#multiCollapseExample6" role="button" aria-expanded="false" aria-controls="multiCollapseExample6">
                    <span class="fas fa-eye"></span>
                    Minuman Cappuccino
                </a>
            </p>
            <div class="collapse multi-collapse" id="multiCollapseExample6">
                <div class="card card-body">
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
                                @if ($item->status != 'Tidak Tersedia')
                                @if ($item->categories->name == "Cappuccino")
                                <tr>
                                    <td>
                                        <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                        {{-- <input type="hidden" class="form-control" name="tables[]" value="{{ $tables->no_meja }}"> --}}
                                        <input type="hidden" class="form-control" name="no_meja" value="{{ $tables->no_meja }}">
                                        <input type="number" value="0" name="qty[]" id="" class="form-control">
                                        <select hidden name="status" class="form-control">
                                            <option selected value="0">Menunggu Konfirmasi</option>
                                        </select>
                                        <input type="hidden" name="no_meja" value="{{ $tables->no_meja }}">
                                        <input type="hidden" name="tables[]" value="{{ $tables->no_meja }}">
                                    </td>
                                    <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                    <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                </tr>
                                @endif
                                @else
                                Produk Tidak Tersedia
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <p>
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse" href="#multiCollapseExample7" role="button" aria-expanded="false" aria-controls="multiCollapseExample7">
                    <span class="fas fa-eye"></span>
                    Minuman Teh
                </a>
            </p>
            <div class="collapse multi-collapse" id="multiCollapseExample7">
                <div class="card card-body">
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
                                @if ($item->status != 'Tidak Tersedia')
                                @if ($item->categories->name == "Teh")
                                <tr>
                                    <td>
                                        <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                        {{-- <input type="hidden" class="form-control" name="tables[]" value="{{ $tables->no_meja }}"> --}}
                                        <input type="hidden" class="form-control" name="no_meja" value="{{ $tables->no_meja }}">
                                        <input type="number" value="0" name="qty[]" id="" class="form-control">
                                        <select hidden name="status" class="form-control">
                                            <option selected value="0">Menunggu Konfirmasi</option>
                                        </select>
                                        <input type="hidden" name="no_meja" value="{{ $tables->no_meja }}">
                                        <input type="hidden" name="tables[]" value="{{ $tables->no_meja }}">
                                    </td>
                                    <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                    <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                </tr>
                                @endif
                                @else
                                Produk Tidak Tersedia
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <p>
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse" href="#multiCollapseExample8" role="button" aria-expanded="false" aria-controls="multiCollapseExample8">
                    <span class="fas fa-eye"></span>
                    Minuman Kupi
                </a>
            </p>
            <div class="collapse multi-collapse" id="multiCollapseExample8">
                <div class="card card-body">
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
                                @if ($item->status != 'Tidak Tersedia')
                                @if ($item->categories->name == "Kupi")
                                <tr>
                                    <td>
                                        <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                        {{-- <input type="hidden" class="form-control" name="tables[]" value="{{ $tables->no_meja }}"> --}}
                                        <input type="hidden" class="form-control" name="no_meja" value="{{ $tables->no_meja }}">
                                        <input type="number" value="0" name="qty[]" id="" class="form-control">
                                        <select hidden name="status" class="form-control">
                                            <option selected value="0">Menunggu Konfirmasi</option>
                                        </select>
                                        <input type="hidden" name="no_meja" value="{{ $tables->no_meja }}">
                                        <input type="hidden" name="tables[]" value="{{ $tables->no_meja }}">
                                    </td>
                                    <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                    <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                </tr>
                                @endif
                                @else
                                Produk Tidak Tersedia
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <p>
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse" href="#multiCollapseExample9" role="button" aria-expanded="false" aria-controls="multiCollapseExample9">
                    <span class="fas fa-eye"></span>
                    Minuman Jeruk
                </a>
            </p>
            <div class="collapse multi-collapse" id="multiCollapseExample9">
                <div class="card card-body">
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
                                @if ($item->status != 'Tidak Tersedia')
                                @if ($item->categories->name == "Jeruk")
                                <tr>
                                    <td>
                                        <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                        {{-- <input type="hidden" class="form-control" name="tables[]" value="{{ $tables->no_meja }}"> --}}
                                        <input type="hidden" class="form-control" name="no_meja" value="{{ $tables->no_meja }}">
                                        <input type="number" value="0" name="qty[]" id="" class="form-control">
                                        <select hidden name="status" class="form-control">
                                            <option selected value="0">Menunggu Konfirmasi</option>
                                        </select>
                                        <input type="hidden" name="no_meja" value="{{ $tables->no_meja }}">
                                        <input type="hidden" name="tables[]" value="{{ $tables->no_meja }}">
                                    </td>
                                    <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                    <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                </tr>
                                @endif
                                @else
                                Produk Tidak Tersedia
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <p>
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse" href="#multiCollapseExample10" role="button" aria-expanded="false" aria-controls="multiCollapseExample10">
                    <span class="fas fa-eye"></span>
                    Minuman Coklat
                </a>
            </p>
            <div class="collapse multi-collapse" id="multiCollapseExample10">
                <div class="card card-body">
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
                                @if ($item->status != 'Tidak Tersedia')
                                @if ($item->categories->name == "Coklat")
                                <tr>
                                    <td>
                                        <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                        {{-- <input type="hidden" class="form-control" name="tables[]" value="{{ $tables->no_meja }}"> --}}
                                        <input type="hidden" class="form-control" name="no_meja" value="{{ $tables->no_meja }}">
                                        <input type="number" value="0" name="qty[]" id="" class="form-control">
                                        <select hidden name="status" class="form-control">
                                            <option selected value="0">Menunggu Konfirmasi</option>
                                        </select>
                                        <input type="hidden" name="no_meja" value="{{ $tables->no_meja }}">
                                        <input type="hidden" name="tables[]" value="{{ $tables->no_meja }}">
                                    </td>
                                    <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                    <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                </tr>
                                @endif
                                @else
                                Produk Tidak Tersedia
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <p>
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse" href="#multiCollapseExample11" role="button" aria-expanded="false" aria-controls="multiCollapseExample11">
                    <span class="fas fa-eye"></span>
                    Minuman Susu
                </a>
            </p>
            <div class="collapse multi-collapse" id="multiCollapseExample11">
                <div class="card card-body">
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
                                @if ($item->status != 'Tidak Tersedia')
                                @if ($item->categories->name == "Susu")
                                <tr>
                                    <td>
                                        <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                        {{-- <input type="hidden" class="form-control" name="tables[]" value="{{ $tables->no_meja }}"> --}}
                                        <input type="hidden" class="form-control" name="no_meja" value="{{ $tables->no_meja }}">
                                        <input type="number" value="0" name="qty[]" id="" class="form-control">
                                        <select hidden name="status" class="form-control">
                                            <option selected value="0">Menunggu Konfirmasi</option>
                                        </select>
                                        <input type="hidden" name="no_meja" value="{{ $tables->no_meja }}">
                                        <input type="hidden" name="tables[]" value="{{ $tables->no_meja }}">
                                    </td>
                                    <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                    <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                </tr>
                                @endif
                                @else
                                Produk Tidak Tersedia
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <p>
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse" href="#multiCollapseExample12" role="button" aria-expanded="false" aria-controls="multiCollapseExample12">
                    <span class="fas fa-eye"></span>
                    Minuman Segar
                </a>
            </p>
            <div class="collapse multi-collapse" id="multiCollapseExample12">
                <div class="card card-body">
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
                                @if ($item->status != 'Tidak Tersedia')
                                @if ($item->categories->name == "Minuman Segar")
                                <tr>
                                    <td>
                                        <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                        {{-- <input type="hidden" class="form-control" name="tables[]" value="{{ $tables->no_meja }}"> --}}
                                        <input type="hidden" class="form-control" name="no_meja" value="{{ $tables->no_meja }}">
                                        <input type="number" value="0" name="qty[]" id="" class="form-control">
                                        <select hidden name="status" class="form-control">
                                            <option selected value="0">Menunggu Konfirmasi</option>
                                        </select>
                                        <input type="hidden" name="no_meja" value="{{ $tables->no_meja }}">
                                        <input type="hidden" name="tables[]" value="{{ $tables->no_meja }}">
                                    </td>
                                    <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                    <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                </tr>
                                @endif
                                @else
                                Produk Tidak Tersedia
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <p>
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse" href="#multiCollapseExample13" role="button" aria-expanded="false" aria-controls="multiCollapseExample13">
                    <span class="fas fa-eye"></span>
                    Minuman Lainnye
                </a>
            </p>
            <div class="collapse multi-collapse" id="multiCollapseExample13">
                <div class="card card-body">
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
                                @if ($item->status != 'Tidak Tersedia')
                                @if ($item->categories->name == "Minuman Lainnye")
                                <tr>
                                    <td>
                                        <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                        {{-- <input type="hidden" class="form-control" name="tables[]" value="{{ $tables->no_meja }}"> --}}
                                        <input type="hidden" class="form-control" name="no_meja" value="{{ $tables->no_meja }}">
                                        <input type="number" value="0" name="qty[]" id="" class="form-control">
                                        <select hidden name="status" class="form-control">
                                            <option selected value="0">Menunggu Konfirmasi</option>
                                        </select>
                                        <input type="hidden" name="no_meja" value="{{ $tables->no_meja }}">
                                        <input type="hidden" name="tables[]" value="{{ $tables->no_meja }}">
                                    </td>
                                    <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                    <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                </tr>
                                @endif
                                @else
                                Produk Tidak Tersedia
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif



    @endsection

    @section('tabsMenu')
    <div class="fixed-bottom bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="background-color: #fff;">
                    <div class="form-group mb-3 bg-warning text-center">
                        <label for="name">Nama Pemesan</label>
                        <input autofocus type="text" class="form-control" name="name" placeholder="Isi Nama Pemesan">
                        <span class="text-danger error-text name_error"></span>
                    </div>
                </div>
                <div class="col-md-12 mb-3" style="background-color: #fff;">
                    <button type="submit" class="btn btn-danger btn-block">
                        <i class="fa fa-gift"></i>
                        Pesan Sekarang
                    </button>
                </div>
</form>
<div class="tab">
    @if (isset($tables))
    <li class="tab-item different">
        <a href="{{ route('pelanggan.status_orderan', $tables->no_meja) }}" class="item-link" onclick="select(this)" href="/">
            <i class="fa fa-home"></i>
            Orderan Saya
        </a>
    </li>
    <li class="tab-item">
        <a href="{{ route('pelanggan.meja1', $tables->no_meja) }}" class="item-link" onclick="select(this)" href="/">
            <i class="fa fa-cutlery"></i>
            Menu
        </a>
    </li>
    @else

    @endif
</div>
</div>
</div>
</div>
@endsection

@section('footer-scripts')
@include('frontend.order.scripts')
@endsection