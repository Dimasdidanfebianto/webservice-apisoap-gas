<?php
class Apiserver{
    private $host = "localhost";
    private $dbname = "dbtransaksi";
    private $conn ;
    private $user = "root" ;
    private $password = "";
    private $port = "3306";
    
    public function __construct(){    
        $this->conn = new PDO("mysql:host = $this->host;port=$this->port;dbname=$this->dbname;charset=utf8", $this->user, $this->password);
    }
    public function login($username,$password){
        $query = $this->conn->prepare("select * from user where nama=? and password = ?");
        $query->execute(array($username,$password));
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($username,$password);
    }
    public function Register($username,$password,$email){
        $query = $this->conn->prepare("insert into user(nama, password, email) values(?,?,?)");
        $query->execute(array($username,$password,$email));
        $query->closeCursor();
        unset($username, $password,$email);
    }
    public function GetData(){
        $query = $this->conn->prepare("select * from transaksi");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }
    public function AddData($kode_transaksi,$kode_barang,$jumlah,$total){
        $query = $this->conn->prepare("insert into transaksi (kode_transaksi, kode_barang, jumlah, total) values (?,?,?,?)");
        $query->execute(array($kode_transaksi,$kode_barang,$jumlah,$total));
        $query->closeCursor();
        unset($kode_transaksi,$kode_barang,$jumlah,$total);
    }
    public function DeleteData($kode_transaksi){
        $query = $this->conn->prepare("delete from transaksi where kode_transaksi = ?");
        $query->execute(array($kode_transaksi));
        $query->closeCursor();
        unset($kode);
    }
    public function UpdateData($nama_pembeli, $nomor_pembeli, $jumlah_pesanan,$total,$kode_transaksi){
        $query = $this->conn->prepare("update transaksi set pembeli = ?, telepon = ?, jumlah = ?, total = ? where kode_transaksi = ?");
        $data = $query->execute(array($nama_pembeli, $nomor_pembeli, $jumlah_pesanan,$total,$kode_transaksi));
        return $data;
        $query->closeCursor();
        unset($nama_pembeli, $nomor_pembeli, $jumlah_pesanan,$total,$kode_transaksi);
    }
    public function GetUpdateData($kode_transaksi){
        $query = $this->conn->prepare("select * from transaksi where kode_transaksi= ?");
        $query->execute(array($kode_transaksi));
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        unset($kode);
    }
    public function GetDataBarang(){
        $query = $this->conn->prepare("select * from barang");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }
    public function GetBarangOrder($kode_barang){
        $query = $this->conn->prepare("select * from barang where kode_barang = ?");
        $query->execute(array($kode_barang));
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        $query->closeCursor();
        unset($data);
    }
    public function DeleteBarang(){
        $query = $this->conn->prepare("delete from barang");
        $query->execute();
    }
    public function InsertBarang($kode_barang,$nama_barang,$harga_barang,$stok_barang){
        $query = $this->conn->prepare("insert into barang(kode_barang,nama_barang,harga_barang,stok_barang) values (?,?,?,?)");
        $query->execute(array($kode_barang,$nama_barang,$harga_barang,$stok_barang));
        unset($kode_barang,$nama_barang,$harga_barang,$stok_barang);
    }
    public function InsertTransaksi($kode_transaksi,$kode_barang,$jumlah_pesanan,$total_harga,$pembeli,$telepon){
        $query = $this->conn->prepare('insert into transaksi(kode_transaksi,kode_barang,jumlah,total,pembeli,telepon) values (?,?,?,?,?,?)');
        $data = $query->execute(array($kode_transaksi,$kode_barang,$jumlah_pesanan,$total_harga,$pembeli,$telepon));
        return $data;
        unset($kode_transaksi,$kode_barang,$jumlah_pesanan,$total_harga,$pembeli,$telepon);
    }
}

$option = array("uri" => "http://localhost","trace"=>1,"exceptions"=>1);
$server = new SoapServer(null, $option);
$server->setClass("Apiserver");
$server->handle();
?>