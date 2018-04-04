<?php
    // Lampirkan db dan User
    require_once "db.php";
    require_once "Admin.php";

    $admin = new Admin($db);

      if(!(isset($_SESSION['adm_session']) && $_SESSION['adm_session'] != '')){
          header ("Location: login.php");
      }

    $currentAdmin = $admin->getAdmin();

    if(isset($_GET["id_lahan"])){
        $id = $_GET['id_lahan'];

        $sql = "SELECT * FROM tb_lahan INNER JOIN tb_user ON tb_lahan.id_user=tb_user.id_user INNER JOIN tb_kategori ON tb_lahan.id_kategori=tb_kategori.id_kategori WHERE id_lahan =:id_lahan";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id_lahan'=>$id]);
        $data = $stmt->fetch();
    }else{
      header("Location: fieldData.php");
    }

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Example Sidenav Admin Panel</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>

<?php include "template/header.php"; ?>

<div class="wrapper">
  <div class="content">
    <h2><i class="fa fa-tree fa-fw" aria-hidden="true"></i>Data Lahan <?php echo $data['nama_depan'] . "&nbsp;" . $data['nama_belakang']; ?></h2>

    <div class="tab">
      <div class="userImage">
        <img src="../ui/images/<?php echo $data['foto'] ?>" alt="Avatar" style="">
        <h3><?php echo $data['nama_depan'] . "&nbsp;" . $data['nama_belakang']; ?></h3>
      </div>
      <button class="tablinks" onclick="openCity(event, 'Paris')"  id="defaultOpen">Sekilas Iklan</button>
      <button class="tablinks" onclick="openCity(event, 'Jerman')">Detail Iklan</button>
      <button class="tablinks" onclick="openCity(event, 'Manukan')">Fasilitas</button>
      <button class="tablinks" onclick="openCity(event, 'London')">Verifikasi</button>
    </div>

    <div id="Paris" class="tabcontent">
      <h1>Sekilas Iklan</h1>
        <div class="adsImage">
            <img src="../ui/images/<?php echo $data['foto_lahan']; ?>">
        </div>
        <table class="tbakun" border="0">
        <tr><th class="data-column">Judul</th><td><?php echo $data['judul']?></td></tr>
        <tr><th>Kategori</th><td><?php echo $data['kategori']; ?></td></tr>
        <tr><th>Kontak Pemilik</th><td><?php echo $data['telepon']; ?></td></tr>
        </table>
    </div>

    <div id="Jerman" class="tabcontent">
      <h1>Detail Iklan</h1>
        <table class="tbakun" border="0">
            <tr><th>Luas</th><td><?php echo $data['luas']; ?> M<sup>2</sup></td></tr>
            <tr><th>Sertifikasi</th><td><?php echo $data['sertifikasi']; ?></td></tr>
            <tr><th>Harga</th><td>Rp. <?php echo number_format($data['harga'], 0, ',', '.'); ?> / <?php echo $data['kurun_sewa']; ?></td></tr>
            <tr><th>Status</th><td><?php echo $data['status']; ?></td></tr>
            <tr><th>Kondisi</th><td><?php echo $data['kondisi']; ?></td></tr>
            <tr><th>Waktu Dibuat</th><td><?php echo $data['fieldCreate_at']; ?></td></tr>
            <tr><th>Waktu Diperbarui</th><td><?php echo $data['fieldUpdate_at']; ?></td></tr>
        </table>
    </div>

    <div id="Manukan" class="tabcontent">
      <h1>Detail Iklan</h1>
        <table class="tbakun" border="0">
            <tr><th>Deskripsi</th><td><?php echo nl2br($data['deskripsi']); ?></td></tr>
            <tr><th>Irigasi</th><td><?php echo $data['fasilitas_irigasi']; ?></td></tr>
            <tr><th>Tanah</th><td><?php echo $data['fasilitas_tanah']; ?></td></tr>
            <tr><th>Jalan</th><td><?php echo $data['fasilitas_jalan']; ?></td></tr>
            <tr><th>Pemandangan</th><td><?php echo $data['fasilitas_pemandangan']; ?></td></tr>
            
        </table>
    </div>

    <div id="London" class="tabcontent">
      <h1>Verifikasi Iklan Ini</h1>
         <table class="tbakun" border="0">
          <tr>
            <th class="tbakunhead">Nama Lengkap</th><th><?php echo $data['nama_depan'] . '&nbsp;' . $data['nama_belakang'] ?></th>
          </tr>
          <tr>
            <th>Email </th><th><?php echo $data['email'] ?></th>
          </tr>
          <tr>
            <th>Alamat </th><th><?php echo $data['alamat'] ?></th>
          </tr>
          <tr>
            <th>Telepon </th><th><?php echo $data['telepon'] ?></th>
          </tr>
          <tr>
            <th>Profesi </th><th><?php echo $data['profesi'] ?></th>
          </tr>
          <tr>
            <th colspan="2"><a href="userData.php"><i class="
              fa fa-arrow-left"></i>&nbsp;Kembali</a></th>
          </tr>
          <form action="fieldProses.php" method="post">
            <tr>
                <td colspan=2>
                    <?php if($data['status'] == "Terverifikasi"){?>
                        <input type="hidden" name="id_lahan" value="<?php echo $data['id_lahan'] ?>">
                        <input type="hidden" name="status" value="Belum Terverifikasi">
                        <input type="submit" name="kirim-edit" class="btn act danger" value="Batalkan Verifikasi">
                    <?php }else{ ?>
                        <input type="hidden" name="id_lahan" value="<?php echo $data['id_lahan'] ?>">
                        <input type="hidden" name="status" value="Terverifikasi">
                        <input type="submit" name="kirim-edit" class="btn act success" value="Verifikasi Iklan Ini">
                    <?php } ?>
                    <a href="fpdf/FieldPDF.php?id_lahan=<?php echo $data['id_lahan'] ?>" target="_blank" class="btn act warning" title="Kembali"><i class="fa fa-file-pdf-o"></i> Cetak Ke PDF</a>
            </td></tr>
        </table>
    </div>

    

























      <!-- table class="table-data">
        <tr><th class="data-column">Foto Lahan</th><td style="padding: 0px 0px;"><img src="../ui/images/<?php echo $data['foto_lahan'] ?>" width="100%" height="150px"></td></tr>
        <tr><th class="data-column">Judul</th><td><?php echo $data['judul']?></td></tr>
        <tr><th>Kategori</th><td><?php echo $data['kategori']; ?></td></tr>
        <tr><th>Kontak Pemilik</th><td><?php echo $data['telepon']; ?></td></tr>
        <tr><th>Luas</th><td><?php echo $data['luas']; ?> M<sup>2</sup></td></tr>
        <tr><th>Sertifikasi</th><td><?php echo $data['sertifikasi']; ?></td></tr>
        <tr><th>Harga</th><td>Rp. <?php echo number_format($data['harga'], 0, ',', '.'); ?> / <?php echo $data['kurun_sewa']; ?></td></tr>
        <tr><th>Status</th><td><?php echo $data['status']; ?></td></tr>
        <tr><th>Kondisi</th><td><?php echo $data['kondisi']; ?></td></tr>
      </table>

      <table class="table-data-kanan">
        <tr><th>Deskripsi</th><td><?php echo $data['deskripsi']; ?></td></tr>
        <tr><th>Irigasi</th><td><?php echo $data['fasilitas_irigasi']; ?></td></tr>
        <tr><th>Tanah</th><td><?php echo $data['fasilitas_tanah']; ?></td></tr>
        <tr><th>Jalan</th><td><?php echo $data['fasilitas_jalan']; ?></td></tr>
        <tr><th>Pemandangan</th><td><?php echo $data['fasilitas_pemandangan']; ?></td></tr>
        <tr><th>Waktu Dibuat</th><td><?php echo $data['fieldCreate_at']; ?></td></tr>
        <tr><th>Waktu Diperbarui</th><td><?php echo $data['fieldUpdate_at']; ?></td></tr>
        <form action="fieldProses.php" method="post">
        <tr>
            <td colspan=2>
                <a href="fieldData.php" class="btn act info" title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                <?php if($data['status'] == "Terverifikasi"){?>
                    <input type="hidden" name="id_lahan" value="<?php echo $data['id_lahan'] ?>">
                    <input type="hidden" name="status" value="Belum Terverifikasi">
                    <input type="submit" name="kirim-edit" class="btn act danger" value="Batalkan Verifikasi">
                <?php }else{ ?>
                    <input type="hidden" name="id_lahan" value="<?php echo $data['id_lahan'] ?>">
                    <input type="hidden" name="status" value="Terverifikasi">
                    <input type="submit" name="kirim-edit" class="btn act success" value="Verifikasi Iklan Ini">
                <?php } ?>
                <a href="fpdf/FieldPDF.php?id_lahan=<?php echo $data['id_lahan'] ?>" target="_blank" class="btn act warning" title="Kembali"><i class="fa fa-file-pdf-o"></i> Cetak Ke PDF</a>
                <a href="userView.php?id_user=<?php echo $data['id_user'] ?>" class="btn act info" title="Lihat Pengiklan"><i class="fa fa-eye"></i> Lihat Pengiklan</a>
        </td></tr>
        </form>
      </table> -->
    <?php include "template/footer.php"; ?>
</div>
<script type="text/javascript" src="js/accordion.js"></script>
<script type="text/javascript" src="js/tab.js"></script>
</body>
</html>
