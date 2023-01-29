@extends('layouts.tables.meja')

@section('title')
    Keranjang Meja 1
@endsection

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 50px">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-warning text-white text-uppercase text-center">
                        <h4>Pundok Kupi Anglo</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="accordion" role="tablist" class="mb-5">
                                    <div class="card">
                                        <div id="headingOne" role="tab" class="card-header">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    Keranjang Belanja No Meja {{ $tables->no_meja }}
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" role="tabpanel" aria-labelledby="headingOne"
                                            data-parent="#accordion" class="collapse show">
                                            <div class="card-body">
                                                <div class="box mt-0 pb-0 no-horizontal-padding">
                                                    @if ($message = Session::get('success'))
                                                        <div class="alert alert-success">
                                                            {{ $message }}
                                                        </div>
                                                    @elseif ($message = Session::get('danger'))
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @else
                                                    @endif
                                                    <div id="table_keranjang" class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Product</th>
                                                                    <th>Quantity</th>
                                                                    <th>Price</th>
                                                                    <th>Subtotal</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $grandTotal = 0;
                                                                    $totalQty = 0;
                                                                    $qty      = 0;
                                                                    $food_id  = 0;
                                                                @endphp
                                                                @foreach ($cartItems as $item)
                                                                    @if ($item->attributes->table_id == $tables->no_meja)
                                                                        <tr>
                                                                            <td>{{ $item->name }}</td>
                                                                            <td>
                                                                                <form id="UpdateCartForm" action="{{ route('carts.update') }}" method="POST" enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                                                    <div class="input-group">
                                                                                        <input type="number" name="qty" value="{{ $item->quantity }}" class="form-control">
                                                                                        <button type="submit"
                                                                                            class="btn btn-warning btn-sm">
                                                                                            Update Qty
                                                                                            <i class="fa fa-refresh"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </form>
                                                                            </td>
                                                                            <td>
                                                                                {{ formatRupiah($item->price) }}
                                                                            </td>
                                                                            <td>
                                                                                {{ formatRupiah($item->price * $item->quantity) }}
                                                                            </td>
                                                                            <td>
                                                                                <form
                                                                                    action="{{ route('carts.destroy') }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    <input type="hidden" name="id"
                                                                                        value="{{ $item->id }}">
                                                                                    <button type="submit"
                                                                                        class="btn btn-danger btn-sm">
                                                                                        Delete
                                                                                        <i class="fa fa-trash-o"></i>
                                                                                    </button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                        @php
                                                                            $grandTotal = $grandTotal + $item->price * $item->quantity;
                                                                            $totalQty   = $totalQty + $item->quantity;
                                                                            $qty        = $item->quantity;
                                                                            $food_id = $item->id;
                                                                        @endphp
                                                                    @else
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                {{-- @foreach ($cartItems as $item) --}}
                                                                    @if($tables->no_meja == '1')
                                                                        <tr>
                                                                            <th>Total</th>
                                                                            <th>
                                                                                {{ formatRupiah($grandTotal) }}
                                                                            </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>
                                                                                <form action="{{ route('keranjang_belanja.clear') }}" method="POST">
                                                                                    @csrf
                                                                                    <button type="submit" class="btn-sm btn btn-danger">
                                                                                        Clear All Keranjang
                                                                                        <i class="fa fa-trash-o"></i>
                                                                                    </button>
                                                                                </form>
                                                                            </th>
                                                                        </tr>
                                                                        @else
                                                                    @endif
                                                                {{-- @endforeach --}}
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div id="accordion" role="tablist" class="mb-5">
                                    <div class="card">
                                        <div id="headingTwo" role="tab" class="card-header">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" href="#collapseTwo" aria-expanded="true"
                                                    aria-controls="collapseTwo">
                                                    Checkout Pesanan No Meja {{ $tables->no_meja }}
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo"
                                            data-parent="#accordion" class="collapse show">
                                            <div class="card-body">
                                                <div id="order-summary" class="box mt-0 mb-4 p-0">
                                                    <div class="box-header mt-0">
                                                        <h3>Detail Pesanan</h3>
                                                    </div>
                                                    <p class="text-muted">Untuk Melakukan Pesanan Silahkan Checkout
                                                        Pesanan Anda Perhatikan Baik - Baik Pesanan Anda Sebelum Di Checkout
                                                        !</p>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>

                                                                <tr>
                                                                    <td>Nomor Meja</td>
                                                                    <th>
                                                                        #{{ $tables->no_meja }}
                                                                    </th>
                                                                </tr>

                                                                    <tr>
                                                                        <td>Total Quantity Pesanan</td>
                                                                        <th>
                                                                            {{ $qty }} Pcs.
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Total Pesanan</td>
                                                                        <th>{{ formatRupiah($grandTotal) }}</th>
                                                                    </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="box box mt-0 mb-4 p-0">
                                                    <div class="box-header mt-0">
                                                        <h4>Nama Pemesan</h4>
                                                    </div>
                                                    <p class="text-muted">Silahkan Masukan Nama Anda Untuk Memudahkan
                                                    Kami Memproses Pesanan Anda.</p>

                                                    <form id="AddOrderanForm" action="{{ route('pelanggan.store') }}" method="POST">
                                                        @csrf
                                                        {{-- Input Field Table Orders --}}
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="name">
                                                            <span class="text-danger error-text name_error"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">status</label>
                                                            <select readonly name="status" readonly id="status" class="custom-select">
                                                                <option value="Menunggu Konfirmasi" selected>
                                                                    Menunggu Konfirmasi
                                                                </option>
                                                            </select>
                                                        </div>
                                                        {{-- Input Field table order_line --}}
                                                        <div class="form-group">
                                                            <label for="qty">Qty</label>
                                                            <select class="form-control" name="qty[]" id="" multiple>
                                                                @foreach ($cartItems as $item)
                                                                    <option selected value="{{ $item->quantity }}">{{ $item->quantity }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="table_id">Tables Id</label>
                                                            <input value="{{ $tables->no_meja }}" type="text" name="tables[]" id="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="foods[]" id="" multiple>
                                                                @foreach ($cartItems as $item)
                                                                    <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-success btn-block">
                                                                <i class="fa fa-gift"></i>
                                                                Checkout Pesanan
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    <ul class="tab-items">
                        <li class="tab-item">
                            <a href="{{ route('keranjang.meja1', $tables->no_meja) }}" class="item-link"
                                onclick="select(this)" href="/">
                                <i class="fa fa-shopping-cart"></i>
                                Keranjang
                            </a>
                        </li>
                        <div class="tab-indicator"></div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    @include('frontend.cart.scripts')
@endsection
