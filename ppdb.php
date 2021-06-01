<?php 

require 'functions.php';

if (isset($_POST["ppdb"])){

	if( ppdb($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil ditambahkan!');
		</script>";
	} else {
		echo mysqli_error($conn);
	}
}

 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Halaman PPDB</title>
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
		  <a href="login.php" style="float:right" >Masuk/Login</a>
		</div>
	</head>

<body>

	<h1>Halaman PPDB</h1>

		<form action="" method="post">

		 <div class="container">	
 			<div class="title">A. Indentitas Calon Siswa/i</div>
	  	<div class="content">
	   	   	<form action="#">
		  			<div class="user-details">
		  				<br><br>
		    		<div class="input-box">
					  	<span class="details">Nama Lengkap </span>
					  	<input type="text" placeholder="" name="nama" id="nama">
		    		</div>

						<div class="input-box">
							<span class="details">Alamat Lengkap </span>
							<input type="text" placeholder="" 	="almtlkp" id="almtlkp">
						</div>
			
						<div class="input-box">
							<span class="details">Jenis Kelamin </span>
							<input type="text" placeholder=""name="jk" id="jk">
						</div>			
			
						<div class="input-box">
							<span class="details">Tinggal Bersama</span>
							<input type="text" placeholder=""name="tglbsm" id="tglbsm">
						</div>
				
						<div class="input-box">
							<span class="details">NIK</span>
							<input type="text" placeholder=""name="nik" id="nik">			
						</div>			
			
						<div class="input-box">
							<span class="details">Anak Ke :</span>
							<input type="text" placeholder=""name="anakke" id="anakke">
						</div>
			
						<div class="input-box">
							<span class="details">Tempat Lahir</span>
							<input type="text" placeholder=""name="tempatlahir" id="tempatlahir">	
						</div>

						<div class="input-box">
							<span class="details">Tanggal Lahir</span>
							<input type="text" placeholder=""name="tanggallahir" id="tanggallahir">	
						</div>
					
						<div class="input-box">
							<span class="details">Usia</span>
							<input type="text" placeholder=""name="usia" id="usia">
						</div>

						<div class="input-box">
							<span class="details">Agama :</span>
							<input type="text" placeholder=""name="agm" id="agm">
						</div>	

						<div class="input-box">
							<span class="details">NO HP :</span>
							<input type="text" placeholder=""name="nhp" id="nhp">
						</div>		
					
						<div class="input-box">
							<span class="details">Kewarganegaraan :</span>
							<input type="text" placeholder=""name="kwg" id="kwg">
						</div>	
					
					</div>
			
        	<div class="title">B. Indentitas Orang Tua / Wali</div>
        		<br>

        		<div>1. Ayah Kandung</div>
        			<div class="user-details">
			    			<div class="input-box">
						  		<span class="details">Nama Ayah </span>
						 			<input type="text" placeholder=""name="namaayah" id="namaayah">
			    			</div>
					
								<div class="input-box">
									<span class="details">Pendidikan Ayah </span>
									<input type="text" placeholder="" name="pdkayah" id="pdkayah">
								</div>
					
								<div class="input-box">
									<span class="details">NIK</span>
									<input type="text" placeholder="" name="nikayah" id="nikayah">
								</div>
					
								<div class="input-box">
										<span class="details">Pekerjaan Ayah </span>
									<input type="text" placeholder=""name="pkjayah" id="pkjayah">			
								</div>
					
								<div class="input-box">
									<span class="details">Tanggal lahir :</span>
									<input type="text" placeholder="" name="tglayah" id="tglayah">
								</div>			
						</div>


						<div>2. Ibu Kandung</div>
        			<div class="user-details">
								
							<div class="input-box">
					  		<span class="details">Nama Ibu </span>
					  		<input type="text" placeholder="" name="namaibu" id="namaibu">
		    			</div>
		    
							<div class="input-box">
								<span class="details">Pendidikan Ibu </span>
								<input type="text" placeholder="" name="pdkibu" id="pdkibu">
							</div>
			
							<div class="input-box">
								<span class="details">NIK</span>
								<input type="text" placeholder="masukan tanggal lahir"name="nikibu" id="nikibu">
							</div>
			
							<div class="input-box">
									<span class="details">Pekerjaan Ibu :</span>
								<input type="text" placeholder=""name="pkjibu" id="pkjibu">			
							</div>
			
							<div class="input-box">
								<span class="details">Tanggal Lahir
								</span>
								<input type="text" placeholder="" name="tglibu" id="tglibu">
							</div>
				
					
						</div>
				
					<div class="title">C. PERIODIK</div>
        		<br>
        	
        		<div class="user-details">
		    			<div class="input-box">
					  		<span class="details">Tinggi Badan </span>
					  		<input type="text" placeholder="" name="tgbdn" id="tgbdn">
		    			</div>
		    
							<div class="input-box">
								<span class="details">Jarak Tempuh </span>
								<input type="text" placeholder="" name="jktp" id="jktp">
							</div>
			
							<div class="input-box">
								<span class="details">Berat Badan</span>
								<input type="text" placeholder="" name="btbdn" id="btbdn">
							</div>
			
							<div class="input-box">
									<span class="details">Jumlah Saudara </span>
								<input type="text" placeholder=""name="js" id="js">			
							</div>
						</div>

					<div class="title"> D.Register</div>
				 		<br>
							<div class="gender-details">
			          <input type="radio" name="jenis" id="jenis1" value="Siswa Baru">
			          <input type="radio" name="jenis" id="jenis2" value="Pindahan">
			          <input type="radio" name="jenis" id="jenis3" value="Sekolah Lagi">
			          <span class="gender-title">Jenis Pendaftaran</span>
         			<div class="category">
            		<label for="dot-1">
            			<span class="dot one"></span>
            			<span class="gender">Siswa Baru</span>
          			</label>
			          <label for="dot-2">
			            <span class="dot two"></span>
			            <span class="gender">Pindahan</span>
			          </label>
			          <label for="dot-3">
			            <span class="dot three"></span>
			            <span class="gender">Sekolah Lagi</span>
			          </label>
          		</div> 
        	</div>
        		<br>

        <div class="rombel"> Rombel </div>
        	<div class="gender-details">
	        	<input type="checkbox" name="rombel" id="dot1" value="Kelompok A">
	        	<label>Kelompok A</label>
	        	<br>
	        	<input type="checkbox" name="rombel" id="dot2" value="Kelompok B">
	        	<label>Kelompok B</label>
					</div>

        	<div class="user-details">
		    		<div class="input-box">
					  <span class="details">Tanggal masuk sekolah </span>
					  <input type="text" placeholder="" name="tglmskskl" id="tglmskskl">
		    	</div>
		    
					<div class="input-box">
						<span class="details">No Induk Siswa </span>
						<input type="text" placeholder="" name="nis" id="nis">
					</div>
					</div>

					<!-- Button untuk menyimpan -->
        	<div class="button">
        		<button type="submit" name="ppdb">Simpan</button>
        	</div>
		
		  	</form>	
		  </form>	
		</div>
 	</div>
	</body>
</html>