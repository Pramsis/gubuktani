<?php
    // Lampirkan db dan User
    require_once "db.php";
    require_once "Admin.php";

    $admin = new Admin($db);

      if(!(isset($_SESSION['adm_session']) && $_SESSION['adm_session'] != '')){
          header ("Location: login.php");
      }

    $currentAdmin = $admin->getAdmin();

    if(isset($_GET["id_kategori"])){
        $cat_id = $_GET['id_kategori'];

        $sql = "SELECT * FROM tb_kategori WHERE id_kategori =:id_kategori";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id_kategori'=>$cat_id]);
        $data = $stmt->fetch();
    }else{
      header("Location: catData.php");
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
    <h2><i class="fa fa-tag fa-fw" aria-hidden="true"></i>Data - Kategori</h2>
      <form action="catProses.php" method="post" class="form-tambah" enctype="multipart/form-data">
          <input type="hidden" name="id_kategori" value="<?php echo $data['id_kategori'] ?>">
          <input type="text" onfocus="this.value=''" name="kategori" placeholder="Masukkan Kategori" value="<?php echo $data['kategori'] ?>"  required/>
          <input type="submit" value="Submit" name="kirim-edit">
      </form>
<?php include "template/footer.php"; ?>
</div>
<script type="text/javascript" src="js/accordion.js"></script>
<script type="text/javascript" src="js/modal.js"></script>
</body>
</html>
