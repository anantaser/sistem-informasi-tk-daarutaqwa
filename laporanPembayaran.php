<?php 

session_start();


if (!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

$nis = $_SESSION['username'];

$conn = mysqli_connect("localhost","root","","sia_tk");

$result = mysqli_query($conn, "SELECT * FROM ppdb INNER JOIN siswa ON ppdb.id_ppdb = siswa.id_ppdb INNER JOIN bukti_pembayaran ON bukti_pembayaran.nis = siswa.nis");

$dr = mysqli_fetch_assoc($result);




 ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
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
    


     </table>
<center>
<h1>laporan Pembayaran</h1>
</center>
    <table border="1" cellpadding="10" cellspacing="0">


     <tr>
       <th>ID Pembayaran</th>
       <th>NIS</th>
       <th>Jumlah Bayar</th>
       <th>Bulan Bayar</th>
       <th>Keterangan Bayar</th>
       <!-- <th>Status Bayar</th> -->
       <th>Kategori</th>

      
       
     </tr> 
     <?php while($row = mysqli_fetch_assoc($result)) :?>
     <tr>
       <td><?= $row['id_bukti'] ?></td>
       <td><?= $row['nis'] ?></td>
       <td>Rp.<?= $row['jumlah_bayar'] ?></td>
       <td><?= $row['bulan_bayar'] ?></td>
       <td><?= $row['keterangan_bayar'] ?></td>
       <td><?= $row['kategoribukti'] ?></td>
     </tr>
     <?php endwhile; ?>
    </table>

<table width="100%">
  <tr>
    <td></td>
    <td width="200px">
        <td width="200px">
      
      <p>Mengetahui Kepala Sekolah Taman Kanak-kanak <br>  <br></p>
      <br><br><p><u>Ibu Maimunah, M.Pd</u><br>NIP. 213123</p></td>
      
  </tr>

</table>

</div>
</body>
<a href="#" onclick="window.print();">cetak</a>

</html>
