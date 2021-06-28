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
	
	session_start();


	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
  	}

	$rand = strtoupper(substr(uniqid(rand()),0,12));
	$nis = mysqli_real_escape_string($conn,$datappdb["nis"]);
	$_SESSION['nissession'] = $nis;
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

  	$ukurantopi = mysqli_real_escape_string($conn,$dataafterppdb["ukurantopi"]);
	$ukuranseragam = mysqli_real_escape_string($conn,$dataafterppdb["ukuranseragam"]);
	$nis = $_SESSION['nissession'];
	$sql = "UPDATE `siswa` SET `ukuran_seragam`='$ukuranseragam',`ukuran_topi`='$ukurantopi' WHERE `nis` = '$nis';";
	mysqli_query($conn, $sql);
  	return mysqli_affected_rows($conn);
}

function buktibayar($databuktibayar){
	global $conn;
	// echo "berhasil trigger button";

	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
    	exit;
  	}


  	$tgl_bayar = date("m.d.y");
  	$status_bayar = 'ok';
  	$id_pembayaran = strtoupper(substr(uniqid(rand()),0,10));
  	$id_bukti = strtoupper(substr(uniqid(rand()),0,10));
  	$nis = mysqli_real_escape_string($conn,$databuktibayar["nis"]);  	
  	$jumlahbayar = mysqli_real_escape_string($conn,$databuktibayar["jumlahbayar"]);
  	$keteranganbayar = mysqli_real_escape_string($conn,$databuktibayar["keteranganbayar"]);
  	$kategoribukti = mysqli_real_escape_string($conn,$databuktibayar["kategoribukti"]);
  	$bulanbayar = mysqli_real_escape_string($conn,$databuktibayar["bulanbayar"]);
  	

  	//upload gambar
  	$imageupload = upload();
  	if( !$imageupload) {
  		return false;
  	}

  	$query = "INSERT INTO `bukti_pembayaran`(`id_bukti`, `nis`, `bulan_bayar`, `jumlah_bayar`, `keterangan_bayar`, `imageupload`, `kategoribukti`) VALUES ('$id_bukti','$nis','$bulanbayar','$jumlahbayar','$keteranganbayar','$imageupload','$kategoribukti');";
  	$query .= "INSERT INTO `pembayaran`(`id_pembayaran`, `nis`, `tgl_bayar`, `bulan_bayar`, `ket_bayar`, `status_bayar`, `kategori`, `id_bukti`) VALUES ('$id_pembayaran','$nis','$tgl_bayar','$bulanbayar','$keteranganbayar','$status_bayar','$kategoribukti','$id_bukti');";

  	if (mysqli_multi_query($conn, $query)) {    
    		echo "New records created successfully";
  		} else {    
    	echo "Error: " . $query . "<br>" . mysqli_error($conn);
  		}
  		mysqli_close($conn);
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

function nilaiadmin($dataadmin){
	global $conn;

$nilai = mysqli_real_escape_string($conn,$dataadmin	["nilai"]);
$nis = mysqli_real_escape_string($conn,$dataadmin	["nis"]);
$sosialemosional = mysqli_real_escape_string($conn,$dataadmin	["sosialemosional"]);
$nis = mysqli_real_escape_string($conn,$dataadmin	["nis"]);
$bahasa = mysqli_real_escape_string($conn,$dataadmin	["bahasa"]);
$kognitif = mysqli_real_escape_string($conn,$dataadmin	["kognitif"]);
$motorikkasar = mysqli_real_escape_string($conn,$dataadmin	["motorikkasar"]);
$motorikhalus = mysqli_real_escape_string($conn,$dataadmin	["motorikhalus"]);
$seni = mysqli_real_escape_string($conn,$dataadmin	["seni"]);
$tanggalnilai = mysqli_real_escape_string($conn,$dataadmin	["tanggalnilai"]);

$sql = "INSERT INTO `nilai`(`id_nilai`, `nis`, `sosemos`, `bahasa`, `kognitif`, `mototik_kasar`, `motorik_halus`, `seni`, `tanggalnilai`) VALUES ('$nilai','$nis','$sosialemosional','$bahasa','$kognitif','$motorikkasar','$motorikhalus','$seni','$tanggalnilai')";
mysqli_query($conn, $sql);
return mysqli_affected_rows($conn);


}

