<?php 

$conn = mysqli_connect("localhost","root","","sia_tk");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;

}

function registrasi($data){
	global $conn;
	echo "koneksi berhasil";

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada apa belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
			alert('username sudah terdaftar');
			</script>";
	return false;

	}

	//cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
			</script>";
	return false;

	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	echo $password;
	echo $username;

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO `user`(`username`, `password`) VALUES ('$username','$password')");
	return mysqli_affected_rows($conn);
}


 ?>