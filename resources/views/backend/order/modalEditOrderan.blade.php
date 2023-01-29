<div id="modalEditOrderan" class="modal fade" tabindex="-1" aria-labelledby="EditOrderanLabel" aria-hidden="true">
    <div class="modal-dialog-centered modal-dialog-scrollable modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Edit Data Orderan
                </h5>
                <button type="button" data-dismiss="modal" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditOrderan" class="form-edit-orderan" action="{{ route('orderan.edit') }}" method="POST">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="order_id" id="order_id">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="foods">Pilih Nama Makanan / Minuman</label><br>
                                <span class="text-muted">Kosongkan Jika Tidak Ingin Merubah Pilih Nama Makanan / Minuman !</span>
                                <br>
                                <select name="foods_edit[]" multiple id="foods_edit" class="form-control"></select>
                            </div>
                            <span class="text-danger error-text foods_error_edit"></span>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="qty">Quantity</label>
                                <input type="text" name="qty" id="qty_edit" class="form-control" placeholder="Masukan Jumlah Quantity Orderan !">
                                <span class="text-danger error-text qty_error_edit"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="no_meja">Nomor Meja Makan</label>
                                <input type="number" name="no_meja" id="no_meja_edit" class="form-control" placeholder="Masukan Nomor Meja Makan !">
                                <span class="text-danger error-text no_meja_error_edit"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="total_price">Total Harga</label>
                                <input type="number" name="total_price" id="total_price_edit" class="form-control" placeholder="Masukan Total Harga Orderan !">
                                <span class="text-danger error-text total_price_error_edit"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="status">Status Makanan / Minuman</label>
                                <select name="status" id="status_edit" class="custom-select">
                                    <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                    <option value="Sedang Diproses">Sedang Diproses</option>
                                    <option value="Hidangan Sampai | Belum Bayar">Menunggu Pembayaran</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                                <span class="text-danger error-text status_error_edit"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn-block btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                    Edit Data Orderan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
