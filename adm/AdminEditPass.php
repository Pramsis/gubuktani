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
    <h2><i class="fa fa-lock fa-fw" aria-hidden="true"></i>Data - Admin - Password</h2>
      <form method="post" action="AdminProses.php" class="form-tambah">
        <input type="hidden" name="id_admin" value="<?php echo $data['id_admin'] ?>">
        <input type="password" name="password_old" placeholder="Password Lama">
        <input type="password" name="password_new" placeholder="Password Baru">
        <input type="password" name="password_conf" placeholder="Ulangi Password Baru">
        <input type="submit" name="ganti-pass" value="Ganti Password">
      </form>

<?php include "template/footer.php"; ?>

</div>
<script type="text/javascript" src="js/accordion.js"></script>
</body>
</html>
