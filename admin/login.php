<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>Login</title>
</head>
<body>
    <form action="" method="POST">
        <div class="Login">
            <h2>Form Login</h2>
            <div class="input-group">
                <input type="text" class="form-control" name="usr" required="" >
                <span>Username</span>
            </div>
            <div class="input-group">
                <input type="password" class="form-control"  name="pwd"  required="">
                <span>Password</span>
            </div>
            <div class="input-group">
                <input type="submit" name="btn" value="Login">
            </div>
        </div>
    </form>
    <?php
    if(isset($_POST['btn'])){
        $a = $_POST['usr'];
        $b = md5($_POST['pwd']);
        $SQL = $con->query("SELECT*FROM tbuser WHERE username='$a' AND password='$b'");
        $rv = $SQL->fetch_array();
        $rows = $SQL->num_rows;
        if($rows > 0){
            session_start();
            $_SESSION['user'] = $rv['username'];
            echo"<script>document.location.href='index.php'</script>";
        }else{
            echo"<script>alert('terjadi kesalahan');document.location.href='index.php'</script>";

    } 
}
    ?>
</body>
</html>