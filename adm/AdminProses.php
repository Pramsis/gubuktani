<?php

    require_once "db.php";
    require_once "Admin.php";

    date_default_timezone_set("Asia/Jakarta");

if(isset($_POST['kirim'])){
    try {

        $hashPsswd = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $params  = [
            ':nama'   => $_POST['nama'],
            ':username' => $_POST['username'],
            ':password'    => $hashPsswd,
            ':email'    => $_POST['email'],
            ':create_at' => date("Y-m-d H:i:s"),
        ];

        $sql = "INSERT INTO tb_admin (nama,username,password,email,create_at) VALUES  (:nama,:username,:password,:email,:create_at)";
        $query= $db->prepare($sql);
        $query->execute($params);

        header("location: AdminData.php");
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}elseif(isset($_POST['kirim-edit'])) {

        $user_id = $_POST['id_admin'];
        $sql = "SELECT * FROM tb_admin WHERE id_admin =:id_admin";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id_admin'=>$user_id]);
        $user = $stmt->fetch();

        try {

            $params =[
                'nama'       => $_POST['nama'],
                'username'   => $_POST['username'],
                'email'      => $_POST['email'],
                'update_at' => date("Y-m-d H:i:s"),
                'id_admin'   => $_POST['id_admin'],
            ];

            $sql = "UPDATE tb_admin SET nama=:nama,username=:username,email=:email,update_at=:update_at WHERE id_admin=:id_admin";

            $statement = $db->prepare($sql);
            $statement->execute($params);

            header("location: AdminData.php");
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
}elseif(isset($_GET["id_admin"])){

        $user_id = $_GET['id_admin'];

        $sql = "DELETE FROM tb_admin WHERE id_admin=:id_admin";
        $stmt =$db->prepare($sql);
        $stmt->execute([':id_admin'=>$user_id]);

        header("location: AdminData.php");
}elseif(isset($_POST["ganti-pass"]))
{
    $password_old   = $_POST['password_old']; //Password lama
    $password_new   = $_POST['password_new']; //Password baru
    $password_conf  = $_POST['password_conf']; //Konfirmasi password

    if (empty(trim($password_old)) || empty(trim($password_new)) || empty(trim($password_conf)) ) {
            echo "<script>alert('Form tidak boleh ada yang kosong!');</script>";
    } else {

        $sql  = "SELECT * FROM tb_admin WHERE id_admin = '$_POST[id_admin]'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();

        $pass = password_verify($password_old, $data['password']);

        if ($pass === TRUE) {

            $pass_new  = password_hash($password_new, PASSWORD_DEFAULT, ['cost'=>12]);
            //$pass_conf = password_hash($password_conf, PASSWORD_DEFAULT, ['cost'=>12]);
            $conf = password_verify($password_conf, $pass_new);

            if($conf === FALSE) {
                echo "<script>alert('Gagal mengganti password! Password tidak sama!');</script>";
            } else {

                $params = [
                    ':password' => $pass_new,
                    ':update_at' => date("Y-m-d H:i:s"),
                    ':id_admin' => $_POST['id_admin'],
                ];

                $sql = "UPDATE tb_admin SET password=:password,update_at=:update_at WHERE id_admin=:id_admin";
                $statement = $db->prepare($sql);
                $statement->execute($params);

                echo "<script>alert('Berhasil Ganti Password');window.location='adminData.php';</script>";

            }

        } else {
            echo "<script>alert('Gagal mengganti password! Password tidak terdaftar!');window.location='adminData.php?page=pengaturan';</script>";
        }
    }

}else{
    header("location: adminData.php");
}

