<?php 

// koneksi kedata base
$con = mysqli_connect("localhost", "root", "", "db");

function query($query){
	global $con;
	$result = mysqli_query($con, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
} 

function cari($keyword) {
	$query = "SELECT * FROM blacklist WHERE 
			nama LIKE '%$keyword%' OR 
			nik LIKE '%$keyword%' OR 
			tlp LIKE '%$keyword%'";

			return query($query);
}; 


function tambah($data){
	global $con;
	$nama = htmlspecialchars($data["nama"]);
 	$nik = htmlspecialchars($data["nik"]);
 	$tlp = htmlspecialchars($data["tlp"]);
 	$ket = htmlspecialchars($data["ket"]);
 	 // uplpd gambar
 	$gambar = upload();
 	if (!$gambar) {
 		return false;
 	}

 	$query = "INSERT INTO blacklist 
 					VALUES
 				('','$nama','$nik','$tlp','$ket','$gambar')";

 				mysqli_query($con, $query);
 				return mysqli_affected_rows($con);
}

function upload() {
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']["error"];
	$tmpName = $_FILES['gambar']["tmp_name"];

	// if($error == 4){
	// 	echo "
 // 				<script>
 // 				alert('tidak ada gambar');
 // 				document.location.href = 'tambah.php';
 // 				</script>
 // 			";
 // 			return false;
 // 		}

 	// cek apakah gambar yg di upload
 		// $ekstensiGambarValid = ["jpg", "jpeg", "png"];
 		// $ekstensiGambar = explode('.', $namaFile);
 		// $ekstensiGambar = strtolower(end($ekstensiGambar));
 		// // cek apakah gambar yang di upload
 		// if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
 		// 	echo "
 		// 		<script>
 		// 		alert('Bukan gambar Anda Upload');
 		// 		document.location.href = 'tambah.php';
 		// 		</script>
 		// 	";
 		// 	return false;
 		// }


 		if ($ukuranFile > 3000000 ) {
 			echo "
 				<script>
 				alert('Ukuran gambar Terlalu Besar');
 				document.location.href = 'tambah.php';
 				</script>
 			";
 			return false;
 		}

 		$namaFileBaru = uniqid();
 		$namaFileBaru .= '.';
 		$namaFileBaru .= $ekstensiGambar;

 		// upload gambar
 		move_uploaded_file($tmpName, 'img/' .  $namaFileBaru); 

 		return $namaFileBaru;


}




	function hapus($id){
		global$con;
		mysqli_query($con,"DELETE FROM blacklist WHERE id = $id");
	}

	function registrasi($data){
		global$con;
		$username = strtolower(stripcslashes($data['username']));
		$password = mysqli_real_escape_string($con, $data['password']);
		$password2 = mysqli_real_escape_string($con, $data['password2']);

		$result = mysqli_query($con, "SELECT username FROM user WHERE username = '$username'");
		if (mysqli_fetch_assoc($result)) {
			echo "
 				<script>
 				alert('Username Sudah Ada');
 				document.location.href = 'registrasi.php';
 				</script>
 			";
 			return false;
		}

		if ($password !== $password2) {
			echo "
 				<script>
 				alert('Konformasi Password Beda');
 				document.location.href = 'registrasi.php';
 				</script>
 			";
 			return false;
		}
		// enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);


		mysqli_query($con, "INSERT INTO user VALUES ('','$username', '$password')");
		return mysqli_affected_rows($con);


	}





 ?>