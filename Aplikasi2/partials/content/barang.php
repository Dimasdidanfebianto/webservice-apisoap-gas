<div class="table-responsive">
    <button style="margin: 5px;" onclick="data_server()" title="Sinkronisasi Data Barang" type="button" class="btn btn-primary">
        <i class="fas fa-sync-alt"></i>
    </button>
    <table id="table" class="table">
        <thead class="thead-dark">
            <tr>
                <td align="center">No</td>
                <td align="center">Kode Barang</td>
                <td align="center">Barang</td>
                <td align="center">Harga Barang</td>
                <td align="center">Jumlah barang</td>
                <td align="center">Order</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $data = $object->lihatbarang();
            $no = 1;
            foreach ($data as $x) {
            ?>
                <tr>
                    <td align="center"><?php echo $no ?></td>
                    <td align="center"><?php echo $x["kode_barang"] ?></td>
                    <td align="center"><?php echo $x["nama_barang"] ?></td>
                    <td align="right">Rp. <?php echo $x["harga_barang"] ?></td>
                    <td align="center"><?php echo $x["stok_barang"] ?></td>
                    <input type="hidden" name="fungsi" value="hapus_data">
                    <td align="center">
                        <button title="Order Barang" onclick="FormOrder('<?php echo $x['kode_barang'] ?>')" class="btn btn-secondary my-2 my-sm-0"><i class="fas fa-download"></i></button>
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
include 'modals/modal_barang.php';
?>
<script>
    $('#jumlah_pesanan').keyup(function() {
        var total = $('#harga_barang').val() * $('#jumlah_pesanan').val();
        $('#total_harga').val(total);
    });

    function data_server() {
        $.ajax({
            url: 'proses.php',
            type: 'post',
            data: {
                'fungsi': 'data_server'
            },
            success: function(response) {
                console.log(response);
                Swal.fire({
                    icon: 'success',
                    title: 'Sinkronisasi',
                    text: 'Berhasil Melakukan Sinkronisasi',
                }).then(function() {
                    window.location = 'index.php?page=barang';
                })
            }
        })
    }

    function FormOrder(kode) {
        $('#modaltambahorder').modal('show');
        $("#button").html('Pesan');
        $('#modaltambahorderLabel').text("Form Pesan Barang");
        $.ajax({
            url: "proses.php",
            type: "post",
            data: {
                "fungsi": "data_order",
                "kode_barang": kode
            },
            success: function(response) {
                console.log(response[0]["kode_barang"]);
                $('#kode_barang').val(response[0]['kode_barang']);
                $('#nama_barang').val(response[0]['nama_barang']);
                $('#harga_barang').val(response[0]['harga_barang']);
            }
        });
    }
</script>