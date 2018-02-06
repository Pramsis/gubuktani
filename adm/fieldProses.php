<?php

require_once "db.php";
require_once "Admin.php";

$admin = new Admin($db);

$currentAdmin = $admin->getAdmin();

date_default_timezone_set("Asia/Jakarta");

if(isset($_GET["id_lahan"])){

        $id = $_GET['id_lahan'];

        $sql = "SELECT * FROM  tb_lahan WHERE id_lahan = $id";
        $query = $db->prepare($sql);
        $query->execute();
        $data = $query->fetch();

    if(is_file("../ui/images/".$data['foto_lahan']))
        unlink("../ui/images/".$data['foto_lahan']);

        $sql = "DELETE FROM tb_lahan WHERE id_lahan=:id_lahan";
        $stmt =$db->prepare($sql);
        $stmt->execute([':id_lahan'=>$id]);

        header("location: userData.php");
}else{

    echo "<script>alert('Ada Yang Error !!');window.location='fieldData.php.php?page=pengaturan';</script>";

}
