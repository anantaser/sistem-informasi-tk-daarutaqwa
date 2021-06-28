<?php  

session_start();

$conn = mysqli_connect("localhost","root","","sia_tk");

if (!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 


$result = mysqli_query($conn,"SELECT * FROM `nilai`;");

$nilai = mysqli_fetch_assoc($result);

// var_dump($nilai);
// exit();


?>

<!DOCTYPE html>
<html>
<head>
  <title>Laporan Nilai</title>


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
<center>
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
     

     </table>
     <br>
     <h1>Laporan Nilai Siswa</h1>
     <table border="1" cellpadding="10" cellspacing="0">
 <tr>
    <th>No</th>
   <th>NIS</th>
   <th>Tanggal</th>
   <th>Bahasa</th>
   <th>Kognitif</th>
   <th>Motorik Kasar</th>
   <th>Motorik Halus</th>
   <th>Seni</th>
 </tr> 
     

<?php $i = 1; ?>
<?php while($row = mysqli_fetch_assoc($result)) :?>
<tr>
  <center>
   <td><?= $i ?></td>
   <td><?= $row['nis'] ?></td>
   <td><?= $row['tanggalnilai'] ?></td>
   <td><?= $row['bahasa'] ?></td>
   <td><?= $row['kognitif'] ?></td>
   <td><?= $row['mototik_kasar'] ?></td>
   <td><?= $row['motorik_halus'] ?></td>
   <td><?= $row['seni'] ?></td>
   </center>
 </tr> 

<?php $i++; ?>
<?php endwhile; ?>
</table>
<table width="100%">
  <tr>
    <td></td>
    <td width="150px">
      <p>Mengetahui Kepala Sekolah <br>  </p>
      <br><br><p>___________________</p>
      <p>Ibu Khodijah</p></td>
  </tr>
</table>
     
   </center>
   </div>
</body>
<a href="#" onclick="window.print();">cetak</a>
</html>
