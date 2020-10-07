<?php 

include 'function.php';

// $id = $_GET["id"];

// $ide = $_GET["ide"];

// if (isset($_GET['id'])) {
// 	hapus("DELETE FROM gambar WHERE id = '$id'");
// }else if(isset($_GET["ide"])){
// 	hapus("DELETE FROM gambar WHERE orang_id ='$ide'");
// }
// header("location:index.php");

if(!isset($_GET['id']) && !isset($_GET['ide'])) {
	header('Location: ./index.php');
	exit();
} else {
	if (isset($_GET['id'])) {
		$id = $_GET["id"];
		
		$row = find('gambar', $id);
	
		if(!is_null($row)) {
			if(file_exists('./gambar/' . $row['gambar'])) {
				delete_image('./gambar/' . $row['gambar']);
			}
			destroy_using_id('gambar', [$row['id']]);
		}
	
	} else {
		$ide = $_GET["ide"];
		$rows = get_where('gambar', 'orang_id', $ide);

		foreach($rows as $row) {
			if(file_exists('./gambar/' . $row['gambar'])) {
				delete_image('./gambar/' . $row['gambar']);
			}
			destroy_using_id('gambar', [$row['id']]);
		}
	}
	header("location:index.php");
	exit();
}

