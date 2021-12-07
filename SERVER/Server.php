<?php
class Apiserver
{
    private $host = "localhost";
    private $dbname = "dbmasterbarang";
    private $conn;
    private $user = "root";
    private $password = "";
    private $port = "3306";

    public function __construct()
    {
        $this->conn = new PDO("mysql:host = $this->host;port=$this->port;dbname=$this->dbname;charset=utf8", $this->user, $this->password);
    }
    public function login($username, $password)
    {
        $query = $this->conn->prepare("select * from user where nama=? and password = ?");
        $query->execute(array($username, $password));
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($username, $password);
    }
    public function Register($username, $password, $email)
    {
        $query = $this->conn->prepare("insert into user(nama, password, email) values(?,?,?)");
        $query->execute(array($username, $password, $email));
        $query->closeCursor();
        unset($username, $password, $email);
    }
    public function GetData()
    {
        $query = $this->conn->prepare("select * from barang");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }
    public function AddData($kode, $nama_barang, $harga_barang, $jumlah_barang)
    {
        $query = $this->conn->prepare("insert into barang (kode_barang, nama_barang, harga_barang, stok_barang) values (?,?,?,?)");
        $query->execute(array($kode, $nama_barang, $harga_barang, $jumlah_barang));
        $query->closeCursor();
        unset($kode, $nama_barang, $harga_barang, $jumlah_barang);
    }
    public function DeleteData($kode)
    {
        $query = $this->conn->prepare("delete from barang where kode_barang = ?");
        $query->execute(array($kode));
        $query->closeCursor();
        unset($kode);
    }
    public function UpdateData($nama_barang, $harga_barang, $jumlah_barang, $kode_barang)
    {
        $query = $this->conn->prepare("update barang set nama_barang = ?, harga_barang = ?, stok_barang = ? where kode_barang = ?");
        $query->execute(array($nama_barang, $harga_barang, $jumlah_barang, $kode_barang));
        $query->closeCursor();
        unset($nama_barang, $harga_barang, $jumlah_barang, $kode_barang);
    }
    public function GetUpdateData($kode)
    {
        $query = $this->conn->prepare("select * from barang where kode_barang = ?");
        $query->execute(array($kode));
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        unset($kode);
    }
    public function GetDataTransaksi()
    {
        $query = $this->conn->prepare("select * from transaksi");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function InsertTransaksi($kode_transaksi, $kode_barang,$pembeli,$telepon, $jumlah, $total, $tanggal)
    {
        $query = $this->conn->prepare("insert into transaksi (kode_transaksi,kode_barang,pembeli,telepon,jumlah,total,tanggal) values (?,?,?,?,?,?,?)");
        $query->execute(array($kode_transaksi, $kode_barang,$pembeli,$telepon, $jumlah, $total, $tanggal));
        $query->closeCursor();
    }
    public function DeleteTransaksi(){
        $query = $this->conn->prepare("delete from transaksi");
        $query->execute();
        $query->closeCursor();
    }
}

$option = array("uri" => "http://localhost", "trace" => 1, "exceptions" => 1);
$server = new SoapServer(null, $option);
$server->setClass("Apiserver");
$server->handle();
