<?php 
	require_once 'function.php';

	if(isset($_POST["kirim"])){
			$add = daftar();
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="fs/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fs/css/font-awesome.css">
	<title>Halaman Daftar</title>
</head>
<body>
	<div class="login">
	<i class='fa fa-home' style="font-size: 40px;"></i>
		<h1>Silahkan Daftar terlebih dahulu</h1>
		<form method="post" action="">
			<table>
				<tr>
					<td><label>Nama Lengkap</label></td>
					<td><input type="text" name="namalengkap" autocomplete="off" required></td>
				</tr>
				<tr>
					<td><label>Username</label></td>
					<td><input type="text" name="nama" autocomplete="off" required></td>
				</tr>
				<tr>
					<td><label>Password</label></td>
					<td><input type="password" name="password" autocomplete="off" required></td>
				</tr>
				<tr>
					<td><label>Konfirmasi Password</label></td>
					<td><input type="password" name="password2" autocomplete="off" required></td>
				</tr>
				<tr>
					<td><button type="submit" name="kirim">Kirim</button></td>
					<td>Silahkan <a href="login.php" style="color: black;">Keluar</a></td>
					<?php if(isset($_POST['kirim'])){header("location:login.php");}?>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>