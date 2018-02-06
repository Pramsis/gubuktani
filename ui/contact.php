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
    <title>Gubuktani - Kontak</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <script type="text/javascript" href="js/responsiveNav.js"></script>
</head>
<body onscroll="myFunction()">
<div class="header">
  <h1>Gubuktani.co.id</h1>
</div>
<?php include "template/header.php"; ?>
<div class="header-2">
  <h1>Kontak Kami</h1>
</div>
<div class="content">
<h2>Kontak</h2>
<p>Jika anda merasa terbantu dengan website ini diharapkan sedianya mengirimkan kritik saran kepada kami
selaku penyedia website gubuktani.co.id </p>
<p>segala sesuatu yang berkaitan dengan website ini atau kesepakatan bisnis dengan kami anda bisa menghubungi kontak dibawah ini</p>
<table style="text-align: left; margin-top:50px;" border="1">
  <tr>
    <th>Email </th><th>: support@gubuktani.co.id</th>
  </tr>
  <tr>
    <th>Alamat </th><th>: Jl . Manukan Rejo III 1C / 8 , Manukan Kulon , Tandes , Surabaya Jawa Timur 60185</th>
  </tr>
  <tr>
    <th>Telepon </th><th>: +6285 - 733 - 695 - 414</th>
  </tr>
  <tr>
    <th>Twitter </th><th>: <a href="http://twitter.com/@pramsisrajawali" target="_blank">@pramsisrajawali</a></th>
  </tr>
</table>
<h2 style="margin-top: 70px;">Peta Lokasi</h2>
<div style="width:100%;height:400px;background:#27ee71;">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.8198715524045!2d112.66399439980671!3d-7.26133068031436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fe7d36500087%3A0x7433e0f8546d3751!2sgubuktani+office!5e0!3m2!1sid!2sid!4v1517741241190" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<h2 style="margin-top: 70px;">Umpan Balik</h2>

<?php if($user->isLoggedIn()){?>

<form action="feedbackProses.php" method="post" id="regForm" class="regForm" enctype="multipart/form-data">
  <p>Nama Lengkap</p>
  <input type="text" placeholder="Nama Lengkap" maxlength="60" name="nama" value="<?php echo $currentUser['nama_depan'] . ' ' . $currentUser['nama_belakang']?>">
  <p>Email</p>
  <input type="text" placeholder="Email" maxlength="60" name="email" value="<?php echo $currentUser['email'] ?>">
  <p>Isi</p>
  <textarea style="height: 100px;" placeholder="Isi" name="pesan"></textarea>
  <p><input type="submit" name="kirim" class="success" value="Kirim Data"></p>
</form>

<?php }else{ ?>

<form action="feedbackProses.php" method="post" id="regForm" class="regForm" enctype="multipart/form-data">
  <p>Nama Lengkap</p>
  <input type="text" placeholder="Nama Lengkap" maxlength="60" name="nama">
  <p>Email</p>
  <input type="text" placeholder="Email" maxlength="60" name="email">
  <p>Isi</p>
  <textarea style="height: 100px;" placeholder="Isi" name="pesan"></textarea>
  <p><input type="submit" name="kirim" class="success" value="Kirim Data"></p>
</form>
<?php } ?>
</div>

<?php include "template/footer.php"; ?>
<script type="text/javascript" src="js/sticky.js"></script>
<script type="text/javascript" src="js/tab.js"></script>
<script type="text/javascript" src="js/map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDG3_QyukKO6GUZEm0AJfoG8T5teeb9dAo&callback=myMap" async defer></script>
</body>
</html>
