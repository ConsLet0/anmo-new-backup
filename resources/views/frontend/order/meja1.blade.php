@extends('layouts.tables.meja')

@section('title')
    Meja {{ $tables->no_meja }}
@endsection

@section('content')
    <div class="row mb-3 text-center">
        <div class="description col-md-12">
            <img src="{{ asset('images/logocoffee.png') }}" class="logo" alt="...">
            <h4 class="title mt-2">Coffee Shop</h4>
            <a target="__blank" href="https://goo.gl/maps/B11jLLUFN2WW1yjAA" class="address">Atla St San Fransisco</a>
            <div class="info">
                <a href="tel:085960007310 "><i class="fas fa-phone-alt"></i> +1487-6323</a><br>
                <a href="mailto:anmocafe954@gmail.com ">coffeeshop@gmail.com</a>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @if ($dataBanner)
                    <div class="carousel-item active">
                        <img src="{{ url('storage/banner/' . $dataBanner->foto) }}" class="d-block w-100" alt="...">
                    </div>
                @else
                    Data Banner 1 Belum Di Upload !
                @endif
                <div class="carousel-item">
                    @if (isset($dataBanner2))
                        <img src="{{ url('storage/banner/' . $dataBanner2->foto) }}" class="d-block w-100" alt="...">
                    @else
                        Data Banner 2 Belum Di Upload !
                    @endif
                </div>
            </div>
        </div>
    </div>
    <form id="orderMakanan" action="{{ route('pelanggan.store') }}" method="POST">
        @csrf
        @if (isset($foods))
            <div class="row mb-2">
                <div class="col-md-12">
                    <h5 class="title text-center">
                        Our Menu
                    </h5>
                </div>
            </div>
            <div class="row" style="margin-block-end: 500px">
                {{-- Start Loop Category --}}
                @php
                    $index = 0;
                @endphp
                @foreach ($categories as $category)
                    <div class="col-md-12">
                        <p>
                            <button type="button" class="dropdown btn-lg btn-block" data-toggle="collapse"
                                href="#multiCollapseExample1{{ $category->slug }}" role="button" aria-expanded="false"
                                aria-controls="multiCollapseExample1{{ $category->name }}">
                                <h4 class="cat-name mt-2">
                                    <i class="fas fa-bars"></i> {{ $category->name }}
                                </h4>
                            </button>
                        </p>
                        <div class="collapse multi-collapse" id="multiCollapseExample1{{ $category->slug }}">
                            <div class="card card-body">
                                <div class="table-responsive">
                                    <table id="tableMenuMakanan" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Jumlah</th>
                                                <th>Item</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Start Loop Food --}}
                                            @foreach ($foods as $food => $item)
                                                @if ($item->status == 'Tersedia')
                                                    @if ($item->categories->name == $category->name)
                                                        <tr>
                                                            <td>
                                                                <input type="hidden" class="form-control"
                                                                    name="foods[{{ $index }}]"
                                                                    value="{{ $item->id }}">
                                                                <input type="number" value="0"
                                                                    name="qty[{{ $index }}]" id=""
                                                                    class="form-control qty-input"
                                                                    data-food-id="{{ $item->id }}">
                                                                <select hidden name="status" class="form-control">
                                                                    <option selected value="0">Menunggu Konfirmasi
                                                                    </option>
                                                                </select>
                                                                <input type="hidden" name="no_meja"
                                                                    value="{{ $tables->no_meja }}">
                                                                <input type="hidden" name="tables[{{ $index }}]"
                                                                    value="{{ $tables->no_meja }}">
                                                            </td>
                                                            <td> <img width="50px"
                                                                    src="{{ url('storage/makanan-dan-minuman/' . $item->photo) }}"
                                                                    alt="Gambar Item"> {{ $item->name }}</td>
                                                            <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                                        </tr>
                                                    @endif
                                                @else
                                                    @if ($item->categories->name == $category->name)
                                                        <tr>
                                                            <td>
                                                                <input type="hidden" class="form-control"
                                                                    name="foods[{{ $index }}]"
                                                                    value="{{ $item->id }}">
                                                                <button type="button" class="btn btn-light" disabled>Sold
                                                                    Out</button>
                                                                <select hidden name="status" class="form-control">
                                                                    <option selected value="0">Menunggu Konfirmasi
                                                                    </option>
                                                                </select>
                                                                <input type="hidden" name="no_meja"
                                                                    value="{{ $tables->no_meja }}">
                                                                <input type="hidden" name="tables[{{ $index }}]"
                                                                    value="{{ $tables->no_meja }}">
                                                            </td>
                                                            <td> <img width="50px"
                                                                    src="{{ url('storage/makanan-dan-minuman/' . $item->photo) }}"
                                                                    alt="Gambar Item"> {{ $item->name }}</td>
                                                            <td>Rp. {{ formatRupiah($item->harga_beli) }}</td>
                                                        </tr>
                                                    @endif
                                                @endif
                                                @php
                                                    $index++;
                                                @endphp
                                            @endforeach
                                            {{-- End Loop Foodd --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $index++;
                    @endphp
                @endforeach
                {{-- End Loop Category --}}
            </div>
        @endif
    @endsection

    @section('tabsMenu')
        <div class="fixed-bottom bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-2 mt-2">
                        <button type="button" class="dropdown btn-lg btn-block show_hide" onclick="showhide()"
                            data-toggle="collapse">Show / Hide Cart</button>
                    </div>
                    <div id="table-form" class="col-md-12">
                        <div class="tab-info form-group text-center">
                            <label class="people_name" for="name">Informasi Pesanan</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name"
                                    placeholder="Masukkan Nama Pemesan">
                                <span class="text-danger error-text name_error"></span>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email"
                                    placeholder="Masukkan Email Pemesan">
                                <span class="text-danger error-text email_error"></span>
                            </div>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Makanan / minuman</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>

                                <tbody id="tableCart">
                                    <tr>
                                        <td colspan="5">Pilih terlebih dahulu makanan</td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="4" style="border: none;" class="text-right">Total</td>
                                        <td id="total">Rp. 0</td>
                                    </tr>
                                </tfoot>
                            </table>

                            <select name="metode_pembayaran" class="custom-select" id="paymentMethod">
                                <option disabled>Pilih Metode Bayar</option>
                                <option value="CASH">CASH</option>
                                <option value="CASHLESS">CASHLESS</option>
                                <option value="DEBIT">DEBIT</option>
                            </select>
                            <span class="text-danger error-text metode_pembayaran_error"></span>
                        </div>

                        <div class="form-group" id="proofOfPayment" style="display: none">
                            <label for="proof_of_payment">Masukkan Bukti Pembayaran Disini</label>
                            <input type="file" accept="image/*, application/pdf" class="form-control"
                                name="proof_of_payment" id="proofOfPaymentInput">
                            <span class="text-danger error-text email_error"></span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="tab mb-2">
                            @if (isset($tables))
                                <li class="tab-item different">
                                    <a href="{{ route('pelanggan.status_orderan', $tables->no_meja) }}" class="item-link"
                                        onclick="select(this)" href="/">
                                        <i class="fas fa-list"></i>
                                        List Order
                                    </a>
                                </li>
                                <li class="tab-item">
                                    <a href="{{ route('pelanggan.meja1', $tables->no_meja) }}" class="item-link"
                                        onclick="select(this)" href="/">
                                        <i class="fas fa-utensils"></i>
                                        Menu Utama
                                    </a>
                                </li>
                                <li class="tab-item">
                                    <!-- Button trigger modal -->
                                    <button type="submit" class="btn btn-primary">
                                        <span class="fas fa-cart-plus"></span>
                                        Pesan
                                    </button>
                                </li>
                            @else
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('footer-scripts')
    @include('frontend.order.scripts')

    <script>
        var div = document.getElementById('table-form');
        var display = 0;

        function showhide(){
            if(display == 1){
                div.style.display = 'block';
                display = 0;
            }else{
                div.style.display = 'none';
                display = 1 ;
            }
        }
    </script>

    <script>
        const foods = @json($foods);
        console.log({
            foods
        });

        const paymentMethod = document.getElementById('paymentMethod');
        const proofOfPayment = document.getElementById('proofOfPayment');
        const proofOfPaymentInput = document.getElementById('proofOfPaymentInput');
        const tableCart = document.getElementById('tableCart');
        const totalEl = document.getElementById('total');

        const qtyEl = document.getElementsByClassName('qty-input');

        let selectedFood = [];
        [...qtyEl].forEach(elem => {
            const foodId = parseInt(elem.getAttribute('data-food-id'));

            elem.addEventListener('change', () => {
                const qty = parseInt(elem.value);
                console.log({
                    qty,
                    normal: elem.value
                });

                const indexSelected = selectedFood.findIndex(r => r.foodId === foodId);
                if (qty > 0) {
                    if (indexSelected >= 0) selectedFood[indexSelected].qty = qty;
                    else selectedFood = [...selectedFood, {
                        qty,
                        foodId: foodId
                    }];
                } else {
                    if (indexSelected >= 0) selectedFood.splice(indexSelected, 1);
                }

                renderTable();
            });
        });

        function renderTable() {
            let html = '';
            let no = 1;
            let total = 0;

            selectedFood.forEach(data => {
                const food = foods.find(r => data.foodId === r.id);
                const subtotal = data.qty * food.harga_beli;

                total += subtotal;

                html += `<tr>
                <td>${no}</td>
                <td>${food.name}</td>
                <td>${data.qty}</td>
                <td>Rp. ${(food.harga_beli).toLocaleString('ID')}</td>
                <td>Rp. ${subtotal.toLocaleString('ID')}</td>
            </tr>`;
                no++;
            });

            tableCart.innerHTML = html;
            totalEl.innerHTML = `Rp. ${total.toLocaleString('ID')}`;
        }

        paymentMethod.addEventListener('change', () => {
            if (paymentMethod.value === 'CASHLESS') {
                proofOfPayment.style.display = 'block';
            } else {
                proofOfPayment.style.display = 'none';
                proofOfPaymentInput.value = '';
            }
        });
    </script>
@endsection
