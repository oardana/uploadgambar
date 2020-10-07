<?php 
require_once'function.php';

    $id = $_SESSION['id'];
    $data = tampilSendiri($_SESSION['login']);
    $page = (isset($_GET['page']))? $_GET['page'] : 1;
	$kolomKataKunci = (isset($_GET['KataKunci']))? $_GET['KataKunci'] : "";
	$limit = 3;
	$limitStart = ($page - 1) * $limit;
	if($kolomKataKunci==""){
		$SqlQuery = tampilkan("SELECT * FROM gambar WHERE orang_id='$id' LIMIT $limitStart,$limit");
	}else{
		$SqlQuery = tampilkan("SELECT * FROM gambar WHERE orang_id = '$id' AND nama_gambar LIKE '%$kolomKataKunci%' LIMIT $limitStart,$limit");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Halaman User</title>
</head>
<body>
    <div class="awal">
        <?php foreach($data as $a){ ?>
            <p>Selamat Datang <b style="color: black;"><?= $a[0]; ?></b> dan semoga kamu senang</p>
        <?php } ?>
                <div class="cari">
					<form>
						<input type="search" name="KataKunci" placeholder="Silahkan Cari" autocomplete="off" autofocus value=<?php if (isset($_GET['KataKunci'])) echo $_GET['KataKunci'];?>>
						<button type="submit">Cari</button>
                        <a href="index.php">Reset</a>
                        <a href="hapus.php?ide=<?= $_SESSION["id"];?>">Hapus Semua</a>
					</form>

				</div>
            <table>
                    <?php foreach($SqlQuery as $b){ ?>
                        <tr>
                            <td><a href="hapus.php?id=<?=$b[0]; ?>" style="text-decoration: none;">Delete</a><img src="gambar/<?= $b[3]; ?>"></td>
                        </tr>
                        <tr>
                            <td><label><?= $b[2]; ?></</td>
                        </tr>
                    <?php } ?>
            </table>
            <?php 
            include 'page.php';
             ?>
    </div>
</body>
</html>