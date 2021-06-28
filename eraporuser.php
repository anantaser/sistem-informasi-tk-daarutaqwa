<?php

session_start();

$conn = mysqli_connect("localhost","root","","sia_tk");

if (!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

$nis = $_SESSION['username'];

$result = mysqli_query($conn, "SELECT * FROM siswa WHERE nis = '$nis';");

$ppdb = mysqli_fetch_assoc($result);

$result2 = mysqli_query($conn, "SELECT * FROM ppdb WHERE id_ppdb = '$ppdb[id_ppdb]';");

$user = mysqli_fetch_assoc($result2);

$result3 = mysqli_query($conn,"SELECT * FROM `nilai` WHERE `nis` = $nis");

$nilai = mysqli_fetch_assoc($result3);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Nilai & E-Rapot</title>
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
    <a href="logout.php" style="float:right" >Log Out</a>
  </div>
</head>
<body>
  <h1>Halaman Nilai dan E-Raport</h1>
  <div class="container">
    <div class="content">
    <form class="#">
      <div class="user-details">
    <div class="input-box">
    <div>Data Diri</div>
    <table border="1" cellpadding="10" cellspacing="0">
<tr>
<th>NIS</th>
<th>Nama</th>
<th>Kelompok Belajar</th>
</tr>
<tr>
<td><?= $nis ?></td>
<td><?= $user['namalengkap'] ?> </td>
<td><?= $ppdb['kelompok'] ?></td>
</tr>
   </table>
</div>
   <br>
   <div class="input-detail">
    <br>
   <div>Nilai Siswa</div>
    <table border="1" cellpadding="10" cellspacing="0">
<tr>
  <th>Tanggal Penilaian </th>
  <th>Sosial Emosional</th>
  <th>Bahasa</th>
  <th>Kognitif</th>
  <th>Motorik kasar</th>
  <th>Motorik Halus</th>
  <th>Seni</th>
</tr>
<?php while($aa = mysqli_fetch_assoc($result3)) :?>
<tr>
  <td><center><?= $aa['tanggalnilai'] ?>  </center></td>
  <td><center><?= $aa['sosemos'] ?>       </center></td>
  <td><center><?= $aa['bahasa'] ?>        </center></td>
  <td><center><?= $aa['kognitif'] ?>      </center></td>
  <td><center><?= $aa['mototik_kasar'] ?> </center></td>
  <td><center><?= $aa['motorik_halus'] ?> </center></td>
  <td><center><?= $aa['seni'] ?>          </center></td>
</tr>
<?php endwhile; ?>
<br>
</table>
 </div>
    <br>
    <br>
<div class="input-box">
  <br>
      <input class="button" type="button" onclick="location.href='cetakraporuser.php';" value="Cetak Raport" />
      <input class="button" type="button" onclick="location.href='cetaknilaiuser.php';" value="Cetak Nilai" />
      <input class="button" type="button" onclick="location.href='indexUser.php';" value="Kembali" />
    <br>
    <br><br>
    </div>
    </div>
    </form>
    </div>
    </div>
 </body>

<footer>
  <div class="kontainer">
    <div class="sec aboutus">
      <h1>TK Daarutaqwa</h1>
      <p>Merupakan TK Islam yang berlokasi di cibinong yang beralamat di jl. Raya bogor, KM. 44, Pakansari, Cibinong, Bogor, West Java 16915</p>

    </div>
    <div class="asec contact">
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