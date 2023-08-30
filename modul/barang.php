        <div class="container">
          <div class="row">
            <div class="col-sm-4">

              <?php
                  $temp='../produk/';
               if($_GET['edit']=='edit-barang') {
                  $sqledit = $con->query("SELECT*FROM tb_barang WHERE idbarang='$_GET[id]'");
                  $rview=$sqledit->fetch_array();
                  $kd = $rview['kode_kat'];
                  ?>

              <div class="card">
                    <div class="card-header bg-info text-white"> Edit Data barang</div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form'data" style="font-size: 14px">
                        <input type="hidden" class="form-control form-control-sm" name="idbar" value="<?=$rview['idbarang']?>">
                            <div class=" form-group mb-3 mt-3">
                              <label for="pwd" class="form-label">Kategori Menu</label>
                              <select class="form-control form-control-sm"  name="kd">
                                  <?php
                                    $sqlkat = $con->query("SELECT*FROM tbkategori");
                                    while ( $vkat = $sqlkat->fetch_array()) {
                                      ?>
                                      <option value ='<?=$vkat[kode_kat]?>'<?php if($vkat[kode_kat]==$kd) {
                                                  echo'selected';
                                              } ?> > <?=$vkat[kategori]?>
                                       </option>

                                       <?php
                                  }
                          ?>
              </select>
            </div>
            <div class=" form-group mb-3 mt-3">
              <label for="pwd" class="form-label"> Nama Wisata</label>
              <input type="text" class="form-control form-control-sm" name="nm" value="<?=$rview[nama]?>">
            </div>
            <div class=" form-group mb-3 mt-3">
              <label for="pwd" class="form-label"> Harga Wisata</label>
              <input type="text" class="form-control form-control-sm" name="hrg" value="<?=$rview[harga]?>">
            </div>
            <div class=" form-group mb-3 mt-3">
            <label for="pwd" class="form-label"> Deskripsi Wisata</label>
            <textarea name="dsk" class="form-control form-control-sm" name="dsk"><?=$rview[desk]?></textarea>
            </div>
            <div class=" form-group mb-3 mt-3">
              <label for="pwd" class="form-label">Gambar Wisata</label>
              <img src="../produk/<?=$rview['gambar']?>" width="100">
            </div>
            <div class=" form-group mb-3 mt-3">
              <input type="file"  name="gbr">
            </div>
            <button type="submit" class="btn btn-primary" name="btn">Insert</button>
        </form>
               </div>
                  <div class="card-footer bg-info text-white"></div>
               </div>
                  <!-- edit -->
                <?php
                  if(isset($_POST['btnedit'])){

                    if(empty($_FILES['gbr']['name'])){
                      $sqlpro = $con->query("UPDATE tb_barang SET kode_kat='$_POST[kd]', nama='$_POST[nm]',
                       harga='$_POST[hrg]', desk='$_POST[dsk]' WHERE idbarang='$_POST[idbar]'");
                    } elseif (!empty($_FILES['gbr']['name'])) {
                      $gbr = $_FILES['gbr']['name'];
                      move_uploaded_file($_FILES['gbr']['tmp_name'], $temp,$gbr);
                      $sqlpro = $con->query("UPDATE tb_barang SET kode_kat='$_POST[kd]', nama='$_POST[nm]', harga='$_POST[hrg]',
                       desk='$_POST[dsk]', gambar='$gbr' WHERE idbarang='$_POST[idbar]'");
                    }

                    if($sqlpro) {
                      echo"<script>alert('Berhasil Di Edit');document.location.href='?page=barang';</script>"; 
                    }else{
                      echo"<script>alert('Gagal Di Edit');document.location.href='?page=barang';</script>"; 
                    }
                  }
                }else{

                ?>
   
      <div class="card">
          <div class="card-header bg-info text-white">Input Data Barang</div>
          <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data" style="font-size: 14px">
                <div class=" form-group mb-3 mt-3">
                  <label for="pwd"> Kategori Wisata</label>
                  <select  class="form-control form-control-sm" name="kd" >
                      <?php
                        $sqlkat = $con->query("SELECT*FROM tbkategori");
                        // struktur logika
                        while ( $vkat = $sqlkat->fetch_array()) {
                          echo"<option value='$vkat[kode_kat]'>$vkat[kategori]</option>";
                       }
          ?>

                  </select>
                  </div>
                  <div class=" form-group mb-3 mt-3">
                    <label for="pwd" class="form-label"> Nama Wisata</label>
                    <input type="text" class="form-control form-control-sm" name="nm">
                  </div>
                  <div class=" form-group mb-3 mt-3">
                    <label for="pwd" class="form-label"> Harga Wisata</label>
                    <input type="text" class="form-control form-control-sm" name="hrg">
                  </div>
                    <div class=" form-group mb-3 mt-3">
                    <label for="pwd" class="form-label"> Deskripsi Wisata</label>
                    <textarea name="dsk" class="form-control form-control-sm"></textarea>
                  </div>
                  <div class=" form-group mb-3 mt-3">
                    <label for="pwd" class="form-label"> Gambar Wisata</label>
                    <input type="file"  name="gbr">
                  </div>
                  <button type="submit" class="btn btn-primary" name="btn">Insert</button>
                </form>
              </div>
              <div class="card-footer bg-info text-white"></div>
        </div>
        <?php
          }
      ?>
  </div>
      <!-- perintah input -->
    <?php
        if(isset($_POST['btn'])) {
          $a = $_POST['kd'];
          $b = $_POST['nm'];
          $c = $_POST['hrg'];
          $d = $_POST['dsk'];
          $img = $_FILES['gbr']['name'];
          move_uploaded_file($_FILES['gbr']['tmp_name'], $temp.$img);
          $sql = $con->query("INSERT INTO tb_barang VALUES('', '$a', '$b', '$c', '$d', '$img')");
          if($sql) {
            echo"<script>alert('Data Berhasil masuk...');</script>";
          }else{
            echo"<script>alert('Data Gagal masuk...');</script>";
          }
        }
    ?>
  
              <div class="col-sm-8">
                  <div class="card">
                    <div class="card-header bg-info text-white">Output Data Barang</div>
                    <div class="card-body">
                        <table class="table" style="font-size:15px">
                          <thead>
                          <tr>
                              <th><small>No</small></th>
                              <th><small>Nama Wisata</small></th>
                              <th><small>Harga Wisata</small></th>
                              <th><small>Deskripsi Wisata</small></th>
                              <th><small>Gambar Wisata</small></th>
                              <th><small>Aksi</small></th>
                          </tr>
                          </thead>
                          <tbody>
                      <!-- perintah output -->
                        <?php
                            $no = 0;
                            $sqli = $con->query("SELECT*FROM tb_barang");
                            while ($resl=$sqli->fetch_array()) {
                                ?>
                              <tr>
                                <td><small><?=$no=$no+1?></small></td>
                                <td><small><?=$resl['nama']?></small></td>
                                <td><small>Rp. <?=number_format($resl['harga'])?></small></td>
                                <td><small><?=substr($resl['desk'],0,50)?></small></td>
                                <td><small><img src="../produk/<?=$resl['gambar']?>" width="100"></small></td>
                                <td><small><a href="?page=barang&edit=edit-barang&id=<?=$resl['idbarang']?>" class="btn btn-danger btn-sm">Ubah</a> ll
                                <a href="?page=barang&hapus=hapus-barang&id=<?=$resl['idbrang']?>" class="btn btn-primary btn-sm">Hapus</a></small></td>
                              </tr>
                            <?php 
                            }
                            //hapus
                            if($_GET['hapus']=='hapus-barang') {
                            $sqlhapus = $con->query("DELETE FROM tb_barang WHERE idbarang='$_GET[id]'");
                            if($sqlhapus){
                              echo"<script>document.location.href='?page=barang';</script>";
                            }else{
                              echo"<script>document.location.href='?page=barang';</script>";
                            }
                          }
                        ?>
                      
                </tbody>
          </table>
        </div>
            <div class="card-footer bg-info text-white"></div>
        </div>
    </div>
</div>
</div>