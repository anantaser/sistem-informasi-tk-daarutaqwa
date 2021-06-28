<?php 

require 'functions.php';

session_start();

$nis = $_SESSION['username'];

$idppdb = $_GET['id_ppdb'];

if (isset($_POST["aktifsiswa"])){
	// var_dump($_POST);
	// exit();

		if(aktifsiswa($_POST)<0) {
			echo "<script>
					alert('Data Gagal Ditambahkan!');
					document.location.href = 'indexAdmin.php';
				</script>";
		} else {
			echo "<script>
					alert('data berhasil ditambahkan!');
					document.location.href = 'datappdb.php';
			</script>";
		}
	}


$conn = mysqli_connect("localhost","root","","sia_tk");
$result = mysqli_query($conn, "SELECT * FROM ppdb INNER JOIN siswa ON ppdb.id_ppdb = siswa.id_ppdb WHERE siswa.id_ppdb = '$idppdb'");

$row = mysqli_fetch_assoc($result);
$nisup  = strtoupper($nis);
// var_dump($row);
// exit();



?>


<!DOCTYPE html>
<html>
	<head>
		<title>PPDB</title>
		<link rel="stylesheet" href="css/ppdb.css">

		<div class="header">
		  <img src="assets/logotk.jpg" width="200">
		  <h1>TK Islam Daarutaqwa</h1>
		  <p>Jl. Raya bogor, KM. 44, Pakansari, Cibinong, Bogor, West Java 16915</p>
		</div>

		<div class="topnav">
		  <a href="index.php">Mengenai Kita</a>
		  <a href="fotokegiatan.php">Foto Kegiatan</a>
		  <a href="ppdb.php">PPDB</a>
		  <a href="login.php" style="float:right">Masuk/Login</a>
		</div>
	</head>

