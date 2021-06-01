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

function ppdb($datappdb){
	global $conn;
	echo "Berhasil trigger button";
	$nama = mysqli_real_escape_string($conn,$datappdb["nama"]);
	$almtlkp = mysqli_real_escape_string($conn, $datappdb["almtlkp"]);
	$jk = mysqli_real_escape_string($conn, $datappdb["jk"]);
	$tglbsm = mysqli_real_escape_string($conn, $datappdb["tglbsm"]);
	$nik = mysqli_real_escape_string($conn, $datappdb["nik"]);
	$anakke = mysqli_real_escape_string($conn, $datappdb["anakke"]);
	$tempatlahir = mysqli_real_escape_string($conn, $datappdb["tempatlahir"]);
	$tanggallahir = mysqli_real_escape_string($conn, $datappdb["tanggallahir"]);
	$usia = mysqli_real_escape_string($conn, $datappdb["usia"]); 
	$agm = mysqli_real_escape_string($conn, $datappdb["agm"]);
	$nhp = mysqli_real_escape_string($conn, $datappdb["nhp"]);
	$kwg = mysqli_real_escape_string($conn, $datappdb["kwg"]);
	// break section
	$namaayah = mysqli_real_escape_string($conn, $datappdb["namaayah"]);
	$pdkayah = mysqli_real_escape_string($conn, $datappdb["pdkayah"]);
	$nikayah = mysqli_real_escape_string($conn, $datappdb["nikayah"]);
	$pkjayah = mysqli_real_escape_string($conn, $datappdb["pkjayah"]);
	$tglayah = mysqli_real_escape_string($conn, $datappdb["tglayah"]);
	// break section
	$namaibu = mysqli_real_escape_string($conn, $datappdb["namaibu"]);
	$pdkibu = mysqli_real_escape_string($conn, $datappdb["pdkibu"]);
	$nikibu = mysqli_real_escape_string($conn, $datappdb["nikibu"]);
	$pkjibu = mysqli_real_escape_string($conn, $datappdb["pkjibu"]);
	$tglibu = mysqli_real_escape_string($conn, $datappdb["tglibu"]);
	// Break Section
	$tgbdn = mysqli_real_escape_string($conn, $datappdb["tgbdn"]);
	$jktp = mysqli_real_escape_string($conn, $datappdb["jktp"]);
	$btbdn = mysqli_real_escape_string($conn, $datappdb["btbdn"]);
	$js = mysqli_real_escape_string($conn, $datappdb["js"]);
	// Break Section
	$jenis = mysqli_real_escape_string($conn, $datappdb["jenis"]);
	$rombel = mysqli_real_escape_string($conn, $datappdb["rombel"]);
	$rombel = mysqli_real_escape_string($conn, $datappdb["rombel"]);
	$tglmskskl = mysqli_real_escape_string($conn, $datappdb["tglmskskl"]);
	$nis = mysqli_real_escape_string($conn, $datappdb["nis"]);

	$sql1 = "INSERT INTO `ppdb`(`id_ppdb`, `namalengkap`, `jk`, `nik`, `tl_anak`, `agama_anak`, `kwn_anak`, `alamat`, `tinggal_bersama`, `anak_ke`, `usia_anak`, `no_hp`, `nama_ayah`, `nik_ayah`, `ttl_ayah`, `pend_ayah`, `pek_ayah`, `nama_ibu`, `nik_ibu`, `ttl_ibu`, `pend_ibu`, `pek_ibu`, `tinggi_badan`, `berat_badan`, `jarak_tempuh`, `jumlah_saudara`, `jenis_pendaftaran`, `tanggal_masuk`, `masuk_rombel`, `status_setuju`) VALUES ('','$nama','$jk','$nik','$tempatlahir','$tglbsm','$anakke','$usia','$nhp','$namaayah','$nikayah','$tglayah','$pdkayah','$pkjayah','$namaibu','$nikibu','$tglibu','$pdkibu','$pkjibu','$tgbdn','$btbdn','$jktp','$js','$jenis','$','[value-26]','[value-27]','[value-28]','[value-29]','[value-30]')"

	// variable value ada yang terlewat mohon double cek syntax sqlnya

	mysqli_query($conn,"");
	return mysqli_affected_rows($conn);
	}


 ?>