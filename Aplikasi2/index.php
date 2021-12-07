<?php
include "Client.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi1</title>
    <link rel="stylesheet" href="vendor/css//login.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/DataTables/datatables.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/all.css">
    <link rel="stylesheet" href="vendor/sweetalert/css/sweetalert2.min.css">
    <script src="vendor/fontawesome/js/all.js"></script>
    <script src="vendor/Jquery/jquery.js"></script>
    <script src="vendor/DataTables/datatables.min.js"></script>
    <script src="vendor/sweetalert/js/sweetalert2.min.js"></script>

</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
    ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <?php include "partials/navbar.php" ?>
                <?php include "partials/footer.php" ?>
            </div>
        </div>
    </div>
</body>

<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });

    function formUpdate(kode) {
        $('#modaltransaksi').modal('show');
        $('#fungsi').val('update_data');
        $('#button').val("update_data")
        $("#kode_transaksi").prop('disabled', true);
        $("#kode_barang").prop('disabled', true);
        $("#button").html('Update');
        $.ajax({
            url: "proses.php",
            type: "post",
            data: {
                "fungsi": "get_update_data",
                "kode_transaksi": kode
            },
            success: function(response) {
                console.log(response[0]["kode_barang"]);
                $('#kode_transaksi').val(response[0]['kode_transaksi']);
                $('#kode_barang').val(response[0]['kode_barang']);
                $('#nama_pembeli').val(response[0]['pembeli']);
                $('#nomor_pembeli').val(response[0]['telepon']);
                $('#jumlah_pesanan').val(response[0]['jumlah']);
                $('#total_harga').val(response[0]['total']);
                $("#harga_barang").val(response[0]['total']/response[0]['jumlah']);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }

    function FormTambahData() {
        $('#modaltambahbarang').modal('show');
        $('#fungsi').val('tambah_data');
        $('#button').val("tambah_data");
        $("#kode_barang").prop('disabled', false);
        $("#button").html('Simpan');
        $('#modaltambahbarangLabel').text("Form Tambah Data");
        resetForm();
    }

    function resetForm() {
        $('#kode_barang').val("");
        $('#nama_barang').val("");
        $('#harga_barang').val("");
        $('#jumlah_barang').val("");
    }
    $('#button').click(function() {
        var button = $('#button').val();
        if (button == "tambah_data") {
            TambahData();
        } else if (button == "update_data") {
            UpdateData();
        }
    })
    function DeleteData(kode) {
        $.ajax({
            url: 'proses.php',
            type: 'post',
            data: {
                'fungsi': 'hapus_data',
                'kode_transaksi': kode,
            },
            success: function() {
                Swal.fire({
                    icon: 'success',
                    title: kode,
                    text: 'Berhasil Di Hapus',
                }).then(function() {
                    window.location = 'index.php?page=transaksi';
                })
            }
        })
    }
    function UpdateData() {
        var kode = $('#kode_transaksi').val();
        var nama = $('#nama_pembeli').val();
        var harga = $('#nomor_pembeli').val();
        var jumlah = $('#jumlah_pesanan').val();
        var total = $('#total_harga').val();
        $.ajax({
            url: 'proses.php',
            type: 'post',
            data: {
                'fungsi': 'update_data',
                'kode_transaksi': kode,
                'nama_pembeli': nama,
                'nomor_pembeli': harga,
                'jumlah_pesanan': jumlah,
                'total_harga':total

            },
            success: function(response) {
                console.log(response);
                Swal.fire({
                    icon: 'success',
                    title: kode,
                    text: 'Berhasil Di Update',
                }).then(function() {
                    window.location = 'index.php?page=transaksi';
                })
            }
        })
    }
</script>

</html>