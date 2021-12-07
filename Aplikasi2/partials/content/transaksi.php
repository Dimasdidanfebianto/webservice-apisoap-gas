<div class="table-responsive">
    <br>
    <table id="table" class="table">
        <thead class="thead-dark">
            <tr>
                <td align="center">No</td>
                <td align="center">Kode Transaksi</td>
                <td align="center">Kode Barang</td>
                <td align="center">Nama Pembeli</td>
                <td align="center">Nomor Pembeli</td>
                <td align="center">Total Barang</td>
                <td align="center">Total Harga</td>
                <td align="center">Tanggal Transaksi</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $data = $object->LihatData();
            $no = 1;
            foreach ($data as $x) {
            ?>
                <tr>
                    <td align="center"><?php echo $no ?></td>
                    <td align="center"><?php echo $x["kode_transaksi"] ?></td>
                    <td align="center"><?php echo $x["kode_barang"] ?></td>
                    <td align="center"><?php echo $x["pembeli"] ?></td>
                    <td align="center"><?php echo $x["telepon"] ?></td>
                    <td align="right"><?php echo $x["jumlah"] ?></td>
                    <td align="center">Rp. <?php echo $x["total"] ?></td>
                    <td align="center"><?php echo $x["tanggal"] ?></td>
                    <td align="center">
                        <button onclick="DeleteData('<?php echo $x['kode_transaksi']?>')" title="Hapus Transaksi" class="btn btn-danger my-2 my-sm-0"><i class="fas fa-trash-alt"></i></button>
                        <button onclick="formUpdate('<?php echo $x['kode_transaksi']?>')" title="Ubah Transaksi" class="btn btn-secondary my-2 my-sm-0"><i class="fa-solid fa-pen-to-square"></i></button>
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
</script>