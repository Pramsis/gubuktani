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

    $foto = $_FILES['foto_lahan']['name'];
    $tmp = $_FILES['foto_lahan']['tmp_name'];
    $fotobaru = date('dmYHis').$foto;

    $params  = [
            ':id_user'                  => $_POST['id_user'],
            ':id_kategori'              => $_POST['id_kategori'],
            ':judul'                    => $_POST['judul'],
            ':alamat_lahan'             => $_POST['alamat_lahan'],
            ':luas'                     => $_POST['luas'],
            ':sertifikasi'              => $_POST['sertifikasi'],
            ':deskripsi'                => $_POST['deskripsi'],
            ':harga'                    => $_POST['harga'],
            ':kurun_sewa'               => $_POST['kurun_sewa'],
            ':fasilitas_irigasi'        => $_POST['fasilitas_irigasi'],
            ':fasilitas_tanah'          => $_POST['fasilitas_tanah'],
            ':fasilitas_jalan'          => $_POST['fasilitas_jalan'],
            ':fasilitas_pemandangan'    => $_POST['fasilitas_pemandangan'],
            ':fieldCreate_at'           => date("Y-m-d H:i:s"),
            ':foto_lahan'               => $fotobaru,
        ];

    $path = "images/".$fotobaru;

      if(move_uploaded_file($tmp, $path))
      {
        $sql = "INSERT INTO tb_lahan (id_user,id_kategori,judul,alamat_lahan,luas,sertifikasi,deskripsi,harga,kurun_sewa,fasilitas_irigasi,fasilitas_tanah,fasilitas_jalan,fasilitas_pemandangan,fieldCreate_at,foto_lahan) VALUES  (:id_user,:id_kategori,:judul,:alamat_lahan,:luas,:sertifikasi,:deskripsi,:harga,:kurun_sewa,:fasilitas_irigasi,:fasilitas_tanah,:fasilitas_jalan,:fasilitas_pemandangan,:fieldCreate_at,:foto_lahan)";
        $stmt= $db->prepare($sql);
        $stmt->execute($params);

        echo "<script>alert('Data Berhasil Masuk');window.location='index.php';</script>";
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

    $lahan_id = $_POST['id_lahan'];
    $sql = "SELECT * FROM tb_lahan WHERE id_lahan =:id_lahan";
    $stmt = $db->prepare($sql);
    $stmt->execute([':id_lahan'=>$lahan_id]);
    $data = $stmt->fetch();

    try {

        $params =[
            'id_user'                  => $_POST['id_user'],
            'id_kategori'              => $_POST['id_kategori'],
            'judul'                    => $_POST['judul'],
            'alamat_lahan'             => $_POST['alamat_lahan'],
            'luas'                     => $_POST['luas'],
            'sertifikasi'              => $_POST['sertifikasi'],
            'deskripsi'                => $_POST['deskripsi'],
            'harga'                    => $_POST['harga'],
            'kurun_sewa'               => $_POST['kurun_sewa'],
            'fasilitas_irigasi'        => $_POST['fasilitas_irigasi'],
            'fasilitas_tanah'          => $_POST['fasilitas_tanah'],
            'fasilitas_jalan'          => $_POST['fasilitas_jalan'],
            'fasilitas_pemandangan'    => $_POST['fasilitas_pemandangan'],
            'fieldUpdate_at'           => date("Y-m-d H:i:s"),
            'id_lahan'                 => $_POST['id_lahan'],
        ];

        $sql = "UPDATE tb_lahan SET id_user=:id_user,id_kategori=:id_kategori,judul=:judul,alamat_lahan=:alamat_lahan,luas=:luas,sertifikasi=:sertifikasi,deskripsi=:deskripsi,harga=:harga,kurun_sewa=:kurun_sewa,fasilitas_irigasi=:fasilitas_irigasi,fasilitas_tanah=:fasilitas_tanah,fasilitas_jalan=:fasilitas_jalan,fasilitas_pemandangan=:fasilitas_pemandangan,fieldUpdate_at=:fieldUpdate_at WHERE id_lahan=:id_lahan";
        $statement = $db->prepare($sql);
        $statement->execute($params);

        echo "<script>alert('Iklan Berhasil Dirubah');window.location='akun.php';</script>";

    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}elseif(isset($_GET["id_lahan"])){

        $field_id = $_GET['id_lahan'];

        $sql = "SELECT * FROM  tb_lahan WHERE id_lahan = $field_id";
        $query = $db->prepare($sql);
        $query->execute();
        $data = $query->fetch();

    if(is_file("../ui/images/".$data['foto_lahan']))
        unlink("../ui/images/".$data['foto_lahan']);

        $sql = "DELETE FROM tb_lahan WHERE id_lahan=:id_lahan";
        $stmt =$db->prepare($sql);
        $stmt->execute([':id_lahan'=>$field_id]);

        header("location: akun.php");

}elseif(isset($_POST["ganti-foto"])){


    $foto = $_FILES['foto_lahan']['name'];
    $tmp = $_FILES['foto_lahan']['tmp_name'];

    $fotobaru = date('dmYHis').$foto;

    $path = "images/".$fotobaru;

    if(move_uploaded_file($tmp, $path)){

        $id = $_POST['id_lahan'];
        $sql = "SELECT * FROM tb_lahan WHERE id_lahan =:id_lahan";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id_lahan'=>$id]);
        $data = $stmt->fetch();

        try{

        $params =[
            'foto_lahan' => $fotobaru,
            'fieldUpdate_at' => date("Y-m-d H:i:s"),
            'id_lahan'   => $_POST['id_lahan'],
        ];

        if(is_file("images/".$data['foto_lahan']))
            unlink("images/".$data['foto_lahan']);

        $sql = "UPDATE tb_lahan SET foto_lahan=:foto_lahan,fieldUpdate_at=:fieldUpdate_at WHERE id_lahan = :id_lahan";
        $statement = $db->prepare($sql);
        $statement->execute($params);

        echo "<script>alert('Berhasil Ganti Foto Lahan');window.location='akun.php';</script>";

        }
        catch(PDOException $e)
        {
        echo $e->getMessage();
        }

    }

}else{
    header("location: akun.php");
}
