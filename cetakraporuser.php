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
<h1>Cetak Rapor Siswa</h1> </center>
     
<th>
    <p>NIS  : <?= $nis ?>   </p>
    <p>Nama : <?= $dr2['namalengkap'] ?>  </p>
    <p>Kelas:  <?= $dr['id_kelas'] ?> </p>
  </th>
<table border="1" cellpadding="10" cellspacing="0">
 <tr>
   <th>Pertumbuhan</th>
   <th>Sikap Spiritual</th>
   <th>Sikap Sosial</th>
   <th>Pengetahuan</th>
   <th>Keterampilan</th>
    </tr> 
<tr>
  <center>
   <td><?= $dr3['pertumbuhan'] ?></td>
   <td><?= $dr3['sikap_spiritual'] ?></td>
   <td><?= $dr3['sikap_sosial'] ?></td>
   <td><?= $dr3['pengetahuan'] ?></td>
   <td><?= $dr3['keterampilan'] ?></td>
   </center>
 </tr> 
</table>

<table width="100%">
  <tr>
    <td></td>
    <p>Sakit: <?= $dr3['sakit'] ?>   </p>
    <p>Izin: <?= $dr3['izin'] ?>  </p>
    <p>Alpha:  <?= $dr3['alpha'] ?> </p>
    <td></td>
    <td width="200px">
      <p>Mengetahui Guru/Wali Kelas <br>  <br></p>
      <br><br><u>Ibu Maimunah, M.Pd</u></td>
      <br>
      <?= "Tanggal Cetak : ".$datetime ?>
  </tr>
</table>
</div>
</body>
<a href="#" onclick="window.print();">cetak</a>

</html>