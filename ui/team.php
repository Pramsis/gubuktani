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
    <title>Gubuktani - Tim</title>
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <script type="text/javascript" href="js/responsiveNav.js"></script>
</head>
<body>
<?php include "template/header.php"; ?>
<div class="header">
  <h1>Tim Kami</h1>
</div>
<div class="content" style="text-align: center;">
  <h2>Dimas Pramudya Sumarsis</h2>
  <img src="img/24384249.jpg" style="border-radius: 100%; width: 20%;">
  <h3>XII RPL 2 / 10</h3>
  <h3>Rekayasa Perangkat Lunak</h3>
  <h3>SMK Negeri 2 Surabaya</h3>
  <p style="text-align: left;"><strong>Dimas Pramudya Sumarsis</strong> Pelajar di SMK Negeri 2 Surabaya Kelas XII Jurusan Rekayasa Perangkat Lunak. Mulai hobi coding semenjak memperoleh ilham waktu semester 1 kelas x . Senang Berkutat Dalam Bidang <i>Backend Developer</i> Membuat jiwanya tertantang dalam menyelesaikan sebuah proyek yang berhubungan langsung dengan data . Siswa yang bercita cita menjadi imam yang baik ini juga pernah mengikuti kegiatan Ekstrakurikuler Dibidang IT dan menjadi Mentor disana.</p>
  <p style="text-align: left;">Saat ini dia fokus dalam mempersiapkan ke jenjang universitas dan mempelajari beberapa Bahasa Pemrograman Dan Web Development Menggunakan PHP7 , Laravel , Ajax ,  MongoDB , RestAPI , OOP , Git Dll</p>
  <p style="margin-top: 100px;">Terima Kasih Atas Dukungannya :)</p>
  <p><a class="sosmedLink" href="http://instagram.com/pramsis.id" target="_blank"><i class="fa fa-instagram"></i>&nbsp; @pramsis.id </a> . <a class="sosmedLink" href="http://facebook.com/pramsis.sangradjawali" target="_blank"><i class="fa fa-facebook-official"></i>&nbsp; Pramsis Pramudya</a> . <a class="sosmedLink" href="http://twitter.com/@pramsisrajawali" target="_blank"><i class="fa fa-twitter"></i>&nbsp; @pramsisrajawali</a></p>
</div>
<?php include "template/footer.php"; ?>
<script type="text/javascript" src="js/tab.js"></script>
<script type="text/javascript" src="js/modal.js"></script>
</body>
</html>
