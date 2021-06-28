<?php 

require 'functions.php';

session_start();

if (!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

$nis = $_SESSION['username'];
$datetime = date("Y-m-d");


$conn = mysqli_connect("localhost","root","","sia_tk");
$result = mysqli_query($conn, "SELECT * FROM siswa WHERE nis='$nis'");

$dr = mysqli_fetch_assoc($result);
$qu = $dr['id_ppdb'];

$result2 = mysqli_query($conn, "SELECT * FROM ppdb WHERE id_ppdb = '$qu';");

$dr2 = mysqli_fetch_assoc($result2);
$nisup = strtoupper($nis);

$result3 = mysqli_query($conn, "SELECT * FROM e_rapor WHERE nis = '$nis';");

$dr3 = mysqli_fetch_assoc($result3);

// var_dump($dr);
// echo"<br><br>";
// var_dump($dr2);
// echo"<br><br>";
// var_dump($dr3);
// exit();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Cetak Rapor</title>
	<style type="text/css">
		.konten{
		  position: relative;
    z-index: 1;
    max-width: 600px;
     margin: 0 auto 100px; 
    width: 100%;
    background-color: #fff;
    padding: 25px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.15);
  
		}

table{
    border-collapse:collapse;
    font:normal normal 12px Verdana,Arial,Sans-Serif;
    color:#333333;
}
/* Mengatur warna latar, warna teks, ukruan font dan jenis bold (tebal) pada header tabel */
table th {
  border-collapse: collapse;
    background:#5F9EA0;
    color:black;
    font-weight:bold;
    font-size:12px;

	</style>
</head>
<body>
	<div class="konten">
	   
     <table >
       <tr>
         <td><img src="assets/logotk.jpg" width="90" height="90"></td>
         <td>
         <center>
           <font size="4" color="blue" style="font-family: Nyla"><b>Yayasan Terpadu</b></font><br>
           <font size="6" color="blue" style="font-family: Bernard MT Condensed"><b>DAARUTAQWA</b></font><br>
           <font size="3" color="blue" style="font-family: Maiandra GD"><b>TAMAN KANAK-KANAK DAARUTAQWA</b></font>
           <br>
           <font size="2">Jl. Raya Jakarta Bogor KM. 44 P.O. Box 40 CBI Pakansari Cibinong Bogor 16915   (021) 8755974</font>
         </center>
          </td>

       </tr>
    

     </table><center>
<h1>Rapor Siswa</h1> </center>
     
     <table width="100%">
<td width="400px">
    <p><b>NIS  : <?= $nis ?>  </b> </p>
    <p><b>Nama : <?= $dr2['namalengkap'] ?></b> </p>
    <p><b>Kelas:  <?= $dr['id_kelas'] ?> </b></p>
  </td>
  <td width="100px">
    <p><b>Sakit: <?= $dr3['sakit'] ?> </b>   </p>
    <p><b>Izin: <?= $dr3['izin'] ?>  </b> </p>
    <p><b>Alpha:  <?= $dr3['alpha'] ?></b>  </p>
   
  </td>
  </table>
<table border="1" cellpadding="10" cellspacing="0">
 
<tr>
  <th>Pertumbuhan</th>
  <td><?= $dr3['pertumbuhan'] ?>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
</tr>
<tr>
  <th>Sikap Spiritual</th>
  <td><?= $dr3['sikap_spiritual'] ?>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
</tr>
<tr>
  <th>Sikap Sosial</th>
  <td><?= $dr3['sikap_sosial'] ?>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
</tr>
<tr>
  <th>Pengetahuan</th>
  <td><?= $dr3['pengetahuan'] ?>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
</tr>
<tr>
  <th>Keterampilan</th>
  <td><?= $dr3['keterampilan'] ?>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
</tr>

</table>
<table width="100%">
  <tr>
    <td></td>
     <td></td>
<!-- <td>
  <div style="width:400px;float:right">
    Denpasar, 10 Maret 2012
    <br/>Kepala Sekolah Taman Kanak kanak
    <br><br><br>
    <p>Nama<br/>NIP. 1234</p>
  </div>
  <div style="clear:both"></div>
</td>
 --> 
 <td width="400px">
      <?= "Bogor ".$datetime ?>
      <p>Mengetahui kepala Taman Kanak-kanak <br>  <br></p>
      <br><br><p><u>Ibu Maimunah, M.Pd</u><br>NIP.12312</p></td>
      <br> 
        <td width="200px">
      <?= "Bogor ".$datetime ?>
      <p>Mengetahui Guru/Wali Kelas <br>  <br></p>
      <br><br><p><u>Ibu Maimunah, M.Pd</u><br>NIP. 213123</p></td>
      <br>
      
  </tr>
</table>
</div>
</body>
<a href="#" onclick="window.print();">cetak</a>

</html>