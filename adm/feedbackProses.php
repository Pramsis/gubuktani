<?php

require_once "db.php";
require_once "Admin.php";

date_default_timezone_set("Asia/Jakarta");

if(isset($_GET["id_feedback"])){

        $user_id = $_GET['id_feedback'];

        $sql = "DELETE FROM tb_feedback WHERE id_feedback=:id_feedback";
        $stmt =$db->prepare($sql);
        $stmt->execute([':id_feedback'=>$user_id]);

        header("location: feedbackData.php");
}

