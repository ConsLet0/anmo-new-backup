@extends('layouts.frontend')

@section('title')
    Orderan
@endsection

@section('title')
    Keranjang
@endsection

@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Orderan</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
            </div>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td width="30px">No.</td>
                        <td class="image" width="50px">Item</td>
                        <td class="cart_item">Status Pesanan</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no= 1;
                    @endphp
                    @foreach ($orders as $order)
                    <tr>
                        <td>
                            {{ $no++ }}
                        </td>
                        <td class="cart_quantity">
                            {{ $order->name }}
                        </td>
                        <td class="cart_quantity">
                            @if ($order->status == 'Menunggu Konfirmasi')
                                <span class="badge-warning">
                                    {{ $order->status }}
                                </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</section>
<!--/#cart_items-->

<section id="do_action">
    <div class="container" style="margin-bottom: 80px;">
        <div class="row">
            <div class="col-sm-12">
                <div id="order-summary" class="box mb-4 p-0">
                    <div class="box-header mt-0">
                        <h3>Mohon Menunggu Pesanan Anda Sedang Di Siapkan !</h3>
                    </div>
                    {{-- <p class="text-muted text-small">Berikut Adalah Data Pesananmu.</p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Total Quantity</td>
                                <th> Pcs</th>
                            </tr>
                            <tr class="total">
                                <td>Total Pesanan</td>
                                <th></th>
                            </tr>
                            </tbody>
                        </table>
                    </div> --}}
                </div>
            </div>
            <div class="col-md-12">
                {{-- <div class="box-header mt-0">
                    <h3>Nomor Meja Pesanan</h3>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection

@section('footer-scripts')
<script>
    function select(link) {
        const item = link.parentNode;
        const tabs = item.parentNode;
        const index = Array.prototype.indexOf.call(tabs.children, item);
        const items = tabs.querySelectorAll('.tab-item');

        tabs.style.setProperty('--index', index + 1);
        items.foreach(item => item.classList.remove('active'));
        item.classList.add('active');
    }
</script>

@endsection
