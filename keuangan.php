<?php 

session_start();

if (!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

$nis = $_SESSION['username'];

$conn = mysqli_connect("localhost","root","","sia_tk");

$result = mysqli_query($conn, "SELECT * FROM ppdb INNER JOIN siswa ON ppdb.id_ppdb = siswa.id_ppdb INNER JOIN bukti_pembayaran ON bukti_pembayaran.nis = siswa.nis WHERE kategoribukti = 'SPP';");
$res = mysqli_query($conn, "SELECT * FROM ppdb INNER JOIN siswa ON ppdb.id_ppdb = siswa.id_ppdb INNER JOIN bukti_pembayaran ON bukti_pembayaran.nis = siswa.nis WHERE kategoribukti = 'Pengembangan';");


$dr = mysqli_fetch_assoc($result);
$dr2 = mysqli_fetch_assoc($res);
// var_dump($dr);
// var_dump($dr2);
// exit();

// $result2 = mysqli_query($conn, "SELECT * FROM `bukti_pembayaran`");

// $dr2 = mysqli_fetch_assoc($result2);

// // var_dump($dr);
// var_dump($dr2);
// exit();



 ?>



<!DOCTYPE html>
<html>
<head>
  <title>Status Pembayaran</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/bukti.css">
<style type="text/css">
  
.contain{
    position: relative;
    z-index: 1;
    max-width: 1000px;
     margin: 0 auto 100px; 
    width: 100%;
    background-color: #fff;
    padding: 25px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.15);
    
  }

</style>
  <div class="header">
    <script type="https://kit.fontawesome.com/a076d05399.js"></script>
    <img src="assets/logotk.jpg" width="200">
    <h1>TK Islam Daarutaqwa</h1>
    <p>Jl. Raya bogor, KM. 44, Pakansari, Cibinong, Bogor, West Java 16915</p>
  </div>

  <div class="topnav">
    <a href="index.php">Mengenai Kita</a>
    <a href="fotokegiatan.php">Foto Kegiatan</a>
    <a href="ppdb.php">PPDB</a>
    <a href="login.php" style="float:right" >Log Out</a>
  </div>
</head>
<body>
<br><br><br>
  <div class="contain">
  <h1>Daftar Upload Bukti Pembayaran</h1>
  
    <div class="content">

<div class="content">
<form class="#">
<h1>Daftar Upload Bukti Pembayaran SPP</h1>
<div class="user-details">
    <table border="1" cellpadding="10" cellspacing="0">


     <tr>
       <th>ID Pembayaran</th>
       <th>NIS</th>
       <th>Jumlah Bayar</th>
       <th>Bulan Bayar</th>
       <th>Keterangan Bayar</th>
       <!-- <th>Status Bayar</th> -->
       <th>Kategori</th>
       <th>Bukti Pembayaran</th>
      
       
     </tr> 
     <?php while($row = mysqli_fetch_assoc($result)) :?>
     <tr>
       <td><?= $row['id_bukti'] ?></td>
       <td><?= $row['nis'] ?></td>
       <td><?= $row['jumlah_bayar'] ?></td>
       <td><?= $row['bulan_bayar'] ?></td>
       <td><?= $row['keterangan_bayar'] ?></td>
       <td><?= $row['kategoribukti'] ?></td>
       <td>
         <a href="img/<?= $row['imageupload'] ?>"><?= $row['imageupload'] ?></a>
       </td>
     </tr>
     <?php endwhile; ?>
    </table>
    <input class="button" type="button" onclick="location.href='laporanPembayaran.php';" value="Cetak Laporan" />
    
    <br>
    <br>

    <div class="user-details">
    <h1>Daftar Upload Bukti Pembayaran Pengembangan</h1>

    <table border="1" cellpadding="10" cellspacing="0">


     <tr>
       <th>ID Pembayaran</th>
       <th>NIS</th>
       <th>Jumlah Bayar</th>
       <th>Bulan Bayar</th>
       <th>Keterangan Bayar</th>
       <!-- <th>Status Bayar</th> -->
       <th>Kategori</th>
       <th>Bukti Pembayaran</th>
      
       
     </tr> 
     <?php while($row2 = mysqli_fetch_assoc($res)) :?>
     <tr>
       <td><?= $row2['id_bukti'] ?></td>
       <td><?= $row2['nis'] ?></td>
       <td><?= $row2['jumlah_bayar'] ?></td>
       <td><?= $row2['bulan_bayar'] ?></td>
       <td><?= $row2['keterangan_bayar'] ?></td>
       <td><?= $row2['kategoribukti'] ?></td>
       <td>
         <a href="img/<?= $row2['imageupload'] ?>"><?= $row2['imageupload'] ?></a>
       </td>
     </tr>
     <?php endwhile; ?>
    </table>

    <div class="input-box"><br>
    <label>.</label>
    <input class="button" type="button" onclick="location.href='laporanpembayaranp.php';" value="Cetak Laporan" />
    </div>
    
    <div class="input-box"><br>
    <label>.</label>
    <input class="button" type="button" onclick="location.href='indexAdmin.php';" value="Kembali" />
    </div>
    </div>
    </form>
    <br><br>
    </div>
   </form> 
</div>
</div>
</div>
</body>

<footer>
  <div class="kontainer">
    <div class="sec aboutus">
      <h1>TK Daarutaqwa</h1>
      <p>Merupakan TK Islam yang berlokasi di cibinong yang beralamat di jl. Raya bogor, KM. 44, Pakansari, Cibinong, Bogor, West Java 16915</p>

    </div>
    <div class="sec contact">
      <h1>Contact Info</h1>

      <ul class="info">
        <li>
          <span><i class="fa fa-map"></i></span>
          <span>Cibinong <br>
            Kab bogor <br>Indonesia</span></li>
        <li>
          <span><i class="fa fa-phone"></i></span>
          <p><a href="#">+1234567</a><br><a href="#">+1234567
          </p>
          </li>
            <li>
          <span><i class="fa fa-envelope"></i></span>
          <p><a href="#">tkislamdaarutaqwa@gmail.com</a></p>
          </li>
      </ul>
    </div>
</div>
<div class="body">
    <div class="sci">
      <li><a href="#"><span class="fa fa-facebook "></span></a></li>
      <li><a href="#"><span class="fa fa-instagram "></span></a></li>
      <li><a href="#"><span class="fa fa-twitter "></span></a></li>
      <li><a href="#"><span class="fa fa-youtube"></span></a></li>
     
      
    </div>
  </div>
</footer>
<div class="copyrightText">TK - Daarutaqwa ©2021</div>
</html>
