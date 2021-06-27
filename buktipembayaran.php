<?php  

session_start();

require 'functions.php';

if (!isset($_SESSION["login"])){
  header("location: login.php");
  exit;
} 

$nis = $_SESSION['username'];

$conn = mysqli_connect("localhost","root","","sia_tk");
$result = mysqli_query($conn, "SELECT * FROM siswa 
WHERE nis = '$nis';");
$ppdb = mysqli_fetch_row($result);

$result2 = mysqli_query($conn, "SELECT * FROM ppdb WHERE id_ppdb = '$ppdb[1]';");

$user = mysqli_fetch_row($result2);
 

if ( isset($_POST["submit"])) {

  // var_dump($_POST);
  // var_dump($_FILES);
  // die;

  if ( buktibayar($_POST) > 0) {
    echo"
        <script>
        alert('data berhasil ditambahkan');
        document.location.href='pembayaran.php';
        </script>
        ";
  } else {
    echo"
        <script>
        alert('data gagal ditambahkan');
        document.location.href= 'buktipembayaran.php';
        </script>
        ";
  }
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Upload Bukti Bayar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
 <!--  <link rel="stylesheet" href="css/styles.css">
 --><link rel="stylesheet" href="css/bukti.css">
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
  <h1>Upload Bukti Pembayaran - Sisi User</h1>
  <div class="container">
    <div class="title"> Upload Bukti Pembayaran</div>
    <div class="content">   
     <!--form method untuk file handling  -->
    <form action="" method="post" enctype="multipart/form-data">

    <div class="user-details">
    <div class="input-box">
    <span class="details">NIS</span>
    <input type="text" name="nis" value="<?= $nis ?>" id="nis">
    </div>
    <br><br>
    <div class="input-box">
        <label for="namalengkap">Nama Lengkap :</label>
        <input type="text" name="namalengkap" id="namalengkap" value="<?= $user[1] ?>">
     </div>
    <br><br>

    <div class="input-box">
       <label for="kelompok">Kelompok :</label>
        <input type="text" name="kelompok" id="kelompok" value="<?= $ppdb[3] ?>">
    </div>
    <br><br>
    <div class="input-box">
       <label for="bulanbayar">Bulan Bayar :</label>
        <select  name="bulanbayar" id="bulanbayar">
            <option value="Januari">Januari</option>
            <option value="Februari">Februari</option>
            <option value="Maret">Maret</option>
            <option value="April">April</option>
            <option value="Mei">Mei</option>
            <option value="Juni">Juni</option>
            <option value="Juli">Juli</option>
            <option value="Agustus">Agustus</option>
            <option value="September">September</option>
            <option value="Oktober">Oktober</option>
            <option value="November">November</option>
            <option value="Desember">Desember</option>
         </select>
    </div>
    <br><br>

    <div class="input-box">
        <label for="keteranganbayar">Keterangan Bayar :</label>
        <input type="text" name="keteranganbayar" id="keteranganbayar">
    </div>
    <br><br>

    <div class="input-box">
        <label for="kategoribukti">Kategori Bukti :</label>
        <select id="kategoribukti" name="kategoribukti">
         <option value="SPP">SPP</option>
          <option value="Pengembangan">Pengembangan</option>
        </select>
    </div>
    <br><br>
     <div class="input-box">
        <label for="jumlahbayar">Jumlah :</label>
        <input type="text" name="jumlahbayar" id="jumlahbayar">
    </div>
    <br><br>  
    <div></div>
    
   <br><br>
     
      <br><br>  
<div class="input-box">
          
    <br><br>
</div>
<div class="input-box">
     <label> Upload Gambar -> </label>
    
      <input  type="file" name="imageupload" id="imageupload">

    <button class="button" type="submit" name="submit"> Tambah Data! </button>
    <input class="button" type="button" onclick="location.href='pembayaran.php';" value="Kembali" />
    </div>
    </div>
</form>
</div>

</div>

    <!-- <input type="button" placeholder="Upload" name="imageUpload" id="imageUpload"> -->
    <br><br>
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
