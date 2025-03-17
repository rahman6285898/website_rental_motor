<?php 
session_start();
if (!isset($_SESSION["login"])) {
	header("location: login.php");
	exit;
}



 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Laman Update Data</title>
</head>
<body>
	<h1>Laman Update Data</h1>

</body>
</html>