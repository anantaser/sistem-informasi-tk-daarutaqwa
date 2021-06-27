<?php 

session_start();

require 'functions.php';

if (isset($_POST["afterppdb"])){
  // var_dump($_POST);
  // exit();
    if(afterppdb($_POST)<0) {
      echo "<script>
          alert('Data Gagal Ditambahkan!');
          document.location.href = 'afterppdb.php';
        </script>";
    } else {
      echo "<script>
          alert('Data berhasil ditambahkan!');
          document.location.href = 'akunuserbaru.php';
      </script>";
    }
  }


$nis = $_SESSION['nissession'];
// $passrand = strtoupper(substr(uniqid(rand()),0,8));

$conn = mysqli_connect("localhost","root","","sia_tk");
$result = mysqli_query($conn, "SELECT * FROM siswa WHERE nis = '$nis' ");
$dr = mysqli_fetch_assoc($result);
$q1 = $dr['id_ppdb'];

$result2 = mysqli_query($conn, "SELECT * FROM ppdb WHERE id_ppdb = '$q1';");
$dr2 = mysqli_fetch_assoc($result2);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Daftar Seragam Sekolah</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="css/styles.css">

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
    <a href="login.php" style="float:right" >Masuk/Login</a>
  </div>
</head>
<body>
  <h1>Formulir Seragam</h1>
  <form action="" method="post">
  <div class="container">
  <div class="content">
  
  <div class="user-details">
    <p>NIS:  <?= $nis ?> </p>
    <p>Nama : <?= $dr2['namalengkap'] ?></p>
    <p>Alamat : <?= $dr2['alamat'] ?></p>
    <br>
    <div class="input-box">
    <label for="UkuranTopi">Ukuran Topi :</label>
        <select id="UkuranTopi" name="ukurantopi">
          <option value="S">S</option>
          <option value="M">M</option>
          <option value="L">L</option>
          <option value="XL">XL</option>
        </select>   </div>
    <br>
    <div class="input-box">
    <label for="UkuranSeragam">Ukuran Seragam :</label>
        <select id="UkuranSeragam" name="ukuranseragam">
          <option value="S">S</option>
          <option value="M">M</option>
          <option value="L">L</option>
          <option value="XL">XL</option>
        </select>
        </div>   
  
    <div>
    </div>
    <div>
     </div>
        <button class="button" type="submit" name="afterppdb">Simpan</button>

</div>
</div>
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
