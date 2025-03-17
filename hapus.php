<?php 
require 'function.php';
session_start();
if (!isset($_SESSION["login"])) {
	header("location: login.php");
	exit;
}
$con;
$id = $_GET["id"];
if (hapus($id)) {
	echo "
 		<script>
 			alert('data Berhasil Ditambahkan');
 			document.location.href = 'admin.php';
 		</script>
 			";
 }else{
 	echo "
 		<script>
 			alert('data Berhasil Ditambahkan');
 			document.location.href = 'admin.php';
 		</script>
 		";
 }



 ?>