function frapor($datarapor){
	global $conn;

	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
  	}	

$IDRapot = mysqli_real_escape_string($conn,$datarapor["IDRapot"]);
$NIS = mysqli_real_escape_string($conn,$datarapor["NIS"]);
$Pertumbuhan = mysqli_real_escape_string($conn,$datarapor["Pertumbuhan"]);
$SikapSpiritual = mysqli_real_escape_string($conn,$datarapor["SikapSpiritual"]);
$SikapSosial = mysqli_real_escape_string($conn,$datarapor["SikapSosial"]);
$Pengetahuan = mysqli_real_escape_string($conn,$datarapor["Pengetahuan"]);
$Keterampilan = mysqli_real_escape_string($conn,$datarapor["Keterampilan"]);
$Sakit = mysqli_real_escape_string($conn,$datarapor["Sakit"]);
$Izin = mysqli_real_escape_string($conn,$datarapor["Izin"]);
$Alpha = mysqli_real_escape_string($conn,$datarapor["Alpha"]);
$Semester = mysqli_real_escape_string($conn,$datarapor["Semester"]);
$BeratBadan = mysqli_real_escape_string($conn,$datarapor["BeratBadan"]);
$TinggiBadan = mysqli_real_escape_string($conn,$datarapor["TinggiBadan"]);

$sql = "INSERT INTO `e_rapor`(`id_erapot`, `nis`, `semester`, `pertumbuhan`, `sikap_spiritual`, `sikap_sosial`, `pengetahuan`, `keterampilan`, `berat_badan`, `tinggi_badan`, `sakit`, `izin`, `alpha`) VALUES ('$IDRapot','$NIS','$Semester','$Pertumbuhan','$SikapSpiritual','$SikapSosial','$Pengetahuan','$Keterampilan','$BeratBadan','$TinggiBadan','$Sakit','$Izin','$Alpha');";

mysqli_query($conn,$sql);
return mysqli_affected_rows($conn);

}

function akunuserbaru($akunuser){
	global $conn;

$nis = mysqli_real_escape_string($conn,$akunuser	["nis"]);
$password = mysqli_real_escape_string($conn,$akunuser["password"]);

$sql = "INSERT INTO `user`(`username`, `password`) VALUES ('$nis','$password');";

mysqli_query($conn,$sql);
return mysqli_affected_rows($conn);

}


function aktifsiswa($dataaktif){
	global $conn;

	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
  	}

