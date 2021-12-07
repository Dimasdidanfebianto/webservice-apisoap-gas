<?php
$judul = "";
$cari = array();
$konten = "";
if (!empty($_GET)) {
  if ($_GET["page"] == "home") {
    $judul = "Home";
    $konten =  "content/home.php";
  } else if ($_GET["page"] == "barang") {
    $judul = "Barang";
    $konten =  "content/barang.php";
  } else if ($_GET["page"] == "transaksi") {
    $judul = "Transaksi";
    $konten = "content/transaksi.php";
  }
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Gudang</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="?page=home">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="?page=barang">Barang<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=transaksi">Transaksi</a>
      </li>
    </ul>
  </div>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link">Welcome <?php echo $_SESSION['username']; ?></a>
        </li>
        <li class="nav-item">
          <button onclick="logout()" class='btn btn-warning'>Logout?</button>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="modal fade" id="modallogout" tabindex="-1" role="dialog" aria-labelledby="modallogoutTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title  w-100 text-center" id="modallogoutTitle">Form Logout</h5>
      </div>
      <div class="modal-body">
        <h5 class="modal-title  w-100 text-center" id="modallogoutTitle">Yakin Mau Logout?</h5>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" onclick="logoutuser()" class="btn btn-primary">Logout</button>
      </div>
    </div>
  </div>
</div>
<script>
  function logout() {
    $('#modallogout').modal('show');
  }

  function logoutuser() {
    $.ajax({
      url: 'proses.php',
      type: 'post',
      data: {
        'fungsi': 'logout'
      }
    });
    Swal.fire({
      icon: 'success',
      title: 'Logout',
      text: 'Berhasil Di Logout',
    }).then(function() {
      window.location = 'login.php';
    })
  }
</script>
<?php
if (!empty($konten)) {
  include $konten;
}
?>