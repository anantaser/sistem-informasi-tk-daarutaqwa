<?php

session_start();

require 'functions.php';

$nis = $_GET["nis"];
$rand = strtoupper(substr(uniqid(rand()),0,4));
$idnilai = $rand;

$nilai = query("SELECT * FROM siswa WHERE nis = '$nis'")[0];
echo "<br><br>"; 
$ppdbtr = $nilai['id_ppdb'];

$nilai2 = query("SELECT * FROM ppdb WHERE id_ppdb = '$ppdbtr' ")[0];

if (isset($_POST["submit"])){

  //
  if( nilaiadmin($_POST) > 0 ) {
    echo "<script>
        alert('nilai berhasil dimasukan!');
    </script>";
  } else {
    echo mysqli_error($conn);
  }
}

 ?>


<!DOCTYPE html>
<html>
<head>
  <title>Masukan Nilai Siswa</title>
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
    <a href="logout.php" style="float:right" >Log Out</a>
  </div>
</head>
<body>
  
<h1>Halaman Nilai</h1>
<div class="container">
<div class="content">
<form action="" method="post">   
<div class="user-details">

    <div class="input-box">
      <label for="ID_Nilai">ID Nilai :</label>
      <input type="text" name="nilai" id="nilai" value="<?= $rand ?>">
    </div>
    <br><br>
    <div class="input-box">
      <label for="NIS">NIS :</label>
      <input type="text" name="nis" id="nis" value="<?= $nis ?>">
    </div>
    <br><br>
    <div class="input-box">
      <label for="Nama Lengkap">Nama Lengkap :</label>
      <input type="text" name="namalengkap" id="namalengkap" value="<?= $nilai2['namalengkap']; ?>">
    </div>
    <br><br>
      <div class="input-box">
      <label for="SosialEmosional">Sosial Emosional :</label>
    <br>
    <select id="sosialemosional" name="sosialemosional">
      <!-- Tolong textnya diganti indikator, valuenya tetep angka karna mau di itung -->
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>

    </div>
    <br><br>
    <div class="input-box">
    <label for="Bahasa">Bahasa :</label>
        <br>
        <select id="bahasa" name="bahasa">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
        </div>
    <br><br>
    <div class="input-box">
    <label for="Kognitif">Kognitif :</label>
        <br>
        <select id="kognitif" name="kognitif">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>     
        </div>
    <br><br>
    <div class="input-box">
    <label for="motorikkasar">MotorikKasar :</label>
    <br>
          <select id="motorikkasar" name="motorikkasar">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>     
          </div>
    <br><br>
    <div class="input-box">
    <label for="MotorikHalus">MotorikHalus :</label>
        <br>
        <select id="motorihHalus" name="motorikhalus">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>  
        </div>
    <br><br>
    <div class="input-box">
    <label for="Seni">Seni :</label><br>
         
         <select id="Seni" name="seni">
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
         </select>   
         </div>
    <br><br> 
    <div class="input-box">
    <label for="tanggalnilai">Tanggal Nilai :</label>
    <input type="date" name="tanggalnilai" id="tanggalnilai"
    value="date"
    min="2001-01-01" max="2030-12-31"><br>
    <br><br>
    <button type="submit" name="submit"> Tambah Data! </button>
    <input type="button" onclick="location.href='bnilaiadmin.php';" value="Kembali" />
    >
  
    </div>
    <div class="input-box" >
    <button>Simpan</button></div>
    <br><br>
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
