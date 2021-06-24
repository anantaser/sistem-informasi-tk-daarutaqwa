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

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO `user`(`username`, `password`) VALUES ('$username','$password')");
	return mysqli_affected_rows($conn);
}

function ppdb($datappdb){
	global $conn;
	echo "Berhasil trigger button";

	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
  	}

	$rand = strtoupper(substr(uniqid(rand()),0,12));
	$nis = mysqli_real_escape_string($conn,$datappdb["nis"]);
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
	$tglmskskl = mysqli_real_escape_string($conn, $datappdb["tglmskskl"]);
	$ststj = mysqli_real_escape_string($conn, $datappdb["ststj"]);

	if ($ststj == 1){
		$ststjbol = "1";
	} else {
		$ststjbol = "0";
	}

	// variable value ada yang terlewat mohon double cek syntax sqlnya
	$sql = "INSERT INTO `ppdb`(`id_ppdb`, `namalengkap`, `jk`, `nik`, `tl_anak`, `t_anak`, `agama_anak`, `kwn_anak`, `alamat`, `tinggal_bersama`, `anak_ke`, `usia_anak`, `no_hp`, `nama_ayah`, `nik_ayah`, `ttl_ayah`, `pend_ayah`, `pek_ayah`, `nama_ibu`, `nik_ibu`, `ttl_ibu`, `pend_ibu`, `pek_ibu`, `tinggi_badan`, `berat_badan`, `jarak_tempuh`, `jumlah_saudara`, `jenis_pendaftaran`, `tanggal_masuk`, `masuk_rombel`, `status_setuju`) VALUES ('$rand','$nama','$jk','$nik','$tanggallahir','$tempatlahir','$agm','$kwg','$almtlkp','$tglbsm','$anakke','$usia','$nhp','$namaayah','$nikayah','$tglayah','$pdkayah','$pkjayah','$namaibu','$nikibu','$tglibu','$pdkibu','$pkjibu','$tgbdn','$btbdn','$jktp','$js','$jenis','$tglmskskl','$rombel','$ststjbol');";
	$sql .= "INSERT INTO `siswa`(`nis`, `id_ppdb`, `username`, `kelompok`, `semester`, `id_kelas`, `ukuran_seragam`, `ukuran_topi`, `status_siswa`) VALUES ('$nis','$rand','$nis','$rombel','','','','','Review');";

		if (mysqli_multi_query($conn, $sql)) {    
    		echo "New records created successfully";
  		} else {    
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  		}
  		mysqli_close($conn);

	}

function afterppdb($dataafterppdb){
	global $conn;
	echo "berhasil trigger button";

	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
  	}

  	$ukurantopi = mysqli_real_escape_string($conn,$dataafterppdb["ukurantopi"]);
	$ukuranseragam = mysqli_real_escape_string($conn,$dataafterppdb["ukuranseragam"]);
	$niss = mysqli_real_escape_string($conn,$dataafterppdb["niss"]);
	$passrand = mysqli_real_escape_string($conn,$dataafterppdb["passrand"]);
	$passrand = password_hash($passrand, PASSWORD_DEFAULT);

	$sqlo = "UPDATE `siswa` SET `ukuran_seragam`='$ukuranseragam',`ukurantopi`='$ukurantopi' WHERE `nis` = '$niss';";
	$sqlo .= "INSERT INTO `user`(`username`, `password`) VALUES ('$niss','$passrand')";
	if (mysqli_multi_query($conn, $sqlo)) {    
    		echo "New records created successfully";
  		} else {    
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  		}
  		mysqli_close($conn);

}

function buktibayar($databuktibayar){
	global $conn;
	// echo "berhasil trigger button";

	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
  	}

  	$id_bukti = strtoupper(substr(uniqid(rand()),0,10));
  	$nis = mysqli_real_escape_string($conn,$databuktibayar["nis"]);
  	$bulanbayar = mysqli_real_escape_string($conn,$databuktibayar["bulanbayar"]);
  	$jumlahbayar = mysqli_real_escape_string($conn,$databuktibayar["jumlahbayar"]);
  	$keteranganbayar = mysqli_real_escape_string($conn,$databuktibayar["keteranganbayar"]);
  	$kategoribukti = mysqli_real_escape_string($conn,$databuktibayar["kategoribukti"]);

  	//upload gambar
  	$imageupload = upload();
  	if( !$imageupload) {
  		return false;
  	}

  	$query = "INSERT INTO `bukti_pembayaran`(`id_bukti`, `nis`, `bulan_bayar`, `jumlah_bayar`, `keterangan_bayar`, `imageupload`, `kategoribukti`) VALUES ('$id_bukti','$nis','$bulanbayar','$jumlahbayar','$keteranganbayar','$imageupload','$kategoribukti')";
  	mysqli_query($conn, $query);
  	return mysqli_affected_rows($conn);
}

function upload() {

	$namaFile = $_FILES['imageupload']['name'];
	$ukuranFile = $_FILES['imageupload']['size'];
	$error = $_FILES['imageupload']['error'];
	$tmpName = $_FILES['imageupload']['tmp_name'];

	//cek apakag ada gambar yang diuplaod atau tidak
	if ($error === 4) {
		echo "<script>
		alert('pilih gambar terlebih dahulu');
		</script>;
		";
		return false;
	}
	// cek apakah yang diupload gambar atau bukan
	$ekstensiGambarValid = ['jpeg','jpeg','png'];
	$ekstensiGambar = explode('.',$namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
				</script>";
		return false;
	}


	//cek jika ukuran terlalu besar
	if ( $ukuranFile > 1000000){
		echo "<script>
				alert('Ukuran gambar terlalu besar!');
				</script>";
		return false;

	}

	//lolos pengecekan, gambar siap diupload
	move_uploaded_file($tmpName, 'img/'.$namaFile);
	return $namaFile;
}	

 ?>