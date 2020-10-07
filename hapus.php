<?php 

include 'function.php';

$id = $_GET["id"];

$ide = $_GET["ide"];

if (isset($_GET['id'])) {
	hapus("DELETE FROM gambar WHERE id = '$id'");
}else if(isset($_GET["ide"])){
	hapus("DELETE FROM gambar WHERE orang_id ='$ide'");
}
header("location:index.php");