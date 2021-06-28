<?php

session_start();

if (!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

$nis = $_SESSION['username'];

$conn = mysqli_connect("localhost","root","","sia_tk");
$result = mysqli_query($conn, "SELECT * FROM ppdb INNER JOIN siswa ON ppdb.id_ppdb = siswa.id_ppdb WHERE siswa.status_siswa = 'Review'");

$dr = mysqli_fetch_assoc($result);

$res = mysqli_query($conn, "SELECT * FROM ppdb INNER JOIN siswa ON ppdb.id_ppdb = siswa.id_ppdb WHERE status_siswa = 'Aktif'");

$nisup  = strtoupper($nis);

$res2 = mysqli_query($conn, "SELECT * FROM ppdb INNER JOIN siswa ON ppdb.id_ppdb = siswa.id_ppdb WHERE status_siswa = 'tidak aktif'");

$nisup  = strtoupper($nis);

 ?>


<!DOCTYPE html>
<html>

  <head>
    <title>Dashboard Admin</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/ppdb.css">
<link rel="stylesheet" href="css/bukti.css">
    <style type="text/css">
  
.contain{
    position: relative;
    z-index: 1;
    max-width: 650px;
     margin: 0 auto 100px; 
    width: 100%;
    background-color: #fff;
    padding: 25px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.15);
    
  }

</style>

    <div class="header">
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
<div>
  <h1>Selamat Datang, <?= $nisup ?></h1>


</div>
<div class="contain">
<div class="content">
  <form class="#">
<h1>Daftar Review PPDB</h1>
<div class="user-details">
<table border="1" cellpadding="10" cellspacing="0">
 <tr>
   <th>No</th>
   <th>Nama</th>
   <th>NIS</th>
   <th>ID PPDB</th>
   <th>Kelompok</th>
   <th>Status Siswa</th>
   <th>Aksi</th>
  
 </tr> 
 <?php $i = 1; ?>
 <?php while($row = mysqli_fetch_assoc($result)) : ?>
 <tr>
   <td><?= $i ?></td>
   <td><?= $row['namalengkap'] ?></td>
   <td><?= $row['nis'] ?></td>
   <td><?= $row['id_ppdb'] ?></td>
   <td><?= $row['kelompok'] ?></td>
   <td><?= $row['status_siswa'] ?></td>
   <td>
     <a href="reviewppdb.php?id_ppdb=<?= $row['id_ppdb'] ?>">Tinjau Siswa</a>
   </td>

 </tr>
  <?php $i++; ?>
  <?php endwhile; ?>

</table>
<br>
<h1>Daftar Siswa Aktif</h1>
<table border="1" cellpadding="10" cellspacing="0">
 <tr>
   <th>No</th>
   <th>Nama</th>
   <th>NIS</th>
   <th>ID PPDB</th>
   <th>Kelompok</th>
   <th>Status Siswa</th>
   <th>Aksi</th>
 </tr> 

  <?php $a = 1; ?>
  <?php while($row2 = mysqli_fetch_assoc($res)) : ?>
 <tr>
  
  <td><?= $a ?></td>
   <td><?= $row2['namalengkap'] ?></td>
   <td><?= $row2['nis'] ?></td>
   <td><?= $row2['id_ppdb'] ?></td>
   <td><?= $row2['kelompok'] ?></td>
   <td><?= $row2['status_siswa'] ?></td>
   <td>
     <a href="reviewppdb.php?id_ppdb=<?= $row2['id_ppdb'] ?>">Tinjau Siswa</a>
   </td>
     
 </tr>
 <?php $a++; ?>
  <?php endwhile; ?>
  
</table>
<br>
<h1>Daftar Siswa Tidak Aktif</h1>
<table border="1" cellpadding="10" cellspacing="0">
 <tr>
   <th>No</th>
   <th>Nama</th>
   <th>NIS</th>
   <th>ID PPDB</th>
   <th>Kelompok</th>
   <th>Status Siswa</th>
   <th>Aksi</th>
 </tr> 

  <?php $a = 1; ?>
  <?php while($row3 = mysqli_fetch_assoc($res2)) : ?>
 <tr>
  
  <td><?= $a ?></td>
   <td><?= $row3['namalengkap'] ?></td>
   <td><?= $row3['nis'] ?></td>
   <td><?= $row3['id_ppdb'] ?></td>
   <td><?= $row3['kelompok'] ?></td>
   <td><?= $row3['status_siswa'] ?></td>
   <td>
     <a href="reviewppdb.php?id_ppdb=<?= $row3['id_ppdb'] ?>">Tinjau Siswa</a>
   </td>
     
 </tr>
 <?php $a++; ?>
  <?php endwhile; ?>
  
</table>
    <input class="button" type="button" onclick="location.href='indexAdmin.php';" value="Kembali" />
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
