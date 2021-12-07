<!-- Button trigger modal -->

<!-- Modal-->
<div class="modal fade " id="modaltransaksi" tabindex="-1" role="dialog" aria-labelledby="modaltransaksiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltransaksiLabel">Form Update Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="fungsi" id="fungsi" value="tambah_order">
                <div class="form-group">
                    <label for="kode_transaksi">Kode Transaksi</label>
                    <input type="text" class="form-control" name="kode_transaksi" id="kode_transaksi" placeholder="Masukan Kode Transaksi">
                </div>
                <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <input type="text" disabled class="form-control" name="kode_barang" id="kode_barang" placeholder="Masukan Kode Barang">
                </div>
                <div class="form-group">
                    <label for="nama_pembeli">Nama Pembeli</label>
                    <input type="text" class="form-control" name="nama_pembeli" id="nama_pembeli" placeholder="Masukan Nama Pembeli">
                </div>
                <div class="form-group">
                    <label for="nomor_pembeli">Nomor Pembeli</label>
                    <input type="text" class="form-control" name="nomor_pembeli" id="nomor_pembeli" placeholder="Masukan Nomor Pembeli">
                </div>
                <div class="form-group">
                    <label for="jumlah_pesanan">Jumlah Pesanan</label>
                    <input type="text" class="form-control" name="jumlah_pesanan" id="jumlah_pesanan" placeholder="Masukan Jumlah Pesanan">
                </div>
                <div class="form-group">
                    <label for="total_harga">Total Harga</label>
                    <input type="number" disabled class="form-control" name="total_harga" id="total_harga" placeholder="Masukan Jumlah Barang">
                </div>
                <input type="hidden" name="harga_barang" id="harga_barang">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" id="button" value="button" class="btn btn-primary"><span class="ui-button-text">My Text</span></button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#jumlah_pesanan').keyup(function() {
        var harga = $('#harga_barang').val(); 
        $('#total_harga').val(harga * $("#jumlah_pesanan").val());
    });
</script>