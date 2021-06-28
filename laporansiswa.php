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
 <center> 
 <table >
       <tr>
         <td><img src="assets/logotk.jpg" width="90" height="90"></td>
         <td>
         <center>
           <font size="4" color="blue" style="font-family: Nyla"><b>Yayasan Terpadu</b></font><br>
           <font size="6" color="blue" style="font-family: Bernard MT Condensed"><b>DAARUTTAQWA</b></font><br>
           <font size="3" color="blue" style="font-family: Maiandra GD"><b>TAMAN KANAK-KANAK DAARUTTAQWA</b></font>
           <br>
           <font size="2">Jl. Raya Jakarta Bogor KM. 44 P.O. Box 40 CBI Pakansari Cibinong Bogor 16915   (021) 8755974</font>
         </center>
          </td>

       </tr>
    

     </table>

<h1>Laporan Daftar Siswa</h1>
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
<table width="100%">
  <tr>
    <td></td>
    <td width="200px">
      <p>Mengetahui Kepala Sekolah <br>  </p>
      <br><br>
      <p><u>Ibu Khodijah </u></p></td>
  </tr>
</table>

</center>
</div>
</body>
<a href="#" onclick="window.print();">cetak</a>


</html>

