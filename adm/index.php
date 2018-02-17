<?php

    require_once "db.php";
    require_once "Admin.php";

    $admin = new Admin($db);

      if(!(isset($_SESSION['adm_session']) && $_SESSION['adm_session'] != '')){
          header ("Location: login.php");
      }

    $currentAdmin = $admin->getAdmin();

    date_default_timezone_set("Asia/Jakarta");

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Example Sidenav Admin Panel</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>

<?php include "template/header.php"; ?>

<div class="wrapper">
  <div class="content">
    <h2>Halaman Beranda</h2>
    <div class="landing">
      <h2>Selamat Datang! Admin <?php echo $currentAdmin['nama'] ?></h2>
    </div>
  
    <div class="landing">
      <h2>Hari Ini <?php echo date('l') ?> Tanggal <?php echo date('h/m/Y'); ?></h2>
    </div>

    <div class="landing">
      <h2>Jumlah Pengguna Baru</h2>
    </div>

    <div class="landing">
      <h2>Jumlah Lahan Belum Terverifikasi</h2>
    </div>    
  </div>

<?php include "template/footer.php"; ?>

</div>
</body>
</html>
