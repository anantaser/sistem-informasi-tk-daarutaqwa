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

$result3 = mysqli_query($conn, "SELECT * FROM nilai WHERE nis = '$nis';");

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
	</style>
</head>
<body>
	<div class="konten">
	   <table>
       <tr>
         <td><img src="assets/logotk.jpg" width="90" height="90"></td>
         <td>
         <center>
           <font size="4" color="black" style="font-family: Nyla"><b>Data Hasil Belajar Siswa</b></font><br>
          
           <font size="4" color="black" style="font-family: Maiandra GD"><b>Nilai Siswa</b></font>
           <br><br>
           <font size="2">______________________________________________________________________</font>
         </center>
          </td>

       </tr>
     

     </table>
     <br><br>

    <p>NIS: <?= $nis ?>   </p>
    <p>Nama: <?= $dr2['namalengkap'] ?>  </p>
    <p>Kelas:  <?= $dr['id_kelas'] ?> </p>
  
<table border="1" cellpadding="10" cellspacing="0">
 <tr>
   <th>Sosemos</th>
   <th>Bahasa</th>
   <th>Kognitif</th>
   <th>Motorik Kasar</th>
   <th>Motorik Halus</th>
   <th>Seni</th>
 </tr> 
<tr>
  <center>
   <td><?= $dr3['sosemos'] ?></td>
   <td><?= $dr3['bahasa'] ?></td>
   <td><?= $dr3['kognitif'] ?></td>
   <td><?= $dr3['mototik_kasar'] ?></td>
   <td><?= $dr3['motorik_halus'] ?></td>
   <td><?= $dr3['seni'] ?></td>
   </center>
 </tr> 
</table>


<table width="100%">
  <tr>
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