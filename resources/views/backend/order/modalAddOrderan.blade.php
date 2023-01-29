<div id="modalAddOrderan" class="modal fade" tabindex="-1" aria-labelledby="AddOrderanLabel" aria-hidden="true">
    <div class="modal-dialog-centered modal-dialog-scrollable modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Tambah Data Orderan
                </h5>
                <button type="button" data-dismiss="modal" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAddOrderan" class="form-add-orderan" action="{{ route('orderan.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tables">Pilih Nomor Meja Makanan</label>
                                <br>
                                <select name="tables[]" multiple id="tables" class="form-control"></select>
                            </div>
                            <span class="text-danger error-text tables_error"></span>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="foods">Pilih Makanan</label>
                                <br>
                                <span class="text-muted">Kosongkan Jika Tidak Ingin Memesan Makanan !</span>
                                <br>
                                <select name="foods[]" multiple id="foods" class="form-control"></select>
                            </div>
                            <span class="text-danger error-text foods_error"></span>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="qty">Quantity Makanan</label>
                                <br>
                                <span class="text-muted">Kosongkan Jika Tidak Ingin Merubah Quantity !</span>
                                <input type="number" name="qty" id="qty"  class="form-control" placeholder="Masukan Jumlah Quantity Orderan !">
                                <span class="text-danger error-text qty_error"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="drinks">Pilih Minuman</label><br>
                                <span class="text-muted">Kosongkan Jika Tidak Ingin Memesan Minuman !</span>
                                <br>
                                <select name="drinks[]" multiple id="drinks" class="form-control"></select>
                            </div>
                            <span class="text-danger error-text drinks_error"></span>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="qty2">Quantity Minuman</label><br>
                                <span class="text-muted">Kosongkan Jika Tidak Ingin Merubah Quantity !</span>
                                <input type="number" name="qty2" id="qty2"  class="form-control" placeholder="Masukan Jumlah Quantity Orderan !">
                                <span class="text-danger error-text qty2_error"></span>
                            </div>
                        </div>
                        {{-- <div class="col-md-12">
                            <div class="form-group">
                                <label for="status">Status Makanan / Minuman</label>
                                <select hidden name="status" id="status" class="custom-select">
                                    <option value="Menunggu Konfirmasi" selected>Menunggu Konfirmasi</option>
                                    <option value="Sedang Diproses">Sedang Diproses</option>
                                    <option value="Hidangan Sampai | Belum Bayar">Menunggu Pembayaran</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                                <span class="text-danger error-text status_error"></span>
                            </div>
                        </div> --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nama Pengorder</label>
                                <input type="text" name="name" id="name"  class="form-control" placeholder="Masukan Nama Pengorder !">
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn-block btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Pesan Sekarang !
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
