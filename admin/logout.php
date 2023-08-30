<?php
session_start();
if($_SSESION['user']){
    session_destroy();
    echo"<script>document.location.href='index.php'</script>";
    
}
?>