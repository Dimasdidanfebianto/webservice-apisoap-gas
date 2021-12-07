<?php
include "Client.php";
$fungsi = $_POST["fungsi"];
if($fungsi == "tambah_data"){
    $kode = $_POST["kode_barang"];
    $nama = $_POST["nama_barang"];
    $harga = $_POST["harga_barang"];
    $jumlah = $_POST["jumlah_barang"];
    $object->TambahBarang($kode,$nama,$harga,$jumlah);
}
else if($fungsi == "hapus_data"){
    $kode = $_POST["kode_barang"];
    $object->HapusBarang($kode);
}
else if($fungsi == "get_update_data")
{
    $kode = $_POST["kode_barang"];
    $data_barang = $object->get_update_data($kode);
    $data = $data_barang;
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}
else if($fungsi == "update_data"){
    $kode = $_POST["kode_barang"];
    $nama = $_POST["nama_barang"];
    $harga = $_POST["harga_barang"];
    $jumlah = $_POST["jumlah_barang"];
    $object->UbahData($nama,$harga,$jumlah,$kode);
}
else if($fungsi == "tampil_data"){
    $data = $object->LihatData();
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}
else if($fungsi == "user_login"){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $data = $object->autentikasiuser($username, $password);
    if (count($data) != 0) {
        session_start();
        $_SESSION['username'] = $username;
        header('location:index.php');
    } 
    else {
        header('location:login.php');
    }  
}
else if($fungsi == 'tambah_user'){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $object->TambahUser($username, $password, $email);
    header('location:login.php');
}
else if($fungsi == "logout"){
    session_start();
    session_destroy();
    header('location:login.php');
}
else if($fungsi == "data_client"){
    $data = $object->GetDataClient();
    echo json_encode($data);
}