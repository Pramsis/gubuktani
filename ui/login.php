<?php
    require_once "db.php";
    require_once "User.php";

    $user = new User($db);

    if($user->isLoggedIn()){
        header("location: index.php");
    }


    if(isset($_POST['kirim'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($user->login($email, $password)){
            header("location: index.php");
        }else{
            $error = $user->getLastError();
        }
    }
 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Gubuktani - Login</title>
<link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
</head>
<body>
<?php include "template/header.php"; ?>
<div class="header header-login">
  <h1>Sekarang Menyewa Lahan Pertanian Semakin Mudah Dan Cepat</h1>
  <h3>Ayo Daftarkan Sekarang Dan Iklankan Lahan Anda Secara Online</h3>
</div>
<div class="login-page">
  <div class="form">
    <h1>Login</h1>
    <form class="login-form" method="post">
      <?php if (isset($error)): ?>
          <div class="error">
              <?php echo $error ?>
          </div>
      <?php endif; ?>
      <input type="email" name="email" placeholder="email" required/>
      <input type="password" name="password" placeholder="password" required/>
      <button type="submit" name="kirim">Login</button>
    </form>
      <p>Belum Punya Akun?<a href="register.php"> Daftar Sekarang</a></p>
  </div>
</div>
<?php include "template/footer.php"; ?>
</body>
</html>
