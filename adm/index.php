<?php

    require_once "db.php";
    require_once "Admin.php";

    $admin = new Admin($db);

      if(!(isset($_SESSION['adm_session']) && $_SESSION['adm_session'] != '')){
          header ("Location: login.php");
      }

    $currentAdmin = $admin->getAdmin();

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
    <h2>Beranda</h2>
    <h2>Hai! Admin <?php echo $currentAdmin['nama'] ?></h2>
    <h2>Selamat Datang di Gubuktani Admin Panel</h2>
    <?php

      date_default_timezone_set("Asia/Jakarta");
      echo "Hari Ini " . date("l") . "&nbsp;" . date("Y m d") . "&nbsp" . date("h:i:s") .  "<br>";
      ?>
  </div>

<?php include "template/footer.php"; ?>

</div>
</body>
</html>
