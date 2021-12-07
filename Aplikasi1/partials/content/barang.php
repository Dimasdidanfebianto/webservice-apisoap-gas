<div class="table-responsive">
    <button style="margin: 5px;" title="Tambah Barang" onclick="FormTambahData()" type="button" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i>
    </button>
    <table id="table" class="table">
        <thead class="thead-dark">
            <tr>
                <td align="center">No</td>
                <td align="center">Kode Barang</td>
                <td align="center">Barang</td>
                <td align="center">Harga Barang</td>
                <td align="center">Jumlah barang</td>
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
                    <td align="center"><?php echo $x["kode_barang"] ?></td>
                    <td align="center"><?php echo $x["nama_barang"] ?></td>
                    <td align="right">Rp. <?php echo $x["harga_barang"] ?></td>
                    <td align="center"><?php echo $x["stok_barang"] ?></td>
                    <input type="hidden" name="fungsi" value="hapus_data">
                    <td align="center">
                        <button onclick="DeleteData('<?php echo $x['kode_barang']?>')" title="Hapus Barang" class="btn btn-danger my-2 my-sm-0"><i class="fas fa-trash-alt"></i></button>
                        <button onclick="formUpdate('<?php echo $x['kode_barang']?>')" title="Ubah Barang" class="btn btn-secondary my-2 my-sm-0"><i class="fa-solid fa-pen-to-square"></i></button>
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
include "modals/modal_barang.php"
?>