<body>

	<h1>Halaman PPDB - Review - <?= strtoupper($row['namalengkap'] )?></h1>

		<!-- <form action="afterppdb.php" method="post"> -->
		<form method=post action="">
		 <div class="container">	
 			<div class="title">A. Indentitas Calon Siswa/i</div>
	  		<div class="content">
	   	   	<form action="#" method="post">
	   	   			<div class="user-details">
		  				<br><br>
		  			<div class="input-box">
					  	<span class="details">ID PPDB </span>
					  	<br>
		  				<input type="text" name="idppdb" value="<?= $idppdb ?>">
		  			</div>
		  			<div class="user-details">
		  				<br><br>
		  			<div class="input-box">
					  	<span class="details">NIS </span>
					  	<br>
		  				<input type="text" name="nis" value="<?= $row['nis'] ?>">
		  			</div>
		  			<br>
		    		<div class="input-box">
					  	<span class="details">Nama Lengkap </span>
					  	<input type="text" placeholder="" name="nama" id="nama" value="<?= $row['namalengkap'] ?>">
		    		</div>

						<div class="input-box">
							<span class="details">Alamat Lengkap</span>
							<input type="text" placeholder=""name="almtlkp" id="almtlkp" value="<?= $row['alamat'] ?>">
						</div>

						<div class="input-box">
							<span class="details">Jenis Kelamin </span>
							<input type="text" placeholder=""name="jk" id="jk" value="<?= $row['jk'] ?>">
						</div>			
			
						<div class="input-box">
							<span class="details">Tinggal Bersama</span>
							<input type="text" placeholder=""name="tglbsm" id="tglbsm" value="<?= $row['tinggal_bersama'] ?>">
						</div>
				
						<div class="input-box">
							<span class="details">NIK</span>
							<input type="text" placeholder=""name="nik" id="nik" value="<?= $row['nik'] ?>">			
						</div>			
			
						<div class="input-box">
							<span class="details">Anak Ke :</span>
							<input type="text" placeholder=""name="anakke" id="anakke" value="<?= $row['anak_ke'] ?>">
						</div>
			
						<div class="input-box">
							<span class="details">Tempat Lahir</span>
							<input type="text" placeholder=""name="tempatlahir" id="tempatlahir" value="<?= $row['t_anak'] ?>">

						</div>

						<div class="input-box">
							<span class="details">Tanggal Lahir</span>
							<input type="date" placeholder=""name="tanggallahir" id="tanggallahir" value="<?= $row['tl_anak'] ?>">	
						</div>
					
						<div class="input-box">
							<span class="details">Usia</span>
							<input type="text" placeholder=""name="usia" id="usia" value="<?= $row['usia_anak'] ?>">
						</div>

						<div class="input-box">
							<span class="details">Agama :</span>
							<input type="text" placeholder=""name="agm" id="agm" value="<?= $row['agama_anak'] ?>">
						</div>	

						<div class="input-box">
							<span class="details">NO HP :</span>
							<input type="text" placeholder=""name="nhp" id="nhp" value="<?= $row['no_hp'] ?>">
						</div>		
					
						<div class="input-box">
							<span class="details">Kewarganegaraan :</span>
							<input type="text" placeholder=""name="kwg" id="kwg" value="<?= $row['kwn_anak'] ?>">
						</div>	
					
					</div>
			
        	<div class="title">B. Indentitas Orang Tua / Wali</div>
        		<br>

        		<div>1. Ayah Kandung</div>
        		<br>
        			<div class="user-details">
			    			<div class="input-box">
						  		<span class="details">Nama Ayah </span>
						 			<input type="text" placeholder=""name="namaayah" id="namaayah" value="<?= $row['nama_ayah'] ?>">
			    			</div>
					
								<div class="input-box">
									<span class="details">Pendidikan Ayah </span>
									<input type="text" placeholder="" name="pdkayah" id="pdkayah" value="<?= $row['pend_ayah'] ?>">
								</div>
					
								<div class="input-box">
									<span class="details">NIK</span>
									<input type="text" placeholder="" name="nikayah" id="nikayah" value="<?= $row['nik_ayah'] ?>">
								</div>
					
								<div class="input-box">
										<span class="details">Pekerjaan Ayah </span>
									<input type="text" placeholder=""name="pkjayah" id="pkjayah" value="<?= $row['pek_ayah'] ?>">			
								</div>

								<div class="input-box">
									<span class="details">Tanggal lahir :</span>
									<input type="text" placeholder="Kota, Hari Bulan Tahun" name="tglayah" id="tglayah" value="<?= $row['ttl_ayah'] ?>">
								</div>				
						</div>


						<div>2. Ibu Kandung</div>
						<br>
        			<div class="user-details">
								
							<div class="input-box">
					  		<span class="details">Nama Ibu </span>
					  		<input type="text" placeholder="" name="namaibu" id="namaibu" value="<?= $row['nama_ibu'] ?>">
		    			</div>
		    
							<div class="input-box">
								<span class="details">Pendidikan Ibu </span>
								<input type="text" placeholder="" name="pdkibu" id="pdkibu" value="<?= $row['pend_ibu'] ?>">
							</div>
			
							<div class="input-box">
								<span class="details">NIK</span>
								<input type="text" placeholder="" name="nikibu" id="nikibu" value="<?= $row['nik_ibu'] ?>">
							</div>
			
							<div class="input-box">
									<span class="details">Pekerjaan Ibu :</span>
								<input type="text" placeholder=""name="pkjibu" id="pkjibu" value="<?= $row['pek_ibu'] ?>">			
							</div>
			
							<div class="input-box">
								<span class="details">Tanggal Lahir
								</span>
								<input type="text" placeholder="Kota, Hari Bulan Tahun" name="tglibu" id="tglibu" value="<?= $row['ttl_ibu'] ?>">
							</div>
						</div>
				
					<div class="title">C. PERIODIK</div>
        		<br>
        	
        		<div class="user-details">
		    			<div class="input-box">
					  		<span class="details">Tinggi Badan (Centimeter) </span>
					  		<input type="text" placeholder="" name="tgbdn" id="tgbdn" value="<?= $row['tinggi_badan'] ?>"> 
		    			</div>
		    
							<div class="input-box">
								<span class="details">Jarak Tempuh (Kilometer)</span>
								<input type="text" placeholder="" name="jktp" id="jktp" value="<?= $row['jarak_tempuh'] ?>">
							</div>
			
							<div class="input-box">
								<span class="details">Berat Badan (Kilo Gram)</span>
								<input type="text" placeholder="" name="btbdn" id="btbdn" value="<?= $row['berat_badan'] ?>"> <p>*Koma menggunakan Simbol Titik "."</p>
							</div>
			
							<div class="input-box">
									<span class="details">Jumlah Saudara </span>
								<input type="text" placeholder=""name="js" id="js" value="<?= $row['jumlah_saudara'] ?>">			
							</div>
						</div>

					<div class="title"> D.Register</div>
				 		<br>
				 		<div class="rombel">Jenis Pendaftaran</div>
				 		<div class="input-box">
						<input type="text" placeholder=""name="jp" id="jp" value="<?= $row['jenis_pendaftaran'] ?>">	
						</div>

						<br>
        	<div class="rombel"> Rombel </div>
        	<div class="gender-details">
	        	<div class="input-box">
				<input type="text" placeholder=""name="rombel" id="rombel" value="<?= $row['masuk_rombel'] ?>">	
				</div>
			</div>
			<br>
        	<div class="user-details">
		    		<div class="input-box">
					  <span class="details">Tanggal masuk sekolah </span>
					  <input type="date" placeholder="" name="tanggalmasuk" id="tanggalmasuk" value="<?= $row['tanggal_masuk'] ?>">	
					</div>
		    		</div>
			</div>
			<div class="user-details">
		    		<div class="input-box">
					  <span class="details">Status Menyetujui Data Benar </span>
					  <span>(1 = Setuju | 0 = Tidak)</span>
					  <input type="text" placeholder="" name="ststj" id="ststj" value="<?= $row['status_setuju'] ?>">	
					</div>
		    		
		    		<div class="input-box">
					  <span class="details">Ukuran Seragam</span>
					  <input type="text" placeholder="" name="ukseragam" id="ukseragam" value="<?= $row['ukuran_seragam'] ?>">	
					</div>
		    		<div class="input-box">
					  <span class="details">Ukuran Topi</span>
					  <input type="text" placeholder="" name="uktopi" id="uktopi" value="<?= $row['ukuran_topi'] ?>">
					</div>
		    		</div>
			<div class="title">E.Sisi Admin</div>
			<br>
			<div class="rombel">Semester</div>
				<div class="input-box">
				<input type="text" placeholder=""name="semester" id="semester" value="<?= $row['semester'] ?>">	
				</div>

			<br>
        	<div class="rombel"> ID Kelas </div>
        	<div class="gender-details">
	        	<div class="input-box">
				<input type="text" placeholder=""name="idkelas" id="idkelas" value="<?= $row['id_kelas'] ?>">	
				</div>
			</div>

			<br>
        	<input type="checkbox" name="ststj" id="dot2" value="aktif">
	        <label>Menyetujui Siswa Menjadi Siswa Aktif</label>	        
	       	<br>
	       	<br>
        	<input type="checkbox" name="ststj" id="dot2" value="tidak aktif">
	        <label>Menngubah Siswa Menjadi Siswa Tidak Aktif</label>	        
	       	<br>

        	<button type="submit" name="aktifsiswa" id="aktifsiswa">Simpan dan Update Menjadi Siswa Aktif</button>
        	<br>
			<input class="button" type="button" onclick="location.href='datappdb.php';" value="Kembali" />


        	</div>
			</div>
			</div>

		  	</form>	
		  </form>	
		</div>
 	</div>
	</body>
</html>
