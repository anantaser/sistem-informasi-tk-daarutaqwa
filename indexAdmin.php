<?php

session_start();

if (!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

$nis = $_SESSION['username'];

$conn = mysqli_connect("localhost","root","","sia_tk");
$result = mysqli_query($conn, "SELECT * FROM ppdb INNER JOIN siswa ON ppdb.id_ppdb = siswa.id_ppdb"); 

$dr = mysqli_fetch_assoc($result);
$nisup  = strtoupper($nis);

 ?>


<!DOCTYPE html>
<html>

  <head>
    <title>PPDB - Admin</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/ppdb.css">
<link rel="stylesheet" href="css/bukti.css">
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

<div class="container">
<div class="content">
  <form class="#">
<h1>Daftar Siswa Aktif</h1>
<div class="user-details">
<table border="1" cellpadding="10" cellspacing="0">
 <tr>
   <th>No</th>
   <th>Nama</th>
   <th>NIS</th>
   <th>Kelompok</th>
   <th>Semester</th>
   <th>Kelas</th>
  
 </tr> 
 <?php $i = 1; ?>
 <?php while($row = mysqli_fetch_assoc($result)) : ?>
 <tr>
   <td><?= $i ?></td>
   <td><?= $row['namalengkap'] ?></td>
   <td><?= $row['nis'] ?></td>
   <td><?= $row['kelompok'] ?></td>
   <td><?= $row['semester'] ?></td>
   <td><?= $row['id_kelas'] ?></td>
 </tr>
<?php $i++; ?>
<?php endwhile; ?>

</table>
<br>
<br><br>
<div class="input-box">
<br><br>

<label for="Penilaian siswa">Penilaian Siswa </label>
<input class="button" type="button" onclick="location.href='bnilaiadmin.php';" value="Check" />
<br>
<br> 
<label for="Penilaian siswa">E-Rapot </label>
<input class="button" type="button" onclick="location.href='beraporinput.php';" value="Check" />
<br>
<br> 
<label for="keuangan">Keuangan </label>
<input class="button" type="button" onclick="location.href='keuangan.php';" value="Check" />
<br>
<br>
<label for="ppdb">PPDB</label>
  <input class="button" type="button" onclick="location.href='datappdb.php';" value="Check" />

<label for="ppdb">Registrasi Akun untuk Admin</label>
  <input class="button" type="button" onclick="location.href='registrasi.php';" value="Check" />
 

  <br>
  <br>

 </form>
    </div>
    </div>
</body>


</html>
