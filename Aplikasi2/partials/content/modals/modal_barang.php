<!-- Button trigger modal -->

<!-- Modal-->
<div class="modal fade " id="modaltambahorder" tabindex="-1" role="dialog" aria-labelledby="modaltambahorderLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltambahorderLabel"></h5>
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
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" disabled class="form-control" name="nama_barang" id="nama_barang" placeholder="Masukan Nama Barang">
                </div>
                <div class="form-group">
                    <label for="harga_barang">Harga Barang</label>
                    <input type="number" disabled class="form-control" name="harga_barang" id="harga_barang" placeholder="Masukan Harga Barang">
                </div>
                <div class="form-group">
                    <label for="jumlah_pesanan">Jumlah Pesanan</label>
                    <input type="text" class="form-control" name="jumlah_pesanan" id="jumlah_pesanan" placeholder="Masukan Jumlah Pesanan">
                </div>
                <div class="form-group">
                    <label for="total_harga">Total Harga</label>
                    <input type="number" disabled class="form-control" name="total_harga" id="total_harga" placeholder="Masukan Jumlah Barang">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" onclick="transaksi()" id="button" value="button" class="btn btn-primary"><span class="ui-button-text">My Text</span></button>
            </div>
        </div>
    </div>
</div>
<script>
    function transaksi(){
        var kode_transaksi = $('#kode_transaksi').val();
        var kode_barang = $('#kode_barang').val();
        var harga_barang = $('#harga_barang').val();
        var nama_pembeli = $('#nama_pembeli').val();
        var nomor_pembeli = $('#nomor_pembeli').val();
        var total_harga = $('#total_harga').val();
        var jumlah_pesanan = $('#jumlah_pesanan').val();
        console.log(kode_transaksi,kode_barang,harga_barang,nama_pembeli,nomor_pembeli,total_harga);
        $.ajax({
            url:'proses.php',
            type:'post',
            data:{
                'fungsi':'tambah_transaksi',
                'kode_transaksi':kode_transaksi,
                'kode_barang':kode_barang,
                'harga_barang':harga_barang,
                'total_harga':total_harga,
                'nama_pembeli':nama_pembeli,
                'nomor_pembeli':nomor_pembeli,
                'jumlah_pesanan':jumlah_pesanan,
            },
            success:function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Transaksi',
                    text: 'Berhasil Melakukan Transaksi',
                }).then(function() {
                    window.location = 'index.php?page=transaksi';
                })     
            }
        })
    }
</script>