<?php 
     require_once'function.php';
     if(isset($_POST["upload"])){
          $add = tambah();
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
    <title>Document</title>
</head>
<body>
  <div class="tambah"> 
       <i class="fa fa-camera" style="font-size: 60px; margin-left:200px;"></i>  
     <h3 align='center'>Silahkan Upload Gambar Kamu </h3>
     <form action="" method="post" enctype="multipart/form-data">
          <table>
               <tr>
                    <td><label for="namagambar">Nama Gambar</label></td>
                    <td><input type="text" name="namagambar" id="namagambar" required autocomplete="off"></td>
               </tr>
               <tr>
                    <td><label for="gambar">Gambar</label></td>
                    <td><input type="file" name="gambar" id="gambar" required autocomplete="off"></td>
               </tr>
               <tr>
                    <td><button type="submit" name="upload">upload</td>
                    <td><a href="index.php" style="text-decoration: none;">kembali</a></td>
                    <?php if(isset($_POST['upload'])){header("location:index.php"); }?>
               </tr>
          </table>
     </form>
  </div>
</body>
</html>