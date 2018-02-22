<?php

    require_once "db.php";
    require_once "User.php";

    $user = new User($db);

    $currentUser = $user->getUser();

    if(!$user->isLoggedIn()){
        echo "<script>alert('Anda Harus Login Dahulu');window.location='login.php';</script>";
     }

    $query = $db->prepare("SELECT * FROM tb_user WHERE id_user = $currentUser[id_user] ");
    $query->execute();
    $data = $query->fetch();
    $currentUser = $user->getUser();

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Gubuktani - Akun</title>
  <link rel="shortcut icon" type="image/png" href="img/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <script type="text/javascript" href="js/responsiveNav.js"></script>
</head>
<body onscroll="myFunction()">
<div class="header">
  <h1>Gubuktani.co.id</h1>
</div>
<?php include "template/header.php"; ?>
<div class="content content-akun">
  <h1>Profil <?php echo $currentUser['nama_depan'] ?></h1>
  <div class="container-akun">
    <img src="images/<?php echo $data['foto'] ?>" alt="Avatar" style="width:150px; height:150px;">
    <p><span><?php echo $data['nama_depan'] . '&nbsp;' . $data['nama_belakang']?></span> <?php echo $data['email'] ?> . <?php echo $data['telepon'] ?></p>
    <p><?php echo $data['alamat'] ?> . <?php echo $data['profesi'] ?></p>
    <p></p>
    <a href="akunEdit.php?id_user=<?php echo $currentUser['id_user'] ?>" class="btn info">Sunting Profil</a>
  </div>
  <div id="myModal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span>
          <h2>Ganti Foto Profil</h2>
        </div>
        <div class="modal-body">
          <form method="post" action="UserAkun.php" id="regForm" enctype="multipart/form-data">
            <input type="hidden" name="id_user" value="<?php echo $data['id_user'] ?>">
            <input type="file" name="foto">
            <button type="submit" name="ganti-foto">Ganti Foto Profil</button>
          </form>
        </div>
        <div class="modal-footer">
          <h3>gubuktani.co.id</h3>
        </div>
      </div>
    </div>
    <h1>Data Iklan Anda</h1>
    <div class="container-data">
        <table class="akun-table">
          <tr>
            <th>Judul</th>
            <th>Alamat Lahan</th>
            <th>Luas</th>
            <th>Harga</th>
            <th class="aksi">Aksi</th>
          </tr>
          <?php 

            $fieldSql = "SELECT * FROM tb_lahan INNER JOIN tb_user ON tb_lahan.id_user=tb_user.id_user ORDER BY fieldCreate_at DESC";
            $fieldQuery = $db->prepare($fieldSql);
            $fieldQuery->execute();
            $fields = $fieldQuery->fetchAll();


           ?>
           <?php

           foreach ($fields as $field) {

           if($field['id_user'] == $currentUser['id_user']){

           ?>
          <tr>
            <td><?php echo $field['judul']; ?></td>
            <td><?php echo $field['alamat_lahan']; ?></td>
            <td><?php echo $field['luas']; ?> M<sup>2</sup></td>
            <td><?php echo $field['harga']; ?></td>
            <td class="aksi">
              <a href="fieldEdit.php?id_lahan=<?php echo $field['id_lahan']?>" class="btn info" title="perbarui iklan"><i class="fa fa-pencil"></i></a>
              <a href="fieldProses.php?id_lahan=<?php echo $field['id_lahan']; ?>" class="btn danger" title="hapus iklan"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          <?php   } ?>
          <?php } ?>
          <tr>
            <td colspan="5">
              <a href="fieldAdd.php" class="btn success"><i class="fa fa-plus"></i> Tambah Lahan</a>
            </td>
          </tr>
        </table>
    </div>
</div>
<?php include "template/footer.php"; ?>
<script type="text/javascript" src="js/sticky.js"></script>
<script type="text/javascript" src="js/modal.js"></script>
</body>
</html>
