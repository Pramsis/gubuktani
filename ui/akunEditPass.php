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
  <title>Gubuktani - Sunting Password</title>
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
      <a href="akunEdit.php?id_user=<?php echo $data['id_user'] ?>" class="btn success" title="Kembali"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
    </div>
    <div class="container-data">
      <form method="post" action="UserAkun.php" id="regForm">
        <input type="hidden" name="id_user" value="<?php echo $data['id_user'] ?>">
        <p>Password Lama</p>
        <input type="password" name="password_old" placeholder="Password Lama">
        <p>Password Baru</p>
        <input type="password" id="psw" name="password_new" placeholder="Password Baru" pattern=".{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
         <div id="message">
            <p id="length" class="invalid">Password Harus Minimal 8 Karakter</p>
          </div>
        <p>Ulangi Password Lama</p>
        <input type="password" name="password_conf" placeholder="Ulangi Password Baru">
        <button type="submit" name="ganti-pass">Perbarui Data</button>
      </form>
    </div>
</div>
<?php include "template/footer.php"; ?>
<script type="text/javascript" src="js/sticky.js"></script>
<script type="text/javascript" src="js/minchars.js"></script>
<script type="text/javascript" src="js/modal.js"></script>
</body>
</html>


