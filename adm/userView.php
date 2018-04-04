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

      $fieldSql = "SELECT * FROM tb_lahan INNER JOIN tb_user ON tb_lahan.id_user=tb_user.id_user";
      $fieldQuery = $db->prepare($fieldSql);
      $fieldQuery->execute();
      $fields = $fieldQuery->fetchAll();

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
    <div class="tab">
      <div class="userImage">
        <img src="../ui/images/<?php echo $data['foto'] ?>" alt="Avatar" style="">
        <h3><?php echo $data['nama_depan'] . "&nbsp;" . $data['nama_belakang']; ?></h3>
      </div>
      <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Sekilas Profil</button>
      <button class="tablinks" onclick="openCity(event, 'Paris')">Daftar Iklan</button>
    </div>

    <div id="London" class="tabcontent">
      <h1>Sekilas Profil</h1>
         <table class="tbakun" border="0">
          <tr>
            <th class="tbakunhead">Nama Lengkap</th><th><?php echo $data['nama_depan'] . '&nbsp;' . $data['nama_belakang'] ?></th>
          </tr>
          <tr>
            <th>Email </th><th><?php echo $data['email'] ?></th>
          </tr>
          <tr>
            <th>Alamat </th><th><?php echo $data['alamat'] ?></th>
          </tr>
          <tr>
            <th>Telepon </th><th><?php echo $data['telepon'] ?></th>
          </tr>
          <tr>
            <th>Profesi </th><th><?php echo $data['profesi'] ?></th>
          </tr>
          <tr>
            <th colspan="2"><a href="userData.php"><i class="
              fa fa-arrow-left"></i>&nbsp;Kembali</a></th>
          </tr>
        </table>
    </div>

    <div id="Paris" class="tabcontent">
      <h1>Daftar Iklan</h1>
         <table class="tbakun" border="0">
          <tr>
            <th>Judul</th>
            <th>Alamat</th>
            <th class="no-column">Aksi</th>
          </tr>
           <?php
              foreach ($fields as $field) :
                if($field['id_user'] == $_GET['id_user']):
           ?>
          <tr>
            <td><?php echo $field['judul'] ?></td>
            <td><?php echo $field['alamat_lahan'] ?></td>
            <td><a href="fieldView.php?id_lahan=<?php echo $field['id_lahan'] ?>"><i class="fa fa-eye"></i></a></td>
          </tr>
          <?php 
                endif;
              endforeach;
          ?>
          <tr>
            <th colspan="3"><a href="userData.php"><i class="
              fa fa-arrow-left"></i>&nbsp;Kembali</a></th>
          </tr>
        </table>
    </div>

<?php include "template/footer.php"; ?>
</div>
<script type="text/javascript" src="js/accordion.js"></script>
<script type="text/javascript" src="js/tab.js"></script>
</body>
</html>
