<?php

session_start();

if (!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

$nis = $_SESSION['username'];

$conn = mysqli_connect("localhost","root","","sia_tk");
$result = mysqli_query($conn, "SELECT * FROM ppdb ");

$admin = mysqli_fetch_row($result)
// var_dump ($result);




 ?>
<!DOCTYPE html>
<html>

  <head>
    <title>Dashboard Admin</title>
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
  <h1>Selamat datang , admin</h1>


</div>
<div class="container">
<div class="content">
  <form class="#">
<div class="user-details">

<table border="1" cellpadding="10" cellspacing="0">
 <tr>
   <th>No</th>
   <th>Nama</th>
   <th>NIS</th>
   <th>Kelompok</th>
   <th>Semester</th>
   <th>kelas</th>
   
 </tr> 
 <tr>
   <td>1</td>
   <td>Paijo</td>
   <td>11213</td>
   <td>2</td>
   <td>1</td>
   <td>1b</td>
 </tr>

 <tr>
   <td>1</td>
   <td>Paijo</td>
   <td>11213</td>
   <td>2</td>
   <td>1</td>
   <td>1b</td>
 </tr>
</table>
<br>
<div class="input-box">

<label for="Penilaian siswa">Penilaian Siswa </label>
    <button>Check</button>
</div>

<div class="input-box">
<label class="" for="keuangan">Keuangan </label>
    <button>Check</button>
</div>
<br>
<br>
<div class="input-box">

<label for="ppdb">PPDB</label>
  
    <button>check</button>
</div>
<br>
<br>
<div class="input-box">

<label for="laporan">Cetak Laporan</label>

    <button>cetak</button>
    </div>
    </form>
    </div>
    </div>
</body>


</html>
