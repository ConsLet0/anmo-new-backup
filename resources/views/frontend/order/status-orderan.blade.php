@extends('layouts.tables.dynamic')

@section('title')
    Status Orderan
@endsection

@section('content')
<div class="container">
    <div class="row" style="margin-top: 50px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-warning text-white text-uppercase text-center">
                    <h4>Status Orderan No Meja {{ $tables->no_meja }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table id="table_status_orderan" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengorder</th>
                                        <th>No Meja</th>
                                        <th>Item</th>
                                        <th>Status</th>
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
                                                            <span class="badge badge-danger badge-pill">
                                                                Pesanan Anda Sedang Disiapkan !
                                                            </span>
                                                        @elseif($item->status == "1")
                                                            <span class="badge badge-primary badge-pill">
                                                                Selamat Menikmati Hidangan
                                                            </span>
                                                        @else
                                                            <span class="badge badge-success badge-pill">
                                                                Selesai
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('detail-orderan-pelanggan/no_meja/'.$item->no_meja.'/'.$item->created_at) }}" class="btn btn-success btn-sm">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                            Detail Pesanan
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
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
    @include('frontend.order.scriptDynamic')
@endsection
