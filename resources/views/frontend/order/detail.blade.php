<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>STRUK COFFEE SHOP</title>
    @include('frontend.order.style')
</head>

<body>
    <div class="wrap">
        <div class="content">
            <div class="header">
                {{-- <h4>ANMO CAFE SUKAASIH</h4> --}}
                <h5><b>STRUK PEMBAYARAN COFFEE SHOP</b></h5>
            </div>
            <table>
                <tbody>
                    <tr>
                        <td><b>TANGGAL</b></td>
                        <td><b>:</b></td>
                        <td><b>{{ $orders->created_at }}</b></td>
                    </tr>
                    <tr>
                        <td><b>MEJA</b></td>
                        <td><b>:</b></td>
                        <td><b>{{ $tables->no_meja }}</b></td>
                    </tr>
                    <tr>
                        <td><b>NAMA</b></td>
                        <td><b>:</b></td>
                        <td><b>{{ strtoupper($orders->name) }}</b></td>
                    </tr>
                    <tr>
                        <td><b>EMAIL</b></td>
                        <td><b>:</b></td>
                        <td><b>{{ strtoupper($orders->email) }}</b></td>
                    </tr>
                    <tr>
                        <td><b>METODE BAYAR</b></td>
                        <td><b>:</b></td>
                        <td><b>{{ strtoupper($orders->metode_pembayaran) }}</b></td>
                    </tr>
                </tbody>
            </table>
            <table>
                @foreach ($orders->orderLine as $item)
                <tr>
                    <td>
                        <b>{{ $item->food->name }}</b> <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>{{ $item->qty }} x {{ $item->harga_beli }}</b>
                    </td>
                    <td>
                        <b>:</b>
                    </td>
                    <td>
                        <b>Rp. {{ number_format($item->subtotal,0,",",".") }}</b><br>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td><b></b></td>
                    <td><b></b></td>
                    <td><b>---------------------+</b></td>
                </tr>
                <tr>
                    <td><b>Total</b></td>
                    <td><b>:</b></td>
                    <td>
                        @php
                            $grandTotal = 0;
                        @endphp
                        @foreach ($orders->orderLine as $item)
                            @if ($item->food->status != "Tidak Tersedia")
                                @php
                                    $grandTotal += $item->subtotal
                                @endphp
                            @endif
                        @endforeach
                        <b>Rp. {{ number_format($grandTotal,0,",",".") }}</b>
                    </td>
                </tr>
            </table>
            <div class="footer">
                @if ($orders->status != '2')
                    <h5><b>TRANSAKSI PEMBAYARAN DILAKUKAN <br>DI KASIR TERIMA KASIH</b></h5>
                @else
                    <h5><b>TERIMA KASIH TELAH MELAKUKAN PEMBAYARAN</b></h5>
                @endif
            </div>
            {{-- <span style="text-align: center">-----------------</span> --}}
        </div>
    </div>
</body>

</html>
