<?php
  require_once "db.php";
  require_once "User.php";

  $user = new User($db);

  $currentUser = $user->getUser();

  if(!$user->isLoggedIn()){
      echo "<script>alert('Anda Harus Login Dahulu');window.location='login.php';</script>";
   }

  if(isset($_GET["id_user"])){
      $user_id = $_GET['id_user'];

      $sql = "SELECT * FROM tb_user WHERE id_user =:id_user";
      $stmt = $db->prepare($sql);
      $stmt->execute([':id_user'=>$user_id]);
      $data = $stmt->fetch();

  }



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gubuktani - Akun</title>
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
      <a id="myBtn" class="btn info" title="Foto Profil"><i class="fa fa-camera"></i></a>
      <a href="akunEditPass.php?id_user=<?php echo $currentUser['id_user'] ?>" class="btn warning" title="Password"><i class="fa fa-lock"></i></a>
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
    <div class="container-data">
      <form method="post" action="UserAkun.php" id="regForm">
        <input type="hidden" name="id_user" onfocus="this.value=''" value="<?php echo $data['id_user'] ?>">
        <p>Nama Depan</p>
        <input type="text" name="nama_depan" onfocus="this.value=''" placeholder="Nama Depan" value="<?php echo $data['nama_depan'] ?>">
        <p>Nama Belakang</p>
        <input type="text" name="nama_belakang" onfocus="this.value=''" placeholder="Nama Belakang" value="<?php echo $data['nama_belakang'] ?>">
        <p>Email</p>
        <input type="text" name="email" onfocus="this.value=''" placeholder="email" value="<?php echo $data['email'] ?>">
        <p>Password</p>
        <input type="text" name="alamat" onfocus="this.value=''" placeholder="Alamat" value="<?php echo $data['alamat'] ?>">
        <p>Telepon</p>
        <input type="number" name="telepon" onfocus="this.value=''" placeholder="Telepon" value="<?php echo $data['telepon'] ?>">
        <p>Profesi</p>
        <select name="profesi">
         <option><?php echo $data['profesi'] ?></option>
         <option>Petani</option>
         <option>Wirausaha</option>
         <option>Pegawai Negeri</option>
         <option>Pakar</option>
         <option>Pedagang</option>
         <option>Swasta</option>
        </select>
        <button type="submit" name="kirim-edit">Perbarui Data</button>
      </form>
    </div>
</div>
<?php include "template/footer.php"; ?>
<script type="text/javascript" src="js/sticky.js"></script>
<script type="text/javascript" src="js/modal.js"></script>
</body>
</html>
