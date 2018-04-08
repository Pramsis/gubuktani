<?php

    require_once "db.php";
    require_once "Admin.php";


    $admin = new Admin($db);


    if($admin->isLoggedIn()){
        header("location: index.php");
    }


    if(isset($_POST['kirim'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        if($admin->login($username, $password)){
            echo "<script>alert('Anda Berhasil Login');window.location='index.php';</script>";
        }else{
            $error = $admin->getLastError();
        }
    }
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="css/font-awesome.min.css">
    </head>
    <body class="body-login">
        <div class="login-page">
          <div class="form">
            <h1 style="color: #333;">Login</h1>
            <?php if (isset($error)): ?>
            <div class="alert">
            <?php echo $error ?>
            </div>
            <?php endif; ?>
            <form class="login-form" method="post">
              <input type="text" name="username" placeholder="Username" required/>
              <input type="password" name="password" placeholder="Password" required/>
              <button type="submit" name="kirim">LOGIN</button>
              <p class="message">Example Sidenav Admin Panel @ 2018</p>
            </form>
          </div>
        </div>
        <script type="text/javascript" src="js/alert.js"></script>
    </body>
</html>
