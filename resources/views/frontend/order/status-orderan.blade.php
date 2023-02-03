@extends('layouts.tables.dynamic')

@section('title')
    Status Orderan Meja {{ $tables->no_meja }}
@endsection

@section('content')
<div class="container">
    <div class="row" style="margin-top: 50px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white text-uppercase text-center">
                    <h4 class="title">Status Orderan No Meja {{ $tables->no_meja }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table id="table_status_orderan" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Meja</th>
                                        <th>Item</th>
                                        <th>Status</th>
                                        <th>Metode</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key => $item)
                                        @if ($tables->no_meja == $item->no_meja)
                                            @if ($item->status != '2')
                                                <tr>
                                                    <td>
                                                        {{ $key+1 }}
                                                    </td>
                                                    <td>
                                                        {{ $item->name }}
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-warning">
                                                            #{{ $item->no_meja }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @foreach ($item->orderLine as $v)
                                                            @if ($v->food->status != "Tidak Tersedia")
                                                                {{ $v->qty }} {{ $v->food->name }} <br>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if ($item->status == "0")
                                                            <span class="badge badge-warning badge-pill">
                                                                Pesanan Sedang Disiapkan
                                                            </span>
                                                        @elseif($item->status == "1")
                                                            <span class="badge badge-primary badge-pill">
                                                                Pesanan Sudah Dihidangkan
                                                            </span>
                                                        @else
                                                            <span class="badge badge-success badge-pill">
                                                                Terima Kasih, Datang Kembali
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $item->metode_pembayaran }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('detail-orderan-pelanggan/no_meja/'.$item->no_meja.'/'.$item->created_at) }}" class="btn btn-success btn-sm">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                            Struk Pesanan
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
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
@endsection

@section('tabsMenu')
<div class="fixed-bottom">
    <div class="container">
        <div class="row">
            <div class="tab">
                <li class="tab-item different">
                    <a href="{{ route('pelanggan.status_orderan', $tables->no_meja) }}" class="item-link" onclick="select(this)" href="/">
                        <i class="fas fa-list"></i>
                        List Order
                    </a>
                </li>
                <li class="tab-item">
                    <a href="{{ route('pelanggan.meja1', $tables->no_meja) }}" class="item-link" onclick="select(this)" href="/">
                        <i class="fas fa-utensils"></i>
                        Menu Utama
                    </a>
                </li>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
    @include('frontend.order.scriptDynamic')
@endsection
