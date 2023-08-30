<?php
session_start();
if($_SESSION['user']){
    session_destroy();
    echo"<script>document.locaiton.href='index.php'</script>";
}
?>