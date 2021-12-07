<!-- Button trigger modal -->

<!-- Modal-->
<div class="modal fade " id="modaltambahbarang" tabindex="-1" role="dialog" aria-labelledby="modaltambahbarangLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltambahbarangLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <input type="hidden" name ="fungsi" id="fungsi" value="tambah_data">
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text"  class="form-control" name="kode_barang" id="kode_barang" placeholder="Masukan Kode Barang">
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text"  class="form-control" name="nama_barang" id="nama_barang" placeholder="Masukan Nama Barang">
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Harga Barang</label>
                        <input type="number"  class="form-control" name="harga_barang" id="harga_barang" placeholder="Masukan Harga Barang">
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Jumlah Barang</label>
                        <input type="number"  class="form-control" name="jumlah_barang" id="jumlah_barang" placeholder="Masukan Jumlah Barang">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" id="button" value="button" class="btn btn-primary"><span class="ui-button-text">My Text</span></button>
        </div>
    </div>
</div>
</div>