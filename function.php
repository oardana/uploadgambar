<?php  
$conn = mysqli_connect('localhost','root','12345','gambar');

function tambah(){
    global $conn;
    $namagambar = $_POST["namagambar"];
	$gambar = upload();
	$orangId = $_SESSION['id'];

    $result = mysqli_query($conn,"INSERT INTO gambar VALUES (null, '$orangId', '$namagambar','$gambar') " );
    return $result;
}

function tampilkan($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_row($result)){
        $rows[] = $row;
    }
    return $rows;
}
function tampilSendiri($username) {
	global $conn;
	$query = "SELECT nama FROM orang WHERE nama = '$username'";
	$result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_row($result)){
        $rows[] = $row;
    }
    return $rows;
}
function upload(){
	$namafile = $_FILES["gambar"]["name"];
	$ukuranFile = $_FILES["gambar"]["size"];
	$error = $_FILES["gambar"]["error"];
	$tmpName = $_FILES["gambar"]["tmp_name"];

	if($error === 4 ){
		echo "<script>
			alert('pilih gambar terlebih dahulu');
		</script>";
		return false;
	}

	//cek apakah gambar 
	$ekstensiGambarvalid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode('.', $namafile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if(!in_array($ekstensiGambar, $ekstensiGambarvalid)){
			echo "<script>
	 		alert('Bukan gambar itu yah');
	 	</script>";
		return false;
	}

	move_uploaded_file($tmpName, 'gambar/'.$namafile);
	return $namafile;
}
function daftar(){
    global $conn;
			
    $namalengkap = $_POST["namalengkap"];
	$username = $_POST["nama"];
    $password = $_POST["password"];
	$password2 = $_POST["password2"];
		
	$result = mysqli_query($conn,"SELECT nama FROM orang WHERE nama ='$username'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
		alert('data Sudah tersedia');
		</script>";
		return false;
	}
		
	if ($password !== $password2) {
		echo "<script>
		alert('password tidak Sama');
		</script>";
		return false;
	} 
	else{
		$password = password_hash($password, PASSWORD_DEFAULT);
		$password2 = password_hash($password2, PASSWORD_DEFAULT);
		
		mysqli_query($conn,"INSERT INTO orang VALUES(null,'$namalengkap','$username', 'anggota','$password')");
		return true;
	}
}
function hapus($data){
	global $conn;
	$query = mysqli_query($conn,$data);

	return $query;
}
function login(){
    global $conn;
		
		$username = $_POST["nama"];
		$password = $_POST["password"];

		$result = mysqli_query($conn,"SELECT * FROM orang WHERE nama='$username'");
		if(mysqli_num_rows($result) === 1 ){

			$row = mysqli_fetch_assoc($result);

			if(password_verify($password, $row["password"])){
				//set session
				$_SESSION["login"] = $username;
				$_SESSION['id'] = $row['id'];

				header("Location:index.php");
				exit;
			}
		}
}
