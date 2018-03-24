<?php

    require_once "db.php";
    require_once "User.php";

    $user = new User($db);

    if($user->isLoggedIn()){
        header("location: index.php");
    }

 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gubuktani - Daftar</title>
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico"/>
    <link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <script type="text/javascript" href="js/responsiveNav.js"></script>
</head>
<body>
<?php include "template/header.php"; ?>
<div class="header">
  <h1>Sekarang Menyewa Lahan Pertanian Semakin Mudah Dan Cepat</h1>
  <h3>Ayo Daftarkan Sekarang Dan Iklankan Lahan Anda Secara Online</h3>
</div>
<div class="login-page">
  <div class="form">
    <h1>Register</h1>
      <form class="register-form" action="UserAkun.php" method="post" enctype="multipart/form-data">
        <?php if (isset($error)): ?>
          <div class="error">
              <?php echo $error ?>
          </div>
        <?php endif; ?>
       <input type="text" name="nama_depan" placeholder="Nama Depan" maxlength="10" required/>
       <input type="text" name="nama_belakang" placeholder="Nama Belakang">
       <input type="email" name="email" placeholder="Email" required/>
       <input type="password" id="psw" name="password" placeholder="Password" pattern=".{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
       <div id="message">
          <p id="length" class="invalid">Password Harus Minimal 8 Karakter</p>
        </div>
       <input type="alamat" name="alamat" placeholder="Alamat" required/>
       <input type="telepon" name="telepon" placeholder="Telepon" required/>
       <select name="profesi" required/>
         <option value="">--Pilih Pekerjaan--</option>
         <option>Petani</option>
         <option>Wirausaha</option>
         <option>Pegawai Negeri</option>
         <option>Pakar</option>
         <option>Pedagang</option>
         <option>Swasta</option>
       </select>
       <input type="file" name="foto">
      <button type="submit" name="kirim">DAFTAR</button>
      <p>Dengan Mengklik Daftar, Anda Telah Menyetujui<a href="term.php"> Kebijakan Privasi</a></p>
    </form> 
    <p>Sudah Punya Akun?<a href="login.php"> Login Sekarang</a></p>
  </div>
</div>
<?php include "template/footer.php"; ?>
<script type="text/javascript" src="js/minchars.js"></script>
</body>
</html>
