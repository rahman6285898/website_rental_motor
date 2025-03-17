<?php 
require 'function.php';
session_start();

if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$result = mysqli_query($con, "SELECT * FROM user  WHERE username = '$username'");

	if (mysqli_num_rows($result) === 1) {
		$rows = mysqli_fetch_assoc($result);
		if (!password_verify($password, $rows["password"])); {
			$_SESSION["login"] = TRUE;
			header("location: index.php");
			exit;
		}
	}
	$error = true;
}



	if (isset($_POST["regis"])) {
		$_SESSION["satu"] = TRUE;
		header("location: registrasi.php ");
		exit;
	}

?>




<!DOCTYPE html>
<html>
<head>
	<title>Halaman  Login User</title>
	<style>
		label{
			display: block;
		}
	</style>
</head>
<body>
<h1>Silahkan Login</h1>
<?php if (isset($error)) {
	echo "Password Salah";


} ?>

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
		<br>
		<td>
			<button type="submit" name="login"> Login </button>

			<!-- <button><a href="registrasi.php" name="regis">Registrasi</a></button> -->
		</td>
	</ul>


</form>
<form action="" method="POST">
	<ul><button type="submit" name="regis"> Regis </button></ul>
</form>
</body>
</html>
