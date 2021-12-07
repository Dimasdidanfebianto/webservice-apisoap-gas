<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#"><?php echo $judul; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <?php 
          if(!empty($_GET)){
            $kategori = $cari;
            ?>
            <select class="custom-select mr-sm-2" id="inputGroupSelect02">
            <option value="%%" selected>Pilih...</option>
            <?php
            for($i = 0; $i < count($kategori); $i++){
            ?>
              <option value=<?php echo $kategori[$i] ?>><?php echo $kategori[$i]?></option>
            <?php
            }?>
            <input class="form-control mr-sm-2" type="search" placeholder="Cari" aria-label="Cari">
            <button class="btn btn-warning my-2 my-sm-0" type="submit">Search</button>
          <?php
          }
        ?>
      </select>      
    </form>
  </div>
</nav>