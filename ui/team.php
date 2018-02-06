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
    <title>Gubuktani - TIm</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <script type="text/javascript" href="js/responsiveNav.js"></script>
    <style type="text/css">
      a{
        color: #333;
      }

      a:hover{
        color: #aaa;
        transition: 0.5s;
      }
    </style>
</head>
<body onscroll="myFunction()">
<div class="header">
  <h1>Gubuktani.co.id</h1>
</div>
<?php include "template/header.php"; ?>
<div class="header-2">
  <h1>Tim Kami</h1>
</div>
<div class="content" style="text-align: center;">
  <h2>Dimas Pramudya Sumarsis</h2>
  <img src="img/24384249.jpg" style="border-radius: 100%; width: 20%;">
  <h3>XII RPL 2 / 10</h3>
  <h3>Rekayasa Perangkat Lunak</h3>
  <h3>SMK Negeri 2 Surabaya</h3>
  <p style="text-align: left;"><strong>Dimas Pramudya Sumarsis</strong> Merupakan Siswa SMK Negeri 2 Surabaya yang sedang berusaha menyelesaikan proyek ujian kompetensi kejuruan. Mulai hobi coding semenjak memperoleh ilham waktu semester 1 kelas x . Siswa yang bercita cita menjadi imam yang baik ini Aktif dalam kegiatan Ekstrakurikuler Dibidang IT dan menjadi Mentor disana.</p>
  <p style="text-align: left;">Saat ini dia fokus dalam mempersiapkan ke jenjang universitas dan mempelajari beberapa Bahasa Pemrograman Dan Web Development Menggunakan Laravel</p>
  <p style="margin-top: 100px;"><a href="http://instagram.com/pramsis.io" target="_blank"><i class="fa fa-instagram"></i>&nbsp; @pramsis.io </a> . <a href="http://facebook.com/pramsis.sangradjawali" target="_blank"><i class="fa fa-facebook-official"></i>&nbsp; Pramsis Pramudya</a> . <a href="http://twitter.com/@pramsisrajawali" target="_blank"><i class="fa fa-twitter"></i>&nbsp; Pramsis Pramudya</a></p>

</div>
<?php include "template/footer.php"; ?>
<script type="text/javascript" src="js/sticky.js"></script>
<script type="text/javascript" src="js/tab.js"></script>
</body>
</html>
