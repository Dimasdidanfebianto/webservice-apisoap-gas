<?php

use SoapClient as GlobalSoapClient;

class ApiClient
{
    private $option, $api, $option2, $api2;
    public function __construct()
    {   //api  local
        $this->option = array("location" => "http://localhost/praktikum7/APISOAP/SERVER2/Server.php", "uri" => "http://localhost", "trace" => 1, "exceptions" => 1);
        $this->api = new SoapClient(null, $this->option);
        //api client
        $this->option2 = array("location" => "http://localhost/praktikum7/APISOAP/SERVER/Server.php", "uri" => "http://localhost", "trace" => 1, "exceptions" => 1);
        $this->api2 = new SoapClient(null, $this->option2);
    }
    public function LihatData()
    {
        $data = $this->api->GetData();
        return $data;
        unset($data);
    }
    public function TambahTransaksi($kode_transaksi, $kode_barang, $jumlah, $total)
    {
        $this->api->AddData($kode_transaksi, $kode_barang, $jumlah, $total);
        unset($kode_transaksi, $kode_barang, $jumlah, $total);
    }
    public function HapusTransasksi($kode_transaksi)
    {
        $this->api->DeleteData($kode_transaksi);
        unset($kode_transaksi);
    }
    public function get_update_data($kode_transaksi)
    {
        $data = $this->api->GetUpdateData($kode_transaksi);
        return $data;
        unset($kode_transaksi);
    }
    public function UbahData($nama_pembeli, $nomor_pembeli, $jumlah_pesanan,$total,$kode_transaksi)
    {
        $data = $this->api->UpdateData($nama_pembeli, $nomor_pembeli, $jumlah_pesanan,$total, $kode_transaksi);
        return $data;
        unset($nama_pembeli, $nomor_pembeli, $jumlah_pesanan,$total,$kode_transaksi);
    }
    public function autentikasiuser($username, $password)
    {
        $data = $this->api->login($username, $password);
        return $data;
        unset($username, $password);
    }
    public function TambahUser($username, $password, $email)
    {
        $this->api->Register($username, $password, $email);
        unset($username, $password, $email);
    }
    public function lihatbarang()
    {
        $data = $this->api->GetDataBarang();
        return $data;
        unset($data);
    }
    public function GetDataServer()
    {
        $this->api->DeleteBarang();
        $data = $this->api2->GetData();
        foreach ($data as $x) {
            $this->api->InsertBarang($x['kode_barang'], $x['nama_barang'], $x['harga_barang'], $x['stok_barang']);
        }
        return $data;
    }
    public function LihatDataOrder($kode_barang){
        $data = $this->api->GetBarangOrder($kode_barang);
        return $data;
    }
    public function Transaksi($kode_transaksi,$kode_barang,$jumlah_pesanan,$total_harga,$pembeli,$telepon){
        $data = $this->api->InsertTransaksi($kode_transaksi,$kode_barang,$jumlah_pesanan,$total_harga,$pembeli,$telepon);        
        return $data;
    }
}

$object = new ApiClient();
