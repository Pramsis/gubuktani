<?php
    // Lampirkan db dan User
    require_once "db.php";
    require_once "Admin.php";

    $admin = new Admin($db);

      if(!(isset($_SESSION['adm_session']) && $_SESSION['adm_session'] != '')){
          header ("Location: login.php");
      }

    $currentAdmin = $admin->getAdmin();

    if(isset($_GET["id_admin"])){
        $user_id = $_GET['id_admin'];

        $sql = "SELECT * FROM tb_admin WHERE id_admin =:id_admin";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id_admin'=>$user_id]);
        $data = $stmt->fetch();
    }else{
      header("Location: AdminData.php");
    }

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Example Sidenav Admin Panel</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>

<?php include "template/header.php"; ?>

<div class="wrapper">
  <div class="content">
    <h2><i class="fa fa-lock fa-fw" aria-hidden="true"></i>Edit - Data - Admin</h2>
        <form action="AdminProses.php" method="post" class="form-tambah" enctype="multipart/form-data">
          <input type="hidden" name="id_admin" value="<?= $data['id_admin']?>">
          <input type="text" onfocus="this.value=''" name="nama" placeholder="Nama"  value="<?= $data['nama']?>" required/>
          <input type="text" onfocus="this.value=''" name="username" placeholder="username" maxlength="10" value="<?= $data['username']?>" required/>
          <input type="text" onfocus="this.value=''" name="email" placeholder="email" value="<?= $data['email']?>" required/>
          <input type="submit" value="Submit" name="kirim-edit">
        </form>

<?php include "template/footer.php"; ?>

</div>
<script type="text/javascript" src="js/accordion.js"></script>
</body>
</html>
