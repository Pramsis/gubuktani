<?php
    // Lampirkan db dan User
    require_once "db.php";
    require_once "Admin.php";

    $admin = new Admin($db);

      if(!(isset($_SESSION['adm_session']) && $_SESSION['adm_session'] != '')){
          header ("Location: login.php");
      }

    $currentAdmin = $admin->getAdmin();

    if(isset($_GET["id_user"])){
        $user_id = $_GET['id_user'];

        $sql = "SELECT * FROM tb_user WHERE id_user =:id_user";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id_user'=>$user_id]);
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
    <h2><i class="fa fa-user fa-fw" aria-hidden="true"></i>Data  <?php echo $data['nama_depan'] . "&nbsp;" . $data['nama_belakang']; ?></h2>
      <table class="table-data">
        <tr><th class="data-column">Foto Profil</th><td><img src="../ui/images/<?php echo $data['foto'] ?>" width="150px" height="150px" style="border-radius: 100%;"></td></tr>
        <tr><th class="data-column">Nama Lengkap</th><td><?php echo $data['nama_depan'] . "&nbsp;" . $data['nama_belakang']; ?></td></tr>
        <tr><th>Email</th><td><?php echo $data['email']; ?></td></tr>
        <tr><th>Alamat</th><td><?php echo $data['alamat']; ?></td></tr>
        <tr><th>Telepon</th><td><?php echo $data['telepon']; ?></td></tr>
        <tr><th>Profesi</th><td><?php echo $data['profesi']; ?></td></tr>
        <tr><th>Waktu Dibuat</th><td><?php echo $data['create_at']; ?></td></tr>
        <tr><th>Waktu Diperbarui</th><td><?php echo $data['update_at']; ?></td></tr>
      </table>

      <table class="table-data-kanan">
        <tr><th colspan="3">Data Lahan <?php echo $data['nama_depan'] ?></th></tr>
        <?php 

            $fieldSql = "SELECT * FROM tb_lahan INNER JOIN tb_user ON tb_lahan.id_user=tb_user.id_user";
            $fieldQuery = $db->prepare($fieldSql);
            $fieldQuery->execute();
            $fields = $fieldQuery->fetchAll();


        ?>
        <?php

           foreach ($fields as $field) {

           if($field['id_user'] == $_GET['id_user']){

        ?>
        <tr><td><?php echo $field['judul'] ?></td><td><a href="fieldView.php?id_lahan=<?php echo $field['id_lahan'] ?>" class="btn act info" title="Lihat"><i class="fa fa-eye"></i></a></td></tr>
        <?php 
            }
          }
          ?>
          <tr>
            <td colspan=2>
              <a href="userData.php" class="btn act info" title="Kembali"><i class="fa fa-arrow-left"></i>Kembali</a>
            </td>
          </tr>
      </table>


<?php include "template/footer.php"; ?>
</div>
<script type="text/javascript" src="js/accordion.js"></script>
</body>
</html>
