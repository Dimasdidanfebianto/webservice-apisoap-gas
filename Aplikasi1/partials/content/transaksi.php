<div class="table-responsive">
    <button style="margin: 5px;" onclick="data_client()" title="Sinkronisasi data transaksi" id="sync" type="button" class="btn btn-primary">
        <i class="fas fa-sync-alt"></i>
    </button>
    <table id="table" class="table">
        <thead class="thead-dark">
            <tr>
                <td align="center">No</td>
                <td align="center">Kode Transaksi</td>
                <td align="center">Kode Barang</td>
                <td align="center">Pembeli</td>
                <td align="center">Telepon</td>
                <td align="center">Total Barang</td>
                <td align="center">Total Harga</td>
                <td align="center">Tanggal Transaksi</td>
                <td align="center">Detail</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $data = $object->lihattransaksi();
            $no = 1;
            foreach ($data as $x) {
            ?>
                <tr>
                    <td align="center"><?php echo $no ?></td>
                    <td align="center"><?php echo $x["kode_transaksi"] ?></td>
                    <td align="center"><?php echo $x["kode_barang"] ?></td>
                    <td align="center"><?php echo $x["pembeli"] ?></td>
                    <td align="center"><?php echo $x["telepon"] ?></td>
                    <td align="right">Rp. <?php echo $x["jumlah"] ?></td>
                    <td align="center"><?php echo $x["total"] ?></td>
                    <td align="center"><?php echo $x["tanggal"] ?></td>
                    <td align="center">
                        <button title="Detail Transaksi" onclick="DetailTransaksi('<?php echo $x['kode_barang'] ?>')" class="btn btn-secondary my-2 my-sm-0"><i class="fas fa-info-circle"></i></button>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include "modals/modal_transaksi.php"
?>
<script>
    function data_client(){
        $.ajax({
            url:'proses.php',
            type:'post',
            data:{'fungsi': 'data_client'},
            success:function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Sinkronisasi',
                    text: 'Berhasil Melakukan Sinkronisasi',
                }).then(function() {
                    window.location = 'index.php?page=transaksi';
                })
            }
        })
    }
    function DetailTransaksi(kode_transaksi){
        $('#modaldetailtransaksi').modal('show');
        $("#kode_barang").prop('disabled', true);
        $("#nama_barang").prop('disabled', true);
        $("#harga_barang").prop('disabled', true);
        $("#button").html('Close');
        $('#modaldetailtransaksiLabel').text("Form Detail Transaksi");
        $.ajax({
            url: "proses.php",
            type: "post",
            data: {
                "fungsi": "get_update_data",
                "kode_barang": kode_transaksi
            },
            success: function(response) {
                $('#kode_barang').val(response[0]['kode_barang']);
                $('#nama_barang').val(response[0]['nama_barang']);
                $('#harga_barang').val(response[0]['harga_barang']);
            },
        });
    }
</script>