$idppdb = mysqli_real_escape_string($conn,$dataaktif["idppdb"]);
$nis = mysqli_real_escape_string($conn,$dataaktif["nis"]);
$nama = mysqli_real_escape_string($conn,$dataaktif["nama"]);
$almtlkp = mysqli_real_escape_string($conn,$dataaktif["almtlkp"]);
$jk = mysqli_real_escape_string($conn,$dataaktif["jk"]);
$tglbsm = mysqli_real_escape_string($conn,$dataaktif["tglbsm"]);
$nik = mysqli_real_escape_string($conn,$dataaktif["nik"]);
$anakke = mysqli_real_escape_string($conn,$dataaktif["anakke"]);
$tempatlahir = mysqli_real_escape_string($conn,$dataaktif["tempatlahir"]);
$usia = mysqli_real_escape_string($conn,$dataaktif["usia"]);
$tanggallahir = mysqli_real_escape_string($conn,$dataaktif["tanggallahir"]);
$agm = mysqli_real_escape_string($conn,$dataaktif["agm"]);
$nhp = mysqli_real_escape_string($conn,$dataaktif["nhp"]);
$kwg = mysqli_real_escape_string($conn,$dataaktif["kwg"]);
$namaayah = mysqli_real_escape_string($conn,$dataaktif["namaayah"]);
$pdkayah = mysqli_real_escape_string($conn,$dataaktif["pdkayah"]);
$nikayah = mysqli_real_escape_string($conn,$dataaktif["nikayah"]);
$pkjayah = mysqli_real_escape_string($conn,$dataaktif["pkjayah"]);
$tglayah = mysqli_real_escape_string($conn,$dataaktif["tglayah"]);
$namaibu = mysqli_real_escape_string($conn,$dataaktif["namaibu"]);
$pdkibu = mysqli_real_escape_string($conn,$dataaktif["pdkibu"]);
$nikibu = mysqli_real_escape_string($conn,$dataaktif["nikibu"]);
$pkjibu = mysqli_real_escape_string($conn,$dataaktif["pkjibu"]);
$tglibu = mysqli_real_escape_string($conn,$dataaktif["tglibu"]);
$tgbdn = mysqli_real_escape_string($conn,$dataaktif["tgbdn"]);
$jktp = mysqli_real_escape_string($conn,$dataaktif["jktp"]);
$btbdn = mysqli_real_escape_string($conn,$dataaktif["btbdn"]);
$js = mysqli_real_escape_string($conn,$dataaktif["js"]);
$jp = mysqli_real_escape_string($conn,$dataaktif["jp"]);
$rombel = mysqli_real_escape_string($conn,$dataaktif["rombel"]);
$tanggalmasuk = mysqli_real_escape_string($conn,$dataaktif["tanggalmasuk"]);
$ststj = mysqli_real_escape_string($conn,$dataaktif["ststj"]);
$ukseragam = mysqli_real_escape_string($conn,$dataaktif["ukseragam"]);
$uktopi = mysqli_real_escape_string($conn,$dataaktif["uktopi"]);
$semester = mysqli_real_escape_string($conn,$dataaktif["semester"]);
$idkelas = mysqli_real_escape_string($conn,$dataaktif["idkelas"]);
$aktifsiswa = mysqli_real_escape_string($conn,$dataaktif["aktifsiswa"]);

$sql = "UPDATE `ppdb` SET `id_ppdb`='$idppdb',`namalengkap`='$nama',`jk`='$jk',`nik`='$nik',`tl_anak`='$tanggallahir',`t_anak`='$tempatlahir',`agama_anak`='$agm',`kwn_anak`='$kwg',`alamat`='$almtlkp',`tinggal_bersama`='$tglbsm',`anak_ke`='$anakke',`usia_anak`='$usia',`no_hp`='$nhp',`nama_ayah`='$namaayah',`nik_ayah`='$nikayah',`ttl_ayah`='$tglayah',`pend_ayah`='$pdkayah',`pek_ayah`='$pkjayah',`nama_ibu`='$namaibu',`nik_ibu`='$nikibu',`ttl_ibu`='$tglibu',`pend_ibu`='$pdkibu',`pek_ibu`='$pkjibu',`tinggi_badan`='tgbdn',`berat_badan`='$btbdn',`jarak_tempuh`='$jktp',`jumlah_saudara`='$js',`jenis_pendaftaran`='$jp',`tanggal_masuk`='$tanggalmasuk',`masuk_rombel`='$rombel',`status_setuju`='1' WHERE 'id_ppdb' = '$idppdb';	";
$sql .= "UPDATE `siswa` SET `nis`='$nis',`id_ppdb`='$idppdb',`kelompok`='$rombel',`semester`='$semester',`id_kelas`='$idkelas',`ukuran_seragam`='$ukseragam',`ukuran_topi`='$uktopi',`status_siswa`='$ststj' WHERE `nis` = '$nis';";

// var_dump($sql);
// exit();

		if (mysqli_multi_query($conn, $sql)) {    
    		echo "New records created successfully";
  		} else {    
    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  		}
  		mysqli_close($conn);

}


 ?>
