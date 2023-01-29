@extends('layouts.backend')

@section('title')
    Tambah Orderan
@endsection

@section('pageTitle')
    Tambah Orderan
@endsection

@section('content')
<form id="orderMakanan" action="{{ route('orderan.storeOrderan') }}" method="POST">
    @csrf
    @if (isset($foods))
    <div class="row mb-3">
        <div class="col-md-12">
            <h5 class="title text-center">
                <span class="fas fa-hamburger btn btn-danger mb-2"></span>
                <br>
                Menu Makanan
            </h5>
        </div>
    </div>
    <hr class="my-3">
    <div class="row">
        <div class="col-md-12">
            <p>
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse"
                    href="#multiCollapseExample1" role="button"
                    aria-expanded="false" aria-controls="multiCollapseExample1">
                    <span class="fas fa-eye"></span>
                    Menu Ayam
                </a>
            </p>
            <div class="collapse multi-collapse"
                id="multiCollapseExample1">
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
                                    @if ($item->status != 'Sold Out')
                                        @if ($item->categories->name == "Ayam")
                                            <tr>
                                                <td>
                                                    <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                                    <input type="number" value="0" name="qty[]" id="" class="form-control">
                                                    <input type="hidden" class="form-control" name="tables[]">
                                                    <select hidden name="status" class="form-control">
                                                        <option selected value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                                    </select>
                                                </td>
                                                <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                                <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                            </tr>
                                        @endif
                                    @else
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
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse"
                    href="#multiCollapseExample2" role="button"
                    aria-expanded="false" aria-controls="multiCollapseExample2">
                    <span class="fas fa-eye"></span>
                    Menu Nasi
                </a>
            </p>
            <div class="collapse multi-collapse"
                id="multiCollapseExample2">
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
                                    @if ($item->status != 'Sold Out')
                                        @if ($item->categories->name == "Nasi")
                                            <tr>
                                                <td>
                                                    <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                                    <input type="number" value="0" name="qty[]" id="" class="form-control">
                                                    <input type="hidden" class="form-control" name="tables[]">
                                                    <select hidden name="status" class="form-control">
                                                        <option selected value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                                    </select>
                                                </td>
                                                <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                                <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                            </tr>
                                        @endif
                                    @else
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
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse"
                    href="#multiCollapseExample3" role="button"
                    aria-expanded="false" aria-controls="multiCollapseExample3">
                    <span class="fas fa-eye"></span>
                    Menu Mie
                </a>
            </p>
            <div class="collapse multi-collapse"
                id="multiCollapseExample3">
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
                                    @if ($item->status != 'Sold Out')
                                        @if ($item->categories->name == "Mie")
                                            <tr>
                                                <td>
                                                    <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                                    <input type="number" value="0" name="qty[]" id="" class="form-control">
                                                    <input type="hidden" class="form-control" name="tables[]">
                                                    <select hidden name="status" class="form-control">
                                                        <option selected value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                                    </select>
                                                </td>
                                                <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                                <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                            </tr>
                                        @endif
                                    @else
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
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse"
                    href="#multiCollapseExample4" role="button"
                    aria-expanded="false" aria-controls="multiCollapseExample4">
                    <span class="fas fa-eye"></span>
                    Menu Bihun
                </a>
            </p>
            <div class="collapse multi-collapse"
                id="multiCollapseExample4">
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
                                    @if ($item->status != 'Sold Out')
                                        @if ($item->categories->name == "Bihun")
                                            <tr>
                                                <td>
                                                    <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                                    <input type="number" value="0" name="qty[]" id="" class="form-control">
                                                    <input type="hidden" class="form-control" name="tables[]">
                                                    <select hidden name="status" class="form-control">
                                                        <option selected value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                                    </select>
                                                </td>
                                                <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                                <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                            </tr>
                                        @endif
                                    @else
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
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse"
                    href="#multiCollapseExample5" role="button"
                    aria-expanded="false" aria-controls="multiCollapseExample5">
                    <span class="fas fa-eye"></span>
                    Menu Cemilan
                </a>
            </p>
            <div class="collapse multi-collapse"
                id="multiCollapseExample5">
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
                                    @if ($item->status != 'Sold Out')
                                        @if ($item->categories->name == "Cemilan")
                                            <tr>
                                                <td>
                                                    <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                                    <input type="number" value="0" name="qty[]" id="" class="form-control">
                                                    <input type="hidden" class="form-control" name="tables[]">
                                                    <select hidden name="status" class="form-control">
                                                        <option selected value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                                    </select>
                                                </td>
                                                <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                                <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                            </tr>
                                        @endif
                                    @else
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
    <div class="row mb-3">
        <div class="col-md-12">
            <p>
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse"
                    href="#multiCollapseExample6" role="button"
                    aria-expanded="false" aria-controls="multiCollapseExample6">
                    <span class="fas fa-eye"></span>
                    Minuman Cappuccino
                </a>
            </p>
            <div class="collapse multi-collapse"
                id="multiCollapseExample6">
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
                                    @if ($item->status != 'Sold Out')
                                        @if ($item->categories->name == "Cappuccino")
                                            <tr>
                                                <td>
                                                    <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                                    <input type="number" value="0" name="qty[]" id="" class="form-control">
                                                    <input type="hidden" class="form-control" name="tables[]">
                                                    <select hidden name="status" class="form-control">
                                                        <option selected value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                                    </select>
                                                </td>
                                                <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                                <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                            </tr>
                                        @endif
                                    @else
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
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse"
                    href="#multiCollapseExample7" role="button"
                    aria-expanded="false" aria-controls="multiCollapseExample7">
                    <span class="fas fa-eye"></span>
                    Minuman Teh
                </a>
            </p>
            <div class="collapse multi-collapse"
                id="multiCollapseExample7">
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
                                    @if ($item->status != 'Sold Out')
                                        @if ($item->categories->name == "Teh")
                                            <tr>
                                                <td>
                                                    <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                                    <input type="number" value="0" name="qty[]" id="" class="form-control">
                                                    <input type="hidden" class="form-control" name="tables[]">
                                                    <select hidden name="status" class="form-control">
                                                        <option selected value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                                    </select>
                                                </td>
                                                <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                                <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                            </tr>
                                        @endif
                                    @else
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
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse"
                    href="#multiCollapseExample8" role="button"
                    aria-expanded="false" aria-controls="multiCollapseExample8">
                    <span class="fas fa-eye"></span>
                    Minuman Kupi
                </a>
            </p>
            <div class="collapse multi-collapse"
                id="multiCollapseExample8">
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
                                    @if ($item->status != 'Sold Out')
                                        @if ($item->categories->name == "Kupi")
                                            <tr>
                                                <td>
                                                    <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                                    <input type="number" value="0" name="qty[]" id="" class="form-control">
                                                    <input type="hidden" class="form-control" name="tables[]">
                                                    <select hidden name="status" class="form-control">
                                                        <option selected value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                                    </select>
                                                </td>
                                                <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                                <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                            </tr>
                                        @endif
                                    @else
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
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse"
                    href="#multiCollapseExample9" role="button"
                    aria-expanded="false" aria-controls="multiCollapseExample9">
                    <span class="fas fa-eye"></span>
                    Minuman Jeruk
                </a>
            </p>
            <div class="collapse multi-collapse"
                id="multiCollapseExample9">
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
                                    @if ($item->status != 'Sold Out')
                                        @if ($item->categories->name == "Jeruk")
                                            <tr>
                                                <td>
                                                    <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">">
                                                    <input type="number" value="0" name="qty[]" id="" class="form-control">
                                                    <input type="hidden" class="form-control" name="tables[]">
                                                    <select hidden name="status" class="form-control">
                                                        <option selected value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                                    </select>
                                                </td>
                                                <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                                <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                            </tr>
                                        @endif
                                    @else
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
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse"
                    href="#multiCollapseExample10" role="button"
                    aria-expanded="false" aria-controls="multiCollapseExample10">
                    <span class="fas fa-eye"></span>
                    Minuman Coklat
                </a>
            </p>
            <div class="collapse multi-collapse"
                id="multiCollapseExample10">
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
                                    @if ($item->status != 'Sold Out')
                                        @if ($item->categories->name == "Coklat")
                                            <tr>
                                                <td>
                                                    <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                                    <input type="number" value="0" name="qty[]" id="" class="form-control">
                                                    <input type="hidden" class="form-control" name="tables[]">
                                                    <select hidden name="status" class="form-control">
                                                        <option selected value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                                    </select>
                                                </td>
                                                <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                                <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                            </tr>
                                        @endif
                                    @else
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
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse"
                    href="#multiCollapseExample11" role="button"
                    aria-expanded="false" aria-controls="multiCollapseExample11">
                    <span class="fas fa-eye"></span>
                    Minuman Susu
                </a>
            </p>
            <div class="collapse multi-collapse"
                id="multiCollapseExample11">
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
                                    @if ($item->status != 'Sold Out')
                                        @if ($item->categories->name == "Susu")
                                            <tr>
                                                <td>
                                                    <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                                    <input type="number" value="0" name="qty[]" id="" class="form-control">
                                                    <input type="hidden" class="form-control" name="tables[]">
                                                    <select hidden name="status" class="form-control">
                                                        <option selected value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                                    </select>
                                                </td>
                                                <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                                <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                            </tr>
                                        @endif
                                    @else
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
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse"
                    href="#multiCollapseExample12" role="button"
                    aria-expanded="false" aria-controls="multiCollapseExample12">
                    <span class="fas fa-eye"></span>
                    Minuman Segar
                </a>
            </p>
            <div class="collapse multi-collapse"
                id="multiCollapseExample12">
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
                                    @if ($item->status != 'Sold Out')
                                        @if ($item->categories->name == "Minuman Segar")
                                            <tr>
                                                <td>
                                                    <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                                    <input type="number" value="0" name="qty[]" id="" class="form-control">
                                                    <input type="hidden" class="form-control" name="tables[]">
                                                    <select hidden name="status" class="form-control">
                                                        <option selected value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                                    </select>
                                                </td>
                                                <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                                <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                            </tr>
                                        @endif
                                    @else
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
                <a class="btn-sm btn btn-success btn-block" data-toggle="collapse"
                    href="#multiCollapseExample13" role="button"
                    aria-expanded="false" aria-controls="multiCollapseExample13">
                    <span class="fas fa-eye"></span>
                    Minuman Lainnye
                </a>
            </p>
            <div class="collapse multi-collapse"
                id="multiCollapseExample13">
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
                                    @if ($item->status != 'Sold Out')
                                        @if ($item->categories->name == "Minuman Lainnye")
                                            <tr>
                                                <td>
                                                    <input type="hidden" class="form-control" name="foods[]" value="{{ $item->id }}">
                                                    <input type="number" value="0" name="qty[]" id="" class="form-control">
                                                    <input type="hidden" class="form-control" name="tables[]">
                                                    <select hidden name="status" class="form-control">
                                                        <option selected value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                                    </select>
                                                </td>
                                                <td> <img width="50px" src="{{ url('storage/makanan-dan-minuman/'.$item->photo) }}" alt="Gambar Item"> {{ $item->name }}</td>
                                                <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                            </tr>
                                        @endif
                                    @else
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3 text-center">
                <label for="name">Nama Pemesan</label>
                <input autofocus type="text" class="form-control" name="name" placeholder="Isi Nama Pemesan">
                <span class="text-danger error-text name_error"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3 text-center">
                <label for="nomor_meja">Nomor Meja</label>
                <input autofocus type="number" class="form-control" name="no_meja" placeholder="Isi Nomor Meja">
                <span class="text-danger error-text no_meja_error"></span>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <button type="submit" class="btn btn-danger btn-block">
                <i class="fa fa-gift"></i>
                Pesan Sekarang
            </button>
        </div>
    </div>
    @endif
</form>
@endsection

@section('footer-scripts')
    <script>
        $(document).ready(function () {
            //token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            //store order makanan;
            $(document).on('submit', '#orderMakanan', function(e) {
                e.preventDefault();
                let dataForm = this;
                $.ajax({
                    type: $('#orderMakanan').attr('method'),
                    url: $('#orderMakanan').attr('action'),
                    data: new FormData(dataForm),
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('#orderMakanan').find('span.error-text').text('');
                    },
                    success: function (response) {
                        if(response.status == 400) {
                            $.each(response.error, function (prefix, val) {
                                $('#orderMakanan').find('span.'+prefix+'_error').text(val[0]);
                            });
                        } else {
                            Swal.fire({
                                width: 300,
                                title: '<strong>' + response.message + ' !</strong>',
                                icon: 'success',
                                // showCloseButton: true,
                                showCancelButton: true,
                                focusConfirm: false,
                            });
                            $('#orderMakanan')[0].reset();
                            window.location.replace("{{ route('orderan') }}")
                        }
                    }
                });
            });
        });
    </script>
@endsection
