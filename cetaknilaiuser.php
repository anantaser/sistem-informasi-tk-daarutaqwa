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

$result3 = mysqli_query($conn, "SELECT AVG(sosemos) AS sosemosavg FROM nilai WHERE nis = '$nis';");

$sosemos = mysqli_fetch_assoc($result3);

$result4 = mysqli_query($conn, "SELECT AVG(bahasa) AS bahasaavg FROM nilai WHERE nis = '$nis';");

$bahasa = mysqli_fetch_assoc($result4);

$result5 = mysqli_query($conn, "SELECT AVG(kognitif) AS kognitifavg FROM nilai WHERE nis = '$nis';");

$kognitif = mysqli_fetch_assoc($result5);

$result6 = mysqli_query($conn, "SELECT AVG(mototik_kasar) AS motorikkasarsavg FROM nilai WHERE nis = '$nis';");

$mototik_kasar = mysqli_fetch_assoc($result6);

$result7 = mysqli_query($conn, "SELECT AVG(motorik_halus) AS motorikhalussavg FROM nilai WHERE nis = '$nis';");

$motorik_halus = mysqli_fetch_assoc($result7);

$result8 = mysqli_query($conn, "SELECT AVG(seni) AS seniavg FROM nilai WHERE nis = '$nis';");

$seni = mysqli_fetch_assoc($result8);

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
	<title>Cetak Nilai</title>
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
    background:#5F9EA0;
    color:black;
    font-weight:bold;
    font-size:12px;
}
table th {
    vertical-align:top;
    padding:5px 10px;
    border:1px solid #000;
}
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
           <font size="7" color="blue" style="font-family: Bernard MT Condensed"><b>DAARUTAQWA</b></font><br>
           <font size="4" color="blue" style="font-family: Maiandra GD"><b>TAMAN KANAK-KANAK DAARUTAQWA</b></font>
           <br>
           <font size="2">Jl. Raya Jakarta Bogor KM. 44 P.O. Box 40 CBI Pakansari Cibinong Bogor 16915   (021) 8755974</font>
         </center>
          </td>

       </tr>
    

     </table><center>
<h1>Nilai Siswa</h1>
</center>

    <p>NIS: <?= $nis ?>   </p>
    <p>Nama: <?= $dr2['namalengkap'] ?>  </p>
    <p>Kelas:  <?= $dr['id_kelas'] ?> </p>
  
<table border="1" cellpadding="10" cellspacing="0">
 <tr>
  <th>Tanggal</th>
   
   <th>Sosemos</th>
   <th>Bahasa</th>
   <th>Kognitif</th>
   <th>Motorik Kasar</th>
   <th>Motorik Halus</th>
   <th>Seni</th>
 </tr> 
<?php while($aa = mysqli_fetch_assoc($result3)) :?>
<tr>

  <td><?= $aa['tanggalnilai'] ?></td>
  <td><?= $aa['sosemos'] ?></td>
  <td><?= $aa['bahasa'] ?></td>
  <td><?= $aa['kognitif'] ?></td>
  <td><?= $aa['mototik_kasar'] ?></td>
  <td><?= $aa['motorik_halus'] ?></td>
  <td><?= $aa['seni'] ?></td>
</tr>
<?php endwhile; ?>
  <center>
  <td>   <?= " ".$datetime ?></td>
   <td ><?= $sosemos['sosemosavg'] ?></td>
   <td><?= $bahasa['bahasaavg'] ?></td>
   <td><?= $kognitif['kognitifavg'] ?></td>
   <td><?= $mototik_kasar['motorikkasarsavg'] ?></td>
   <td><?= $motorik_halus['motorikhalussavg'] ?></td>
   <td><?= $seni['seniavg'] ?></td>
   </center>
 </tr> 
</table>


<table width="100%">
  <tr>
    <td></td>
    <td width="200px">
        <td width="200px">
      <?= "Bogor ".$datetime ?>
      <p>Mengetahui Guru/Wali Kelas <br>  <br></p>
      <br><br><p><u>Ibu Maimunah, M.Pd</u><br>NIP. 213123</p></td>
      <br><p>0 - 1 = BB (Belum Berkembang)</p>
      <p>1 - 2 = MB (Masih Berkembang)</p>
      <p>2 - 3 = BSH (Berkembang Sesuai Harapan)</p>
      <p>3 - 4 = BSB (Berkembang Sangat Baik)</p>
      <br>
      
  </tr>

</table>
</div>
</body>
<a href="#" onclick="window.print();">cetak</a>

</html>