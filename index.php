<?php 
    session_start();
    if(!isset($_SESSION["login"])){
		header("Location:login.php");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman User</title>
</head>
<body>
    <div class="awal">
        <a href="index.php?tambah"><button style="margin-left: 20px; margin-top:10px;">Tambah</button></a>
        <label><a href="logout.php">X</a></label>
        <?php if(isset($_GET["tambah"])){
            include'tambah.php';
        } else {
            include'user.php';
        }?>
    </div>
</body>
</html>