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
    <title>Gubuktani - Aturan Dan Kondisi</title>
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
  <h1>Kebijakan Privasi</h1>
</div>
<div class="content">
<h2>Kebijakan Privasi</h2>
<p>Pada dasarnya, kami sangat menjaga privasi pengguna Gubuktani.co.id baik Anda sebagai pencari Lahan Sewa maupun pemilik lahan. Dalam halaman ini kami akan menjelaskan semua informasi terkait privasi dan bagaimana data pengguna kami simpan dan kelola di Gubuktani.co.id.</p>

<p><strong>Data User</strong></p>

<p>User dalam hal ini termasuk di antaranya pencari lahan sewa dan pemilik lahan.
Adapun data user kami simpan secara aman di pusat data Gubuktani.co.id.
Dalam hal ini Gubuktani.co.id melindungi privasi user dan tidak akan memberikan data user Gubuktani.co.id kepada pihak ketiga tanpa melalui persetujuan user tersebut.
Data Pengunjung Situs Gubuktani.co.id dan Aplikasi Gubuktani.co.id</p>

<p><strong>Hubungi Kami</strong></p>

<p>Apabila terdapat pertanyaan terkait kebijakan privasi ini, silakan menghubungi kami melalui informasi kontak di bawah ini.</p>

<p>Gubuktani.co.id</p>

<p>Jl Manukan Rejo III Blok 1C No *</p>

<p>Surabaya, Jawa Timur 60185</p>

<p>Indonesia</p>

<p>support@gubuktani.co.id</p>

<p>+6285-881-824-590</p>
</div>
<?php include "template/footer.php"; ?>
<script type="text/javascript" src="js/sticky.js"></script>
<script type="text/javascript" src="js/tab.js"></script>
</body>
</html>
