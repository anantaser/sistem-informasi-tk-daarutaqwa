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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
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
  <title></title>
</head>
<body>
<div class="konten">
    
    <table >

       <tr>
         <td><img src="assets/logotk.jpg" width="90" height="90"></td>
         <td>
      <center>    
           <font size="4" color="black" style="font-family: Nyla"><b>Yayasan Terpadu</b></font><br>
           <font size="7" color="black" style="font-family: Bernard MT Condensed"><b>DAARUTAQWA</b></font><br>
           <font size="4" color="black" style="font-family: Maiandra GD"><b>TAMAN KANAK-KANAK DAARUTAQWA</b></font>
           <br>
           <font size="2">Jl. Raya Jakarta Bogor KM. 44 P.O. Box 40 CBI Pakansari Cibinong Bogor 16915   (021) 8755974</font>
    </center>       </td>

       </tr>
   

     </table>
<center>
<H1><u>Bukti Pembayaran</u></H1>

</center>

    <table width="100%">
<td width="400px">
    <p><b>Nama Lengkap :<?= $user[1] ?>  </b> </p>


    <!-- 
    <p><b>Nama : <?= $dr2['namalengkap'] ?></b> </p>
    <p><b>Kelas:  <?= $dr['id_kelas'] ?> </b></p> -->
  </td>
  <td width="100px">
    <!-- <p><b>Sakit: <?= $dr3['sakit'] ?> </b>   </p>
    <p><b>Izin: <?= $dr3['izin'] ?>  </b> </p>
    <p><b>Alpha:  <?= $dr3['alpha'] ?></b>  </p>
    -->
  </td>
  </table>
    <table>


     <tr>
<th>No</th>
       <th>ID Pembayaran</th>
       <th>NIS</th>     <th>Bulan Bayar</th>
       <th>Keterangan Bayar</th>
       <!-- <th>Status Bayar</th> -->
       <th>Jumlah bayar</th>
    
     </tr> 
      <?php $i = 1; ?>
     <?php while($row = mysqli_fetch_assoc($result3)) :?>
     <tr>
      <td><center><?= $i ?></center></td>
       <td><?= $row['id_bukti'] ?></td>
       <td><?= $row['nis'] ?></td>
      
       <td><center><?= $row['bulan_bayar'] ?></center></td>
       <td><?= $row['kategoribukti'] ?></td>
     <td><center>Rp.<?= $row['jumlah_bayar'] ?></center></td>
        </tr>

<?php $i++; ?>
     <?php endwhile; ?>
    </table>
<p>___________________________________________________________________________</p>
    


    <td width="10px"><p><b>TOTAL</b></p></td>
    


    <table width="100%">
  <tr>
    <td></td>
     <td></td>
 <td width="400px">
   
      <p>Mengetahui kepala Taman Kanak-kanak <br>  <br></p>
      <br><br><p><u>Catatan</u><br>-Disimpan Sebagai bukti pembayaran yang sah <br>-Uang yang sudah dibayarkan tidak dapat diminta kembali</p></td>
      <br> 
        <td width="200px">
   
      <p>Yang Menerima <br>  <br></p>
      <br><br><p><u>Admin</u><br></p></td>
      <br>
      
  </tr>
</table>

      
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <title>Status Pembayaran</title>
    <br><br>
    <div class="input-box"><br>
    <label for="keuangan">Upload Bukti Bayar</label>
    <input class="button" type="button" onclick="location.href='buktipembayaran.php';" value="Upload" /></div>
    <br><br> 
    <div class="input-box"><br>
      <label>.</label>
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
<a href="#" onclick="window.print();">cetak</a>

</html>
