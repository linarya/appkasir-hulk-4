<div class="container">
        <div class="row">
            <div class="col-sm-4">

                <?php
                    $temp = '../produk/';
                 if($_GET['edit']=='edit-barang') {
                    $sqledit = $con->query("SELECT*FROM tb_barang WHERE id_barang='$_GET[id]'");
                    $rview=$sqledit->fetch_array();
                    $kd = $rview['id_bar'];
                   ?>

                <div class="card">
                    <div class="card-header bg-info text-white">Edit Data Barang</div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" class="form-control form-control-sm" name="id_bar" value="<?=$rview[id_barang]?>">
                            <div class="form-group mb-3 mt-3">
                                <label for="pwd" class="form-label">Kategori Barang</label>
                                <select class="form-control form-control-sm" name="kd">
                                    
                                    <?php
                                        $sqlkat = $con->query("SELECT*FROM tb_pelanggan");
                                        // struktur logika
                                        while ( $vkat = $sqlkat->fetch_array()) {
                                            ?>
                                            <option value='<?=$vkat[id_bar]?>'<?php if($vkat[id_bar]==$kd) {
                                                        echo'selected';
                                                    } ?> > <?=$vkat[Pelanggan]?>
                                            </option>

                                            <?php
                                        }
                                    ?>
                                   
                                </select>
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <label for="pwd" class="form-label">Nama Menu</label>
                                <input type="text" class="form-control form-control-sm" name="nm" value="<?=$rview[nama]?>">
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <label for="pwd" class="form-label">Harga Menu</label>
                                <input type="text" class="form-control form-control-sm" name="hrg" value="<?=$rview[harga]?>">
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <label for="pwd" class="form-label">Deskripsi Menu</label> <br>
                                <textarea class="form-control form-control-sm" name="dsk"><?=$rview[desk]?></textarea>
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <label for="pwd" class="form-label">Gambar Menu</label> <br>
                                <img src="../produk/<?=$rview['gambar']?>" width="80">
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <input type="file" name="gbr">
                            </div>
                            <button type="submit" class="btn btn-info text-white" name="btnedit">Update</button>
                        </form>
                    </div>
                    <div class="card-footer bg-info text-white"></div>
                </div>
                <!-- edit -->
                <?php
                    if(isset($_POST['btnedit'])){
                        
                        if(empty($_FILES['gbr']['name'])){
                        
                        $sqlpro = $con->query("UPDATE tb_barang SET id_pel='$_POST[id]', nama='$_POST[nm]', harga='$_POST[hrg]', desk='$_POST[dsk]' WHERE id_barang='$_POST[id_bar]'");
                        } elseif (!empty($_FILES['gbr']['name'])) {
                            $gbr = $_FILES['gbr']['name'];
                            move_uploaded_file($_FILES['gbr']['tmp_name'], $temp.$gbr);
                            $sqlpro = $con->query("UPDATE tb_barang SET id_pel='$_POST[id]', nama='$_POST[nm]', harga='$_POST[hrg]', desk='$_POST[dsk]', gambar='$gbr' WHERE id_barang='$_POST[id_bar]'");
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
                            <div class="form-group mb-3 mt-3">
                                <label for="pwd" class="form-label">Kategori Menu</label>
                                <select class="form-control form-control-sm" name="kd">
                                    
                                    <?php
                                        $sqlkat = $con->query("SELECT*FROM tb_pelanggan");
                                        // struktur logika
                                        while ( $vkat = $sqlkat->fetch_array()) {
                                            echo"<option value='$vkat[id_pel]'>$vpel[pelanggan]</option>";
                                        }
                                    ?>
                                   
                                </select>
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <label for="pwd" class="form-label">Nama Menu</label>
                                <input type="text" class="form-control form-control-sm" name="nm">
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <label for="pwd" class="form-label">Harga Menu</label>
                                <input type="text" class="form-control form-control-sm" name="hrg">
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <label for="pwd" class="form-label">Deskripsi Menu</label> <br>
                                <textarea class="form-control form-control-sm" name="dsk" ></textarea>
                            </div>
                            <div class="form-group mb-3 mt-3">
                                <label for="pwd" class="form-label">Gambar Menu</label> <br>
                                <input type="file" name="gbr">
                            </div>
                            <button type="submit" class="btn btn-info text-white" name="btn">Insert</button>
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
                        echo "<script>alert('Data Berhasil Masuk...');</script>";
                    } else {
                        echo "<script>alert('Data Gagal Masuk...');</script>";
                    }
                }
            ?>

            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header bg-info text-white">Output Data Barang</div>
                    <div class="card-body">
                        <table class="table table-sm" style="font-size: 12px">
                            <thead class="thead-light bg-secondary">
                            <tr>
                                <th>No</th>
                                <th>Nama Menu</th>
                                <th>Harga Menu</th>
                                <th>Deskripsi Menu</th>
                                <th>Gambar Menu</th>
                                <th>Aksi</th>
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
                                            <td><?=$no=$no+1?></td>
                                            <td><?=$resl['nama']?></td>
                                            <td>Rp. <?=number_format($resl['harga'])?></td>
                                            <td><?=substr($resl['desk'],0,30)?>...</td>
                                            <td><img src="../produk/<?=$resl['gambar']?>" width="100"></td>
                                            <td><a href="?page=barang&edit=edit-barang&id=<?=$resl['id_barang']?>" class="btn btn-info">Edit</a> | <a href="?page=barang&hapus=hapus-barang&id=<?=$resl['id_barang']?>" class="btn btn-danger">Delete</a></td>
                                        </tr> 
                                    <?php
                                    }
                                    // hapus
                                    if($_GET['hapus']=='hapus-barang') {
                                    $sqlhapus = $con->query("DELETE FROM tb_barang WHERE id_barang='$_GET[id]'");
                                    if($sqlhapus) {
                                        echo"<script>document.location.href='?page=barang';</script>";
                                    }else{
                                        echo"<script>document.location.href='?page=barang';</script>";
                                    }
                                    }
                                ?>
                            
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer  bg-info text-white"></div>
                </div>
            </div>
        </div>
    </div>