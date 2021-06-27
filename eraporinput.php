<?php 

session_start();

if (!isset($_SESSION['username'])){
  header("location:login.php");
  exit;
}

require 'functions.php';

  $rand = strtoupper(substr(uniqid(rand()),0,6));
  $idrapot = $rand;
  $nis = $_GET["nis"];

  $nilai = query("SELECT * FROM siswa WHERE nis = '$nis'")[0];
    $ppdbtr = $nilai['id_ppdb'];

  $nilai2 = query("SELECT * FROM ppdb WHERE id_ppdb = '$ppdbtr' ")[0];

if (isset($_POST["erapor"])){
    if(frapor($_POST)<0) {
      echo "<script>
          alert('Data Gagal Ditambahkan!');
          document.location.href = 'eraporinput.php';
        </script>";
    } else {
      echo "<script>
          alert('Data berhasil ditambahkan!');
          document.location.href = 'beraporinput.php';
      </script>";
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Input Nilai Rapot</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="css/bukti.css">

  <div class="header">
    <script type="https://kit.fontawesome.com/a076d05399.js"></script>
    <img src="assets/logotk.jpg" width="200">
    <h1>TK Islam Daarutaqwa</h1>
    <p>Jl. Raya bogor, KM. 44, Pakansari, Cibinong, Bogor, West Java 16915</p>
  </div>

  <div class="topnav">
    <a href="index.php">Mengenai Kita</a>
    <a href="fotokegiatan.php">Foto Kegiatan</a>
    <a href="ppdb.php">PPDB</a>
    <a href="logout.php" style="float:right">Log Out</a>
  </div>
</head>
<body>
  
  <h1>E-Rapot Input - Sisi Admin</h1>
  <div class="container">
    <div class="content">
    <form action="" method=post>
      <div class="user-details">
     <div class="input-box">
      <label for="NIS">NIS :</label>
      <input type="text" name="NIS" id="NIS" value="<?= $nis ?>">
    </div>
    <div class="input-box">
    <label for="NamaLengkap">Nama Lengkap :</label>
    <input type="text" name="NamaLengkap" id="NamaLengkap" value="<?= $nilai2['namalengkap'] ?>">
    </div>
    <div class="input-box">
    <label for="Usia">Usia :</label>
    <input type="text" name="Usia" id="Usia" value="<?= $nilai2['usia_anak'] ?>">
    </div>
    <div class="input-box">
    <label for="Kelompok">Kelompok :</label>
    <input type="text" name="Kelompok" id="Kelompok" value="<?= $nilai['kelompok'] ?>">
    </div>
    <div class="input-box">
    <label for="Semester">Semester :</label>
    <input type="text" name="Semester" id="Semester" value="<?= $nilai['semester'] ?>">
    </div>
    <div class="input-box">
    <label for="BeratBadan">Berat Badan :</label>
    <input type="text" name="BeratBadan" id="BeratBadan" value="<?= $nilai2['berat_badan'] ?>">
    </div>
    <div class="input-box">
    <label for="TinggiBadan">Tinggi Badan :</label>
    <input type="text" name="TinggiBadan" id="TinggiBadan" value="<?= $nilai2['tinggi_badan'] ?>">
    </div>
    <!-- @ilham coba tolong di kasih separator dibawah ini -->
    <div class="input-box">
    <label for="Pertumbuhan">Pertumbuhan :</label>
    <input type="text" name="Pertumbuhan" id="Pertumbuhan">
    </div>
    <div class="input-box">
    <label for="SikapSpiritual">Sikap Spiritual :</label>
    <input type="text" name="SikapSpiritual" id="SikapSpiritual">
    </div>
    <div class="input-box">
    <label for="SikapSosial">Sikap Sosial :</label>
    <input type="text" name="SikapSosial" id="SikapSosial">
    </div>
        <div class="input-box">
    <label for="Pengetahuan">Pengetahuan :</label>
    <input type="text" name="Pengetahuan" id="Pengetahuan">
    </div>
    <div class="input-box">
    <label for="Keterampilan">Keterampilan :</label>
    <input type="text" name="Keterampilan" id="Keterampilan">
    </div>
    <div class="input-box">
    <label for="Sakit">Sakit :</label>
    <input type="text" name="Sakit" id="Sakit">
    </div>
    <div class="input-box">
    <label for="Izin">Izin :</label>
    <input type="text" name="Izin" id="Izin">
    </div>
    <div class="input-box">
    <label for="Alpha">Alpha :</label>
    <input type="text" name="Alpha" id="Alpha">
    </div>
  <!--   <div class="input-box">
    <label for="Sosemos">Sosemos :</label>
    <input type="text" name="sosemos" id="sosemos" disabled="disabled">
    </div>
    <div class="input-box">
    <label for="Bahasa">Bahasa :</label>
    <input type="text" name="Bahasa" id="Bahasa" disabled="disabled">
    </div>
    <div class="input-box">
    <label for="Kognitif">Kognitif :</label>
    <input type="text" name="Kognitif" id="Kognitif" disabled="disabled">
    </div>
    <div class="input-box">
    <label for="MotorikKasar">Motorik Kasar :</label>
    <input type="text" name="MotorikKasar" id="MotorikKasar" disabled="disabled">
    </div>
    <div class="input-box">
    <label for="MotorikHalus">Motorik Halus :</label>
    <input type="text" name="MotorikHalus" id="MotorikHalus" disabled="disabled">
    </div>
    <div class="input-box">
    <label for="Seni">Seni :</label>
    <input type="text" name="Seni" id="Seni">
    </div> -->
    <div class="input-box">
    <div class="input-box">
      <!-- <label  for="IDRapot">IDRapot :</label> -->
      <input type="hidden" name="IDRapot" id="IDRapot" value="<?= $idrapot ?>">
    </div>
      <button type="submit" name="erapor"> Simpan </button>
      <input class="" type="button" onclick="location.href='beraporinput.php';" value="Kembali"/>
    </div>
    <div>
    </div>
  </div>
  </form>
</div>
</div> 
</body>

<footer>
  <div class="kontainer">
    <div class="sec aboutus">
      <h1>TK Daarutaqwa</h1>
      <p>Merupakan TK Islam yang berlokasi di cibinong yang beralamat di jl. Raya bogor, KM. 44, Pakansari, Cibinong, Bogor, West Java 16915</p>

    </div>
    <div class="sec contact">
      <h1>Contact Info</h1>

      <ul class="info">
        <li>
          <span><i class="fa fa-map"></i></span>
          <span>Cibinong <br>
            Kab bogor <br>Indonesia</span></li>
        <li>
          <span><i class="fa fa-phone"></i></span>
          <p><a href="#">+1234567</a><br><a href="#">+1234567
          </p>
          </li>
            <li>
          <span><i class="fa fa-envelope"></i></span>
          <p><a href="#">tkislamdaarutaqwa@gmail.com</a></p>
          </li>
      </ul>
    </div>
</div>
<div class="body">
    <div class="sci">
      <li><a href="#"><span class="fa fa-facebook "></span></a></li>
      <li><a href="#"><span class="fa fa-instagram "></span></a></li>
      <li><a href="#"><span class="fa fa-twitter "></span></a></li>
      <li><a href="#"><span class="fa fa-youtube"></span></a></li>
     
      
    </div>
  </div>
</footer>
<div class="copyrightText">TK - Daarutaqwa ©2021</div>
</html>
