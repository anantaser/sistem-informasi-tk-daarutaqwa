<?php 

session_start();

if (!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

$nis = $_SESSION['username'];

$conn = mysqli_connect("localhost","root","","sia_tk");
$result = mysqli_query($conn, "SELECT * FROM siswa WHERE nis = '$nis';");

$ppdb = mysqli_fetch_row($result);

$result2 = mysqli_query($conn, "SELECT * FROM ppdb WHERE id_ppdb = '$ppdb[1]';");

$user = mysqli_fetch_row($result2);

$result3 = mysqli_query($conn, "SELECT * FROM bukti_pembayaran WHERE nis='$nis';");



 ?>



<!DOCTYPE html>
<html>
<head>
  <title>Status Pembayaran</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/bukti.css">

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
  <h1>Halaman Status Pembayaran - Sisi User</h1>
  <div class="container">
    <div class="content">
      <form class="#">
        <div class="user-details">
    <div class="input-box">
    <label for="NamaLengkap">Nama Lengkap :</label>
    <input type="text" name="NamaLengkap" id="NamaLengkap" disabled="disabled" value="<?= $user[1] ?>">
    </div>
    <br><br>
    <div class="input-box">
    <label for="NamaOT">Nama Orang Tua :</label>
    <input type="text" name="NamaOT" id="NamaOT" disabled="disabled" value="<?= $user[18] ?>">
    </div>
    <br><br>
    <div class="input-box">
    <label for="Alamat">Alamat :</label>
    <input type="text" name="Alamat" id="Alamat" disabled="disabled" value="<?= $user[8] ?>">
    <br>
    </div>
    <br><br>
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
     <?php while($row = mysqli_fetch_assoc($result3)) :?>
     <tr>
       <td><?= $row['id_bukti'] ?></td>
       <td><?= $row['nis'] ?></td>
       <td><?= $row['jumlah_bayar'] ?></td>
       <td><?= $row['bulan_bayar'] ?></td>
       <td><?= $row['keterangan_bayar'] ?></td>
       <td><?= $row['kategoribukti'] ?></td>
     </tr>
     <?php endwhile; ?>
    </table>

    <div class="input-box"><br>
    <label for="keuangan">Upload Bukti Bayar SPP</label>
    <input class="button" type="button" onclick="location.href='buktipembayaran.php';" value="Upload" /></div>
    <br><br> 
     <div class="input-box"><br>
    <label for="keuangan">Upload Bukti Bayar Pembayaran PPDB</label>
    <input class="button" type="button" onclick="location.href='buktipembayaranp.php';" value="Upload" /></div>
    <div class="input-box"><br>
    <label>Cetak Kartu SPP</label>
    <input class="button" type="button" onclick="location.href='cetakbayar.php';" value="Cetak" />
    </div>
    <div class="input-box"><br>
    <label>Kwitansi Pembayaran Pengembangan</label>
    <input class="button" type="button" onclick="location.href='cetakbayarp.php';" value="Cetak" />
    </div>
    <div class="input-box"><br>
    <input class="button" type="button" onclick="location.href='indexUser.php';" value="Kembali" />
    </div>
    
    </div>
    </form>
    <br><br>
     
    <label></label>
  </div>
  </div>
  <div>
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
