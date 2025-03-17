<?php 	
require 'function.php';
session_start();
if (!isset($_SESSION["login"])) {
	header("location: login.php");
	exit;
}

 if (isset($_POST["submit"])) {
 
 	if (tambah($_POST) > 0) {
 		echo "
 				<script>
 				alert('data Berhasil Ditambahkan');
 				document.location.href = 'index.php';
 				</script>
 			";
 	}else{
 		echo "<script>
 				alert('Data Gagal Ditambahkan');
 				</script>";
 	}


 };

?>




<!DOCTYPE html>
<html>
<head>
	<title>	Laman Tambah Data</title>
</head>
<body>
		<h1>Silahkan Masukkan Data CS Blcaklis Anda</h1>
		<form action="" method="post" enctype="multipart/form-data">
			<li>
				<label for="nama">	Nama </label>
				<input type="text" name="nama" id="nama" required>
			</li>
			<br>	
			<li>	
				<label for="nik">	NIK </label>
				<input type="text" name="nik" id="nik" required>
			</li>
			<br>	
			<li>	
				<label for="tlp">	TLP </label>
				<input type="text" name="tlp" id="tlp">
			</li>
			<br>	
			<li>	
				<label for="ket">	Keterangan </label>
				<input type="text" name="ket" id="ket" required>
			</li>
				<br>	
			<li>	
				<label for="ket">	gambar </label>
				<input type="file" name="gambar" id="ket">
			</li>
			<br>
		
				<button type="submit" name="submit"> Simpan</button>
				<button> <a href="index.php" wid> Kembali</a></button>
				
		
		</form>
		

</body>
</html>