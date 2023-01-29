<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    {{-- Jquery --}}
    <script src="{{ asset('jquery/jquery.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <title>Laporan Penjualan</title>
</head>
<body>
<!-- Main content -->
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-globe"></i> Pundok Kopi Anglo Belitung.
                <small class="float-right">Date: {{ $order->created_at->format('d/M/Y') }}</small>
            </h4>
        </div>
    <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-md-12 invoice-col">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td>
                            From
                            <address>
                            <strong>Pundok Kopi Anglo Belitung</strong><br>
                            Jalan Sriwijaya 33411 Paal Satu Belitung
                            Phone: (804) 123-5432<br>
                            Email: pundokanglo@gmail.com
                            </address>
                        </td>
                        <td>
                            To
                            <address>
                                <strong>{{ $order->name }}</strong><br>
                            </address>
                        </td>
                        <td>
                            <b>No Meja</b><br>
                            <h3><span class="text-warning font-weight-bold"># {{ $order->no_meja }}</span></h3>
                        </td>
                        <td>
                            <b>Status Orderan:</b>
                            @if ($order->status == "2")
                                <span class="badge badge-success">
                                    Complete
                                </span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
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

  </div>
  <!-- /.invoice -->
</body>
</html>
