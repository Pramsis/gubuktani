<?php

    require_once "db.php";
    require_once "Admin.php";

    $admin = new Admin($db);

      if(!(isset($_SESSION['adm_session']) && $_SESSION['adm_session'] != '')){
          header ("Location: login.php");
      }

    $currentAdmin = $admin->getAdmin();

    date_default_timezone_set("Asia/Jakarta");

    $sql = "SELECT * FROM tb_lahan WHERE status = 'Belum Terverifikasi'";
    $query = $db->prepare($sql);
    $query->execute();

    $data = $query->rowCount();

    $UserSql = "SELECT * FROM tb_user";
    $UserQuery = $db->prepare($UserSql);
    $UserQuery->execute();

    $UserData = $UserQuery->rowCount();

    $feedSql = "SELECT * FROM tb_feedback";
    $feedQuery = $db->prepare($feedSql);
    $feedQuery->execute();

    $feedData = $feedQuery->rowCount();

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

<?php 

  include "template/header.php"; 

  if(date('l') == "Sunday")
  {
    $hari = "Minggu";
  }
  elseif(date('l') == "Monday")
  {
    $hari = "Senin";
  }
  elseif(date('l') == "Tuesday")
  {
    $hari = "Selasa";
  }
  elseif(date('l') == "Wednesday")
  {
    $hari = "Rabu";
  }
  elseif(date('l') == "Thursday")
  {
    $hari = "Kamis";
  }
  elseif(date('l') == "Friday")
  {
    $hari = "Jumat";
  }
  elseif(date('l') == "Saturday")
  {
    $hari = "Sabtu";
  }
  else
  {
    echo "hari salah";
  }

?>

<div class="wrapper">
  <div class="content">
    <h2><i class="fa fa-home fa-fw" aria-hidden="true"></i>Halaman Beranda</h2>

    <div class="landing emerland">
      <h2>Selamat Datang! Admin <?php echo $currentAdmin['nama'] ?> | Hari Ini <?php echo $hari; ?> Tanggal <?php echo date('d/m/Y'); ?></h2>
    </div>
  

    <a href="fieldData.php">
      <div class="landing danger">
        <h2>Jumlah Lahan Belum Terverifikasi <?php echo $data; ?></h2>
      </div>
    </a>

    <a href="userData.php">
      <div class="landing info">
        <h2>Total Pengguna Saat Ini <?php echo $UserData; ?> Orang</h2>
      </div> 
    <a>

    <a href="feedbackData.php">
      <div class="landing flatBlack" >
        <h2>Kiriman Umpan Balik <?php echo $feedData; ?> Pesan</h2>
      </div> 
    </a>

  </div>

<?php include "template/footer.php"; ?>

</div>
</body>
</html>
