<div class="container">
  <div class="row"> 
    <div class="col-sm-4">

      <?php
      if($_GET['edit']=='edit-kategori'){
        $sqledit = $con->query("SELECT*FROM tbkategori WHERE kode_kat='$_GET[id]'");
        $rview=$sqledit->fetch_array();
        ?>

      <div class="card">
        <div class="card-header bg-info text-white"> Edit Data Kategori</div>
        <div class="card-body">
          <form action="" method="POST">
              <input type="hidden"  value="<?=$rview['kode_kat']?>";  name="kode">
            <div class="form-group">
              <label for="pwd">Kategori</label>
              <input type="text" class="form-control form-control-sm" value="<?=$rview['kategori']?>";  placeholder="Masukan Kategori" name="mn">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="btn">Update</button>
          </form>
        </div>
        <div class="card-footer bg-info text-white"></div>
      </div>

      <?php
          if(isset($_POST['btnedit'])){
            $sqlpro = $con->query("UPDATE tbkategori SET kategori='$_POST[mn]' WHERE kode_kat='$_POST[kode]'");
            if($sqlpro){
                echo"<script>alert('Data Berhasil Di Rubah');document.location.href='?page=about';<?script>";
            }else{
              echo"<script>alert('Data Gagal Di Rubah');document.location.href='?page=about';<?script>";
            }
          }
        }else{
      ?>
      <div class="card">
        <div class="card-header bg-info text-white"> Input Data Kategori</div>
        <div class="card-body">
          <form action="" method="POST">
              <input type="hidden"   name="kode">
            <div class="form-group">
              <label for="pwd">Kategori</label>
              <input type="text" class="form-control form-control-sm" value="<?=$rview['kategori']?>";  placeholder="Masukan Kategori" name="mn">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="btn">Update</button>
          </form>
        </div>
        <div class="card-footer bg-info text-white"></div>
      </div>
      <?php 
      }
      ?>
      </div>

    <?php
      if(isset($_POST['btn'])){
        $a = $_POST['mn'];
        $sql=$con->query("INSERT INTO tbkategori VALUES('','$a')");
        if($sql){
          echo"<script>alert('Data Berhasil masuk...');</script>";
        }else{
          echo"<script>alert('Data Gagal masuk...');</script>";

        }
      }
?>


  <div class="col-sm-8">
  <div class="card">
  <div class="card-header bg-info text-white">Output Data Kategori</div>
  <div class="card-body">
  <table class="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Kategori</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $no = 0;
        $sqli = $con->query("SELECT*FROM tbkategori");
        while ($resl=$sqli->fetch_array()) {
          ?>
      <tr>
        <td><?=$no=$no+1?></td>
        <td><?=$resl['kategori']?></td>
        <td><a href="?page=about&edit=edit-kategori&id=<?=$resl['kode_kat']?>;" class="btn btn-danger btn-sm">Ubah</a> ll <a href="?page=about&hapus=hapus-kategori&id=<?=$resl['kode_kat']?>;" class="btn btn-primary btn-sm">Hapus</a></td>
       </tr>
          <?php
        }
        if($_GET['hapus']=='hapus-kategori'){
        $sqlhapus = $con->query("DELETE FROM tbkategori WHERE kode_kat='$_GET[id]'");
        if($sqlhapus){
          echo"<script>alert('Data Berhasil Di Rubah');document.locaiton.href='?page=about';<?script>";
        }else{
          echo"<script>alert('Data Gagal masuk...');</script>";
        }
      }
      ?>
      </tbody>
  </table>
    </div>
  </div>
  <div class="card-footer bg-info text-white"></div>
</div>
  </div>
</div>
</div>