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
    <link rel="stylesheet" href="vendor/sweetalert/css//sweetalert2.min.css">
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
            <div class="col-md-10">
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

    function TambahData() {
        var kode = $('#kode_barang').val();
        var nama = $('#nama_barang').val();
        var harga = $('#harga_barang').val();
        var jumlah = $('#jumlah_barang').val();
        $.ajax({
            url: 'proses.php',
            type: 'post',
            data: {
                'fungsi': 'tambah_data',
                'kode_barang': kode,
                'nama_barang': nama,
                'harga_barang': harga,
                'jumlah_barang': jumlah
            },
            success: function() {
                Swal.fire({
                    icon: 'success',
                    title: kode,
                    text: 'Berhasil Di Tambahkan',
                }).then(function() {
                    window.location = 'index.php?page=barang';
                })
            }
        })

    }

    function DeleteData(kode) {
        $.ajax({
            url: 'proses.php',
            type: 'post',
            data: {
                'fungsi': 'hapus_data',
                'kode_barang': kode,
            },
            success: function() {
                Swal.fire({
                    icon: 'success',
                    title: kode,
                    text: 'Berhasil Di Hapus',
                }).then(function() {
                    window.location = 'index.php?page=barang';
                })
            }
        })
    }

    function UpdateData() {
        var kode = $('#kode_barang').val();
        var nama = $('#nama_barang').val();
        var harga = $('#harga_barang').val();
        var jumlah = $('#jumlah_barang').val();
        $.ajax({
            url: 'proses.php',
            type: 'post',
            data: {
                'fungsi': 'update_data',
                'kode_barang': kode,
                'nama_barang': nama,
                'harga_barang': harga,
                'jumlah_barang': jumlah
            },
            success: function() {
                Swal.fire({
                    icon: 'success',
                    title: kode,
                    text: 'Berhasil Di Update',
                }).then(function() {
                    window.location = 'index.php?page=barang';
                })
            }
        })
    }

    function formUpdate(kode) {
        $('#modaltambahbarang').modal('show');
        $('#fungsi').val('update_data');
        $('#button').val("update_data")
        $("#kode_barang").prop('disabled', true);
        $("#button").html('Update');
        $('#modaltambahbarangLabel').text("Form Update Data");
        $.ajax({
            url: "proses.php",
            type: "post",
            data: {
                "fungsi": "get_update_data",
                "kode_barang": kode
            },
            success: function(response) {
                console.log(response[0]["kode_barang"]);
                $('#kode_barang').val(response[0]['kode_barang']);
                $('#nama_barang').val(response[0]['nama_barang']);
                $('#harga_barang').val(response[0]['harga_barang']);
                $('#jumlah_barang').val(response[0]['stok_barang']);
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
</script>

</html>