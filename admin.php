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
 	<h1> Selamat datang Admin Data Base CS Blacklits Rental Tarakan</h1>
 	<h2>semoga kita semua selalu sehat dan di jauhkan dari tamu tidak bertanggung jawab</h2>
 	<h4>silahkan masukkan data yang ingin anda cari</h4>
 	<a href="tambah.php">TAMBAH</a>
 	<br>
 	<a href="loguot.php"> Keluar</a>
 	<br>
 	<table border="1" cellpadding="10" cellspacing="0">
 		<tr>
 			<th>No. </th>
 			<th>gambar</th>
 			<th>Nama</th>
 			<th>NIK</th>
 			<th>TLP</th>
 			<th>Keterangan</th>
 			<th>Aksi</th>
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
 			<td> <a href="hapus.php?id=<?= $data["id"]; ?>" onclick="return confirm('yakin');" >HAPUS</a> | <a href="update.php??id=<?= $data["id"]; ?>">UPDATE</a></td>
 		</tr>
 	<?php $id++; endforeach; ?>
 	</table>
 </body>
 </html>