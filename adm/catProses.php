<?php

    require_once "db.php";
    require_once "Admin.php";

    date_default_timezone_set("Asia/Jakarta");

if(isset($_POST['kirim'])){
    try {

        $params  = [
            ':kategori'   => $_POST['kategori'],
            ':create_at' => date("Y-m-d H:i:s"),
        ];

        $sql = "INSERT INTO tb_kategori (kategori,create_at) VALUES  (:kategori,:create_at)";
        $query= $db->prepare($sql);
        $query->execute($params);

        header("location: catData.php");
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}elseif(isset($_POST['kirim-edit'])) {

        $cat_id = $_POST['id_admin'];
        $sql = "SELECT * FROM tb_kategori WHERE id_kategori =:id_kategori";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id_kategori'=>$cat_id]);
        $user = $stmt->fetch();

        try {

            $params =[
                'kategori'       => $_POST['kategori'],
                'update_at' => date("Y-m-d H:i:s"),
                'id_kategori'   => $_POST['id_kategori'],
            ];

            $sql = "UPDATE tb_kategori SET kategori=:kategori,update_at=:update_at WHERE id_kategori=:id_kategori";

            $statement = $db->prepare($sql);
            $statement->execute($params);

            header("location: catData.php");
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
}elseif(isset($_GET["id_kategori"])){

        $user_id = $_GET['id_kategori'];

        $sql = "DELETE FROM tb_kategori WHERE id_kategori=:id_kategori";
        $stmt =$db->prepare($sql);
        $stmt->execute([':id_kategori'=>$user_id]);

        header("location: catData.php");
    }



