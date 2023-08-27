<?php
session_start();
  include"../lib/koneksi.php";
  if(!isset($_SESSION['user'])) {
    include"login.php";
  }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=l, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-light navbar-dark">
  <div class="container">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="?page=home">Home</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="?page=home">Data Kategori</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=barang">Data Barang</a>
      </li>
  </ul>
  <ul>
        <li class="nav-item">
          <a class="nav-link" href="?hal=barang"><i class="far fa-user-circle"></i>user
          <?php
            if($lvl=='admin'){
                echo"admin";
            }elseif ($lvl=='user'){
               echo"user";
            }
          ?>
          </a></li>
        <li class="nav-item"><a class="nav-link" href="?page=logout"><i class="fas fa-sign-alt"></i>logout</a></li>
      </ul>
  </div>
</nav>
<br>
<?php
  $page = $_GET['page'];
  switch($page) {
    case"home";
      include"menu.php";
    break;
    case"barang";
      include"Barang.php";
    break;
    case"login";
      include"page.php";
    break;
    case"logout";
      include"logout.php";
    break;
  }
?>
</body>
</html>
<?php
  }
?>