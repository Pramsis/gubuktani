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
    $hashPsswd = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $fotobaru = date('dmYHis').$foto;

    $params  = [
            ':nama_depan'    => $_POST['nama_depan'],
            ':nama_belakang' => $_POST['nama_belakang'],
            ':email'         => $_POST['email'],
            ':password'      => $hashPsswd,
            ':alamat'        => $_POST['alamat'],
            ':telepon'       => $_POST['telepon'],
            ':profesi'       => $_POST['profesi'],
            ':create_at'     => date("Y-m-d H:i:s"),
            ':foto'          => $fotobaru,
        ];

    $path = "images/".$fotobaru;

      if(move_uploaded_file($tmp, $path))
      {
        $sql = "INSERT INTO tb_user (nama_depan,nama_belakang,email,password,alamat,telepon,profesi,create_at,foto) VALUES  (:nama_depan,:nama_belakang,:email,:password,:alamat,:telepon,:profesi,:create_at,:foto)";
        $stmt= $db->prepare($sql);
        $stmt->execute($params);

        if ($user->login($email = $_POST['email'],$password = $_POST['password']))
        {
            echo "<script>alert('Anda Berhasil Terdaftar');window.location='fieldAdd.php';</script>";
        }
      }
      else
      {
          echo "Maaf, Gambar gagal untuk diupload.";
          echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
      }
    }catch(PDOException $e)
    {
            echo $e->getMessage();
        }
    }
elseif(isset($_POST['kirim-edit']))
{

    $user_id = $_POST['id_user'];
    $sql = "SELECT * FROM tb_user WHERE id_user =:id_user";
    $stmt = $db->prepare($sql);
    $stmt->execute([':id_user'=>$user_id]);
    $data = $stmt->fetch();

    try {

        $params =[
            'nama_depan'      => $_POST['nama_depan'],
            'nama_belakang'   => $_POST['nama_belakang'],
            'email'           => $_POST['email'],
            'alamat'          => $_POST['alamat'],
            'telepon'         => $_POST['telepon'],
            'profesi'         => $_POST['profesi'],
            'update_at'       => date("Y-m-d H:i:s"),
            'id_user'         => $_POST['id_user'],
        ];

        $sql = "UPDATE tb_user SET nama_depan=:nama_depan,nama_belakang=:nama_belakang,email=:email,alamat=:alamat,telepon=:telepon,profesi=:profesi,update_at=:update_at WHERE id_user=:id_user";

        $statement = $db->prepare($sql);
        $statement->execute($params);

        echo "<script>alert('Profil Berhasil Di Sunting');window.location='akun.php';</script>";

    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}elseif(isset($_POST["ganti-foto"])){


    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    $fotobaru = date('dmYHis').$foto;

    $path = "images/".$fotobaru;

    if(move_uploaded_file($tmp, $path)){

        $user_id = $_POST['id_user'];
        $sql = "SELECT * FROM tb_user WHERE id_user =:id_user";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id_user'=>$user_id]);
        $data = $stmt->fetch();

        try{

        $params =[
            'foto' => $fotobaru,
            'update_at' => date("Y-m-d H:i:s"),
            'id_user'   => $_POST['id_user'],
        ];

        if(is_file("images/".$data['foto']))
            unlink("images/".$data['foto']);

        $sql = "UPDATE tb_user SET foto=:foto,update_at=:update_at WHERE id_user = :id_user";
        $statement = $db->prepare($sql);
        $statement->execute($params);

        echo "<script>alert('Berhasil Ganti Foto Profil');window.location='akun.php';</script>";

        }
        catch(PDOException $e)
        {
        echo $e->getMessage();
        }

    }



}
elseif(isset($_POST["ganti-pass"]))
{
    $password_old   = $_POST['password_old']; //Password lama
    $password_new   = $_POST['password_new']; //Password baru
    $password_conf  = $_POST['password_conf']; //Konfirmasi password

    if (empty(trim($password_old)) || empty(trim($password_new)) || empty(trim($password_conf)) ) {
            echo "<script>alert('Form tidak boleh ada yang kosong!');</script>";
    } else {

        $sql  = "SELECT * FROM tb_user WHERE id_user = '$currentUser[id_user]'";
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
                    ':id_user' => $currentUser['id_user'],
                ];

                $sql = "UPDATE tb_user SET password=:password,update_at=:update_at WHERE id_user=:id_user";
                $statement = $db->prepare($sql);
                $statement->execute($params);
                
                echo "<script>alert('Berhasil Ganti Password');window.location='akun.php';</script>";

            }

        } else {
            echo "<script>alert('Gagal mengganti password! Password tidak terdaftar!');window.location='akun.php';</script>";
        }
    }

}else{
    header("location: akun.php");
}
