<?php 
require 'function.php';
session_start();
if (!isset($_SESSION["login"])) {
	header("location: login.php");
	exit;
}
$mahasiswa = query ("SELECT * FROM blacklist");

if (isset($_POST["submit"])) :
	$mahasiswa = cari($_POST["nama"]);

endif;
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Data Custumer Blacklist</title>
 </head>
 <body>
 	<h1> Selamat datang Owner Rental Tarakan</h1>
 	<h2>semoga kita semua selalu sehat dan di jauhkan dari tamu tidak bertanggung jawab</h2>
 <!-- koding pencarian data  -->
 		<form action="" method="post">
		 		<input type="text" name="nama" id="nama" size="40" autofocus autocomplete="off"
		 		placeholder="Masukkan Keyword Pencarian ..">
		 		<button type="submit" name="submit"> Cari</button>
	
		 	<br>
		 	<br>
<!-- koding Tambah data -->
 		<a href="tambah.php"> Tambah Data</a>
 		<br>
 		<a href="loguot.php"> Keluar</a>

<!-- koding tabel data -->
 	<table border="1" cellpadding="10" cellspacing="0">
 		<tr>
 			<th>No. </th>
 			<th>gambar</th>
 			<th>Nama</th>
 			<th>NIK</th>
 			<th>TLP</th>
 			<th>Ketengan</th>
 		</tr>

 		<?php $id = 1; ?>
 		<?php foreach ($mahasiswa as $data):?>
 		<tr>
 			<td><?= $id; ?></td>
 			<td><img src="img/<?= $data['gambar']?>" width="40"></td>
 			<td><?= $data["nama"]; ?></td>
 			<td><?= $data["nik"]; ?></td>
 			<td><?= $data["tlp"]; ?></td>
 			<td><?= $data["keterangan"]; ?></td>
 		</tr>
 	<?php $id++; endforeach; ?>
 	</table>
 </body>
 </html>