<?php

session_start();

if (!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

$nis = $_SESSION['username'];

$conn = mysqli_connect("localhost","root","","sia_tk");
$result = mysqli_query($conn, "SELECT * FROM ppdb ");

// $admin = mysqli_fetch_assoc($result);

$result2 = mysqli_query($conn, "SELECT * FROM siswa ");
$nisup = strtoupper($nis);

 ?>


<!DOCTYPE html>
<html>

  <head>
    <title>Dashboard Admin</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      <a href="logout.php" style="float:right">Log Out</a>
    </div>
  </head>



<body>
<div>
  <h1>Selamat Datang, <?= $nisup ?></h1>


</div>
<div class="container">
<table border="1" cellpadding="10" cellspacing="0">
 <tr>
   <th>No</th>
   <th>Nama</th>
   <th>NIS</th>
   <th>Kelompok</th>
   <th>Semester</th>
   <th>kelas</th>
   
 </tr> 
 <?php $i = 1; ?>
 <?php while($row = mysqli_fetch_assoc($result)) : ?>
  <?php while($row2 = mysqli_fetch_assoc($result2)) :?>
 <tr>
   <td><?= $i ?></td>
   <td><?= $row['namalengkap'] ?></td>
   <td><?= $row2['nis'] ?></td>
   <td><?= $row2['kelompok'] ?></td>
   <td><?= $row2['semester'] ?></td>
   <td><?= $row2['id_kelas'] ?></td>
 </tr>
<?php $i++; ?>
<?php endwhile; ?>
<?php endwhile; ?>

</table>
<br>
<label for="Penilaian siswa">Penilaian Siswa </label>
<input type="button" onclick="location.href='bnilaiadmin.php';" value="Check" />
<br>
<br> 
<label for="Penilaian siswa">E-Rapot </label>
<input type="button" onclick="location.href='eraporinput.php';" value="Check" />
<br>
<br> 
<label for="keuangan">Keuangan </label>
<input type="button" onclick="location.href='keuangan.php';" value="Check" />
<br>
<br>
<label for="ppdb">PPDB</label>
<input type="button" onclick="location.href='data.php';" value="Check" />
<br>
<br>
<label for="laporan">Cetak Laporan</label>
    <button>cetak</button>
    </div>
</body>


</html>
