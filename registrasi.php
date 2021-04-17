<?php 

require 'functions.php';

if (isset($_POST["register"])){

	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
		</script>";
	} else {
		echo mysqli_error($conn);
	}

} 


 ?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/loginform.css">
	<title>Halaman Registrasi</title>
</head>
<body>

<div class="login-page">
	<div class="form">
		<form action="" method="post">
			<img src="assets/logotk.jpg">
			<h2 >Registrasi</h2>
			<p1>Harap Isi Data Dibawah Ini!</p1>
			<br><br>
			<input type="text" placeholder="Username" name="username" id="username">
			<input type="password" placeholder="Password" name="password" id="password">
			<input type="password" placeholder="Re-enter Your Password" name="password2" id="password2">
			<button type="submit" name="register"> Daftar </button>
			<br><br>
			<p class="message">Sudah Memiliki Akun? <br>
        	<a href="login.php">Login</a>
        	<br>  
        	<a href="index.php">Home</a></p>
		</form>
	</div>
</div>


</body>
</html>