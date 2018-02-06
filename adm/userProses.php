<?php

require_once "db.php";
require_once "Admin.php";

date_default_timezone_set("Asia/Jakarta");

if(isset($_GET["id_user"])){

        $user_id = $_GET['id_user'];

        $sql = "SELECT * FROM  tb_user WHERE id_user = $user_id";
        $query = $db->prepare($sql);
        $query->execute();
        $data = $query->fetch();

    if(is_file("../ui/images/".$data['foto']))
        unlink("../ui/images/".$data['foto']);

        $sql = "DELETE FROM tb_user WHERE id_user=:id_user";
        $stmt =$db->prepare($sql);
        $stmt->execute([':id_user'=>$user_id]);

        header("location: userData.php");
}

