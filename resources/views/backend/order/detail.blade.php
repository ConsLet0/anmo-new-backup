@extends('layouts.backend')

@section('title')
    Detail Orderan
@endsection

@section('pageTitle')
    Detail Orderan
@endsection

@section('content')
<!-- Main content -->
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h5 class="text-left mb-3">
                <a href="{{ route('orderan.historyPenjualan') }}" class="btn btn-info btn-sm">
                    <span class="fas fa-backward"></span>
                    Kembali
                </a>
            </h5>
            <h4>
                <i class="fas fa-globe"></i> Pundok Kopi Anglo Belitung.
                <small class="float-right">Date: {{ $order->created_at->format('d/M/Y') }}</small>
            </h4>
        </div>
    <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            From
            <address>
            <strong>Pundok Kopi Anglo Belitung</strong><br>
            Jalan Sriwijaya 33411 Paal Satu Belitung
            Phone: (804) 123-5432<br>
            Email: pundokanglo@gmail.com
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            To
            <address>
                <strong>{{ $order->name }}</strong><br>
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>No Meja</b><br>
            <h3><span class="text-warning font-weight-bold"># {{ $order->no_meja }}</span></h3>
            <b>Status Orderan:</b>
            <br>
            @if ($order->status == "2")
                <span class="badge badge-success">
                    Complete
                </span>
            @endif
            <br>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Item</th>
                        <th>Harga</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                        $grandTotal = 0;
                    @endphp
                    @foreach ($order->orderLine as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                {{ $item->food->name }}
                            </td>
                            <td>
                                Rp. {{ number_format($item->food->harga_beli,0,",",".") }}
                            </td>
                            <td>
                                {{ $item->qty }}
                            </td>
                            <td>
                                Rp. {{ number_format($item->subtotal,0,",",".") }}
                            </td>
                        </tr>
                        @php
                            $grandTotal = $grandTotal + $item->subtotal;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
        </div>
        <!-- /.col -->
        <div class="col-6">
            <p class="lead">Grand Total </p>

            <div class="table-responsive">
            <table class="table">
                <tr>
                    <th style="width:50%">Total:</th>
                    <td>
                        Rp. {{ number_format($grandTotal,0,",",".") }}
                    </td>
                </tr>
            </table>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-12">
        {{-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
        <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
          Payment
        </button> --}}
        <a href="{{ route('orderan.pdf', $order->id) }}" class="btn btn-primary float-right" style="margin-right: 5px;">
          <i class="fas fa-download"></i> Generate PDF
        </a>
      </div>
    </div>
  </div>
  <!-- /.invoice -->
@endsection

@section('footer-scripts')

@endsection
