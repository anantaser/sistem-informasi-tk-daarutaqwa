<?php 

session_start();

require 'functions.php';

if (isset($_POST["akunuserbaru"])){
    if(akunuserbaru($_POST)<0) {
      echo "<script>
          alert('Data Gagal Ditambahkan!');
          document.location.href = 'akunuserbaru.php';
        </script>";
    } else {
      echo "<script>
          alert('Data berhasil ditambahkan!');
          document.location.href = 'logout.php';
      </script>";
    }
  }


$nis = $_SESSION['nissession'];

$passrand = strtoupper(substr(uniqid(rand()),0,8));
$password = password_hash($passrand, PASSWORD_DEFAULT);
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Berhasil Registrasi</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="css/styles.css">

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
    <a href="login.php" style="float:right" >Masuk/Login</a>
  </div>
</head>
<body>
  <h1>Formulir Seragam</h1>
  <form action="" method="post">
  <div>
    <p>Gunakan Akses Ini Untuk Login</p>
      <div class="input-box">
              <span class="details">Username / Nis</span>
              <input type="text" placeholder=""name="nis" id="nis" value="<?= $nis ?>">
            </div>
      <div class="input-box">
              <span class="details">Password</span>
              <input type="text" placeholder=""name="passrand" id="passrand" value="<?= $passrand ?>">
            </div>
            <div class="input-box">
              <input type="hidden" placeholder=""name="password" id="password" value="<?= $password ?>">
            </div>
    <p>Harap di Screenshot atau dicatat untuk Login</p>
    <p>Klik "OK" untuk menyelesaikan proses PPDB</p>
    <div class="button">
      <button type="submit" name="akunuserbaru">OK</button>
  </div>
  </form>
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
