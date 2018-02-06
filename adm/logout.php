<?php

    require_once "db.php";
    require_once "Admin.php";

    $admin = new Admin($db);

    $admin->logout();

    echo "<script>alert('Anda Berhasil Keluar');window.location='../ui/index.php';</script>";
 ?>
