<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <?php
          if($_GET['edit']=='edit-pelanggan'){
              $sqledit = $con->query("SELECT*FROM tb_pelanggan WHERE id_pel='$_GET[id]'");
              $rview=$sqledit->fetch_array();
              ?>
      <div class="card">
          <div class="card-header bg-info text-white">Edit Data Kategori</div>
            <div class="card-body">
              <form action="" method="POST">
                <input type="hidden"  value="<?=$rview['id_pel']?>" name="id">
              <div class="form-group mb-3 mt-3">
                <label for="pwd">Kategori</label>
                <input type="text" class="form-control form-control-sm" value="<?=$rview['pelanggan']?>" placeholder="Masukan Kategori" name="mn">
              </div>
              <button type="submit" class="btn btn-info" name="btnedit">Update</button>
              </form>
            </div>
          <div class="card-footer bg-info text-white"></div>
      </div>
    <?php 
      if(isset($_POST['btnedit'])){
          $sqlpro = $con->query("UPDATE tb_pelanggan SET kategori='$_POST[mn]' WHERE id_pel='$_POST[id]'");
          if($sqlpro){
                echo"<script>alert('Data Berhasil Di Rubah')document.location.href='?page=menu';</script>";

          }else{
                echo"<script>alert('Gagal Di Rubah')document.location.href='?page=menu';</script>";
          }
      }
          }else{
        ?>
      <div class="card">
          <div class="card-header bg-info text-white">Input Data Kategori</div>
            <div class="card-body">
              <form action="" method="POST">
              <div class="form-group mb-3 mt-3">
                <label for="pwd">Kategori</label>
                <input type="text" class="form-control form-control-sm" placeholder="Masukan Kategori" name="mn">
              </div>
              <button type="submit" class="btn btn-info" name="btn">Insert</button>
              </form>
            </div>
          <div class="card-footer bg-info text-white"></div>
        </div>
        <?php } ?>
  </div>
  <?php
        if(isset($_POST['btn'])){
            $a = $_POST['mn'];
            $sql=$con->query("INSERT INTO tb_pelanggan VALUES('','$a')");
            if($sql){
              echo"<script>alert('Data Berhasil masuk.');</script>";
            }else{
              echo"<script>alert('Data Gagal masuk.');</script>";
            }
        }
    ?>

    <div class="col-sm-8">
    <div class="card">
          <div class="card-header bg-info text-white">Output Data Kategori</div>
            <div class="card-body">
                  <table class="table table-sm">
                  <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                          $no = 0;
                          $sqli = $con->query("SELECT*FROM tb_pelanggan");
                          while ($resl=$sqli->fetch_array()) {
                            ?>
                            <tr>
                            <td><?=$no=$no+1?></td>
                            <td><?=$resl['kategori']?></td>
                            <td><a href="?page=menu&edit=edit-kategori&id=<?=$resl['id_pel']?>" class="btn btn-warning">Ubah</a> 
                            || <a href="?page=menu&hapus=hapus-kategori&id=<?=$resl['id_pel']?>" class="btn btn-danger">Hapus</a></td>
                          </tr>
                          <?php
                          }
                          if($_GET['hapus']=='hapus-kategori'){
                          $sqlhapus = $con->query("DELETE FROM tb_pelanggan WHERE id_pel='$_GET[id]'");
                          if($sqlhapus){
                                echo"<script>document.location.href='?page=menu';</script>";      
                          }else{
                                echo"<script>document.location.href='?page=menu';</script>";
                          }
                          }
                          ?>

                    </tbody>  
                  </table>            
            </div>
          <div class="card-footer bg-info"></div>
        </div>

    </div>
  </div>
</div>