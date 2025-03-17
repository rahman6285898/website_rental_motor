<?php 
require 'function.php';
session_start();
if (!isset($_SESSION["satu"])) {
	header("location: login.php");
	exit;
}

	if (isset($_POST['register'])) {
		if (registrasi($_POST) > 0) {
			echo "
 				<script>
 				alert('User Baru diTambahkan');
 				document.location.href = 'login.php';
 				</script>
 			";
		}else{echo mysqli_error($con);		}
		
	}

	if (isset($_POST["login"])) {
		session_unset();
		session_destroy();
		header("location: login.php ");
		exit;
	}


?>




<!DOCTYPE html>
<html>
<head>
	<title>Laman Registrasi User</title>
	<style>
		label{
			display: block;
		}
	</style>
</head>
<body>
<h1>Silahkan Registrasi</h1>

<form action="" method="POST">
	<ul>
		<td>
			<label for="username" >Username</label>
			<input type="text" name="username" id="username" required>
		</td>
		<br>
		<td>
			<label for="password">Password</label>
			<input type="password" name="password" id="password" required>
		</td>
		<td>
			<label for="password2">Konfir Password</label>
			<input type="password" name="password2" id="password2" required>
		</td>
		<br>
		<td>
			<button type="submit" name="register"> Registrasi </button>
		</td>
	</ul>
</form>

<form action="" method="POST">
	<ul><button type="submit" name="login"> Login </button></ul>
</form>
</body>
</html>
