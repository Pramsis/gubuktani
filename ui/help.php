<?php
    require_once "db.php";
    require_once "User.php";

    $user = new User($db);

    $currentUser = $user->getUser();

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gubuktani - Bantuan</title>
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <script type="text/javascript" href="js/responsiveNav.js"></script>
</head>
<body>
<?php include "template/header.php"; ?>
<div class="header">
  <h1>Bantuan</h1>
</div>
<div class="content">
  <h2>Cara Daftar</h2>
  <div id="#" class="container-data">
    <ul>
    <li><p>1. Buka Link gubuktani.co.id</p></li>
    <li><p>2. Klik Login</p></li>
    <li><p>3. Klik Daftar Sekarang Yang Letaknya Di Bawah Form</p></li>
    <li><p>4. Isi Data Diri Anda</p></li>
    <li><p>5. Klik Daftar</p></li>
    <li><p>5. Selesai</p></li>
    </ul>
  </div>
  <h2>Cara Membuat Iklan</h2>
  <div id="#" class="container-data">
    <ul>
    <li><p>1. Buka Link gubuktani.co.id</p></li>
    <li><p>2. Klik Login Jika Punya Akun</p></li>
    <li><p>3. Jika Tidak Punya Bisa Klik Daftar Sekarang Yang Letaknya Di Bawah Form</p></li>
    <li><p>4. Lalu Klik Pasang Iklan</p></li>
    <li><p>5. Setelah Itu , Ada Tampilan Formulir Yang Harus Di Isi</p></li>
    <li><p>6. Isi Data Dengan Benar</p></li>
    <li><p>7. Setelah Itu Klik Kirim Data</p></li>
    <li><p>8. Selesai</p></li>
    </ul>
  </div>
</div>
<?php include "template/footer.php"; ?>
<script type="text/javascript" src="js/tab.js"></script>
<script type="text/javascript" src="js/modal.js"></script>
</body>
</html>
