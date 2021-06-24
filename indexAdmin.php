<?php  
$conn = mysqli_connect("localhost","root","","sia_tk");

 ?>
<!DOCTYPE html>
<html>

  <head>
    <title>Index admin</title>
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
<div>
  <h1>Selamat datang , admin</h1>


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

<label for="Penilaian siswa">Penilaian Siswa </label>
    <button>Check</button>

<br>
<label for="keuangan">Keuangan </label>
    <button>Check</button>
<br>
<label for="ppdb">PPDB</label>
    <button>check</button>

<br>
<label for="laporan">cetaklaporan</label>
    <button>cetak</button>
    </div>
<!-- Begin Wrapper -->
<div id="wrapper">
  <!-- Begin Header -->
  <div id="header"><h1><a href="http://www.free-css.com/free-css-layouts.php">Free CSS Layouts</a></h1></div>
  <!-- End Header -->
  <!-- Begin Navigation -->
  <div id="navigation"> Navigation Here </div>
  <!-- End Navigation -->
  <!-- Begin Left Column -->
  <div id="leftcolumn"> Left Column </div>
  <!-- End Left Column -->
  <!-- Begin Right Column -->
  <div id="rightcolumn"> Right Column </div>
  <!-- End Right Column -->
  <!-- Begin Footer -->
  <div id="footer"> This is the Footer </div>
  <!-- End Footer -->
 </div>
<!-- End Wrapper -->
</body>
</html>
