<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
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
    <a href="login.php" style="float:right" >Masuk/Login</a>
  </div>
</head>
<body>
  
  <h1>Halaman Nilai</h1>
  <div class="container">
<div class="content">
  <form action="#">
    <div class="user-details">
    <div class="input-box">
    <label for="ID_Nilai">ID Nilai :</label>
    <input type="text" name="Nilai" id="Nilai" disabled="disabled">
    </div>
    <br><br>
    <div class="input-box">
    <label for="NIS">NIS :</label>
    <input type="text" name="NIS" id="NIS" disabled="disabled">
    </div>
    <br><br>
    <div class="input-box">
    <label for="Nama Lengkap">Nama Lengkap :</label>
    <input type="text" name="Nama Lengkap" id="Nama Lengkap" disabled="disabled">
    </div>
    <br><br>
    <div class="input-box">
    <label for="SosialEmosional">Sosial Emosional :</label>
    <br>
    <select id="SosialEmosional" name="SosialEmosional">
      <!-- Tolong textnya diganti indikator, valuenya tetep angka karna mau di itung -->
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    </div>
    <br><br>
    <div class="input-box">
    <label for="Bahasa">Bahasa :</label>
        <br>
        <select id="Bahasa" name="Bahasa">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
        </div>
    <br><br>
    <div class="input-box">
    <label for="Kognitif">Kognitif :</label>
        <br>
        <select id="Kognitif" name="Kognitif">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>     
        </div>
    <br><br>
    <div class="input-box">
    <label for="MotorikKasar">MotorikKasar :</label>
    <br>
          <select id="MotorikKasar" name="MotorikKasar">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>     
          </div>
    <br><br>
    <div class="input-box">
    <label for="MotorikHalus">MotorikHalus :</label>
        <br>
        <select id="MotorikHalus" name="MotorikHalus">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>  
        </div>
    <br><br>
    <div class="input-box">
    <label for="Seni">Seni :</label><br>
         
         <select id="Seni" name="Seni">
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
         </select>   
         </div>
    <br><br> 
    <div class="input-box">
    <label for="tanggalnilai">Tanggal Nilai :</label>
    <input type="date" name="tanggalnilai" id="tanggalnilai"
    value="date"
    min="2001-01-01" max="2030-12-31" 
    >
    </div>
    <br><br>
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
