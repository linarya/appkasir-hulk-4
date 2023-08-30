<?php
session_start();
  include"../lib/koneksi.php";
  if(!isset($_SESSION['user'])) {
    include"login.php";
  }else{
    $user = $con->query("SELECT*FROM tb_user WHERE username='$_SESSION[user]'");
    $view= $user->fetch_array();
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
<nav class="navbar navbar-expand-sm bg-info navbar-light navbar-dark">
  <div class="container">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="?page=home">Home</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="?page=home">Data Pelanggan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=barang">Data Barang</a>
      </li>
  </ul>
    <ul class="navbar-nav navbar-right">
      <li class="nav-item"><a class="nav-link" href="#">
        <a class="nav-link active" href="?page=home">user</a>
        <a class="nav-link active" href="?page=log out">log out</a>

  </ul>
  </div>
  </nav>
    <br>
<?php
  $page = $_GET['page'];
  switch($page) {
    case"pelanggan";
      include"pelanggan.php";
    break;
    case"pelanggan";
      include"pelanggan.php";
    break;
    case"barang";
      include"barang.php";
    break;
    case"barang";
      include"barang.php";
    break;
    case"login";
      include"login.php";
    break;
    case"login";
      include"login.php";
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