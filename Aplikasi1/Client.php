<?php

use SoapClient as GlobalSoapClient;

class ApiClient
{
    private $option, $api, $option2, $api2;
    public function __construct()
    {   //api  local
        $this->option = array("location" => "http://localhost/praktikum7/APISOAP/SERVER/Server.php", "uri" => "http://localhost", "trace" => 1, "exceptions" => 1);
        $this->api = new SoapClient(null, $this->option);
        //api client
        $this->option2 = array("location" => "http://localhost/praktikum7/APISOAP/SERVER2/Server.php", "uri" => "http://localhost", "trace" => 1, "exceptions" => 1);
        $this->api2 = new SoapClient(null, $this->option2);
    }
    public function LihatData()
    {
        $data = $this->api->GetData();
        return $data;
        unset($data);
    }
    public function TambahBarang($kode, $nama_barang, $harga_barang, $jumlah_barang)
    {
        $this->api->AddData($kode, $nama_barang, $harga_barang, $jumlah_barang);
        unset($kode, $nama_barang, $harga_barang, $jumlah_barang);
    }
    public function HapusBarang($kode)
    {
        $this->api->DeleteData($kode);
        unset($kode);
    }
    public function get_update_data($kode)
    {
        $data = $this->api->GetUpdateData($kode);
        return $data;
        unset($kode);
    }
    public function UbahData($nama, $harga, $jumlah, $kode)
    {
        $data = $this->api->UpdateData($nama, $harga, $jumlah, $kode);
        unset($nama, $harga, $jumlah, $kode);
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
    public function lihattransaksi()
    {
        $data = $this->api->GetDataTransaksi();
        return $data;
        unset($data);
    }
    public function GetDataClient()
    {
        $this->api->DeleteTransaksi();
        $data = $this->api2->GetData();
        foreach ($data as $x) {
            $this->api->InsertTransaksi($x['kode_transaksi'], $x['kode_barang'],$x['pembeli'],$x['telepon'], $x['jumlah'], $x['total'], $x['tanggal']);
        }
        return $data;
    }
}

$object = new ApiClient();
