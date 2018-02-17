<?php
    require_once "db.php";
    require_once "User.php";

    $user = new User($db);

    $currentUser = $user->getUser();

    if (isset($_GET['id_lahan'])) {
      $lahanid = $_GET['id_lahan'];

      $sql = "SELECT * FROM tb_lahan INNER JOIN tb_user ON tb_lahan.id_user=tb_user.id_user WHERE id_lahan = $lahanid";
      $query = $db->prepare($sql);
      $query->execute();

      $data = $query->fetch();
    }

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gubuktani</title>
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
  <div class="container-data detail">
    <h1><?php echo $data['judul'] ?></h1>
      <a href="images/<?php echo $data['foto_lahan'] ?>"><center><img src="images/<?php echo $data['foto_lahan'] ?>"></center></a>
    <div class="caption">
      <p><strong>Alamat</strong></p>
      <p><?php echo $data['alamat_lahan']; ?></p>
      <p><strong>Luas & Sertifikasi</strong></p>
      <p><?php echo $data['luas']; ?> M<sup>2</sup> & <?php echo $data['sertifikasi']; ?></p>
      <p><strong>Fasilitas</strong></p>
      <p><b>Irigasi</b> : <?php echo $data['fasilitas_irigasi']; ?> . <b>Tanah</b> :<?php echo $data['fasilitas_tanah']; ?> . <b>Jalan</b> :<?php echo $data['fasilitas_jalan']; ?> . <b>Pemandangan</b> :<?php echo $data['fasilitas_pemandangan']; ?></p>
      <p><strong>Deskripsi</strong></p>
      <p><?php echo nl2br($data['deskripsi']); ?></p>
      <p><strong>Harga</strong></p>
      <p>Rp .<?php echo $data['harga']; ?> / <?php echo $data['kurun_sewa']; ?></p>
    </div>
  </div>
  <div class="container-akun">
    <img src="images/<?php echo $data['foto'] ?>" alt="Avatar" style="width:150px; height:150px;">
    <p><span><strong><?php echo $data['nama_depan'] . '&nbsp;' . $data['nama_belakang']?></strong></span> <?php echo $data['email'] ?></p>
    <p><?php echo $data['alamat'] ?></p>
    <p><?php echo $data['telepon'] ?></p>
  </div>
</div>
<?php include "template/footer.php"; ?>
<script type="text/javascript" src="js/sticky.js"></script>
<script type="text/javascript" src="js/slides.js"></script>
</body>
</html>