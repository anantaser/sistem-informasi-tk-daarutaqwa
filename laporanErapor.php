<?php

require 'functions.php';
$conn = mysqli_connect("localhost","root","","sia_tk");

$result3 = mysqli_query($conn, "SELECT * FROM e_rapor order by id_erapot desc ");

$dr3 = mysqli_fetch_assoc($result3);

 ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<center>
     <table>
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
     <table border="1" cellpadding="10" cellspacing="0">
 <tr>
   <th>No</th><br>
   <th>NIS</th><br>
   <th>Pertumbuhan</th>
   <th>Sikap Spiritual</th>
   <th>Sikap Sosial</th>
   <th>Pengetahuan</th>
   <th>Keterampilan</th>
   
 </tr> 
  <?php $i = 1; ?>
<?php while($data = mysqli_fetch_assoc($result3)) : ?>
<tr>
  <td><?= $i ?></td>     
   <td><?= $data['nis'] ?></td>
   <td><?= $data['pertumbuhan'] ?></td>
   <td><?= $data['sikap_spiritual'] ?></td>
   <td><?= $data['sikap_sosial'] ?></td>
   <td><?= $data['pengetahuan'] ?></td>
   <td><?= $data['keterampilan'] ?></td>
   
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
</body>
</html>
