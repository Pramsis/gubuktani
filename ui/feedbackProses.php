<?php

require_once "db.php";
require_once "User.php";

$user = new User($db);

$currentUser = $user->getUser();

date_default_timezone_set("Asia/Jakarta");

if(isset($_POST['kirim']))
{
    try
    {

    $params  = [
            ':nama'      => $_POST['nama'],
            ':email'     => $_POST['email'],
            ':pesan'     => $_POST['pesan'],
            ':create_at' => date("Y-m-d H:i:s"),
            
        ];
        $sql = "INSERT INTO tb_feedback (nama,email,pesan,create_at) VALUES  (:nama,:email,:pesan,:create_at)";
        $stmt= $db->prepare($sql);
        $stmt->execute($params);

        echo "<script>alert('Pesan Anda Sudah Masuk Terima Kasih :)');window.location='index.php';</script>";
      
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

}
else
{
    header("location: akun.php");
}
