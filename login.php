<?php 
require_once 'function.php';

	session_start();

	if(isset($_SESSION["login"])){
		header("location:index.php");
	}
	
	if (isset($_POST['login'])) {
		$log = login();

				if(isset($log) === false){
					echo "<script>
					alert('Maaf Password/username Tidak Tepat');
					document.location.href = 'login.php';
					</script>";
			}
		}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="fs/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fs/css/font-awesome.css">
	<title>Halaman login</title>
</head>
<body>
<div class="login">
<i class='fa fa-user' style="font-size: 40px;"></i>
	<h1>Silahkan Login Dahulu</h1>
	<p>Sebelum memasuki aplikasi upload gambar</p>
			<form method="post" action="">
				<table>
					<tr>
						<td><i class="fa fa-user" style="font-size: 20px;"></i> Username</td>
						<td><input type="text" name="nama" id="nama" autocomplete="off"></td>
					</tr>
					<tr>
						<td><i class="fa fa-key" style="font-size:20px;"></i>Password</td>
						<td><input type="password" name="password" id="password" autocomplete=""></td>
					</tr>
					<tr>
						<td><button name="login">Kirim</button></td>
					</tr>
				</table>
			</form>
		<p>Belum punya akun ? Daftar di<a href="daftar.php" style="color: black;">sini</a></p>
	</div>
</body>
</html>