<?php
    require_once "db.php";
    require_once "User.php";

    $user = new User($db);

    if(!$user->isLoggedIn()){
        echo "<script>alert('Anda Harus Login Dahulu');window.location='login.php';</script>";
     }

     if(isset($_GET["id_lahan"])){
      $lahan_id = $_GET['id_lahan'];

      $sql = "SELECT * FROM tb_lahan INNER JOIN tb_kategori ON tb_lahan.id_kategori=tb_kategori.id_kategori WHERE id_lahan =:id_lahan";
      $stmt = $db->prepare($sql);
      $stmt->execute([':id_lahan'=>$lahan_id]);

      $data = $stmt->fetch();

    }

    $currentUser = $user->getUser();

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gubuktani - Sewa Lahan Pertanian Kini Mudah Dan Cepat</title>
  <link rel="shortcut icon" type="image/png" href="img/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <script type="text/javascript" href="js/responsiveNav.js"></script>
</head>
<body onscroll="myFunction()">
<?php include "template/header.php"; ?>
<div class="content">
  <div class="formAdd">
    <form action="fieldProses.php" method="post" id="regForm" class="regForm" enctype="multipart/form-data">
      <h1><i class="fa fa-pencil"></i> Perbarui Iklan</h1>
        <h3>Alamat Lengkap Lahan</h3>
        <input type="hidden" name="id_lahan" value="<?php echo $data['id_lahan'] ?>">
        <input type="hidden" name="id_user" value="<?php echo $currentUser['id_user'] ?>">
        <p>Kategori</p>
          <select name="id_kategori" required/>
            <option value="<?php echo $data['id_kategori'] ?>"><?php echo $data['kategori'] ?></option>
            <?php
                $sql = "SELECT id_kategori, kategori FROM tb_kategori ORDER BY kategori ASC";
                $query = $db->prepare($sql);
                $query->execute();
                while(list($idKategori, $Kategori) = $query->fetch()){
                  echo "<option value='$idKategori'";
                  echo ">$Kategori</option>";
                }
                ?>
          </select>
        <p>Judul</p>
        <input type="text" placeholder="Masukkan Judul Minimal 60 Karakter" maxlength="60" oninput="this.className = ''" name="judul" value="<?php echo $data['judul'] ?>">
        <p>Alamat Lengkap</p>
        <input type="text" placeholder="Masukkan Alamat Lengkap" oninput="this.className = ''" name="alamat_lahan" value="<?php echo $data['alamat_lahan'] ?>">
        <h3>Spesifikasi Lengkap Lahan</h3>
        <p>Luas</p>
        <input type="number" placeholder="Luas Tanah / M2" oninput="this.className = ''" name="luas" value="<?php echo $data['luas'] ?>">
        <p>Jenis Sertifikasi Tanah</p>
          <select name="sertifikasi" oninput="this.className = ''">
            <option><?php echo $data['sertifikasi'] ?></option>
            <option>SHM - Sertifikat Hak Milik</option>
            <option>HGB - Hak Guna Bangunan</option>
            <option>Lainnya (PPJB,Girik,Adat,dll)</option>
          </select>
        <p>Deskripsi</p>
        <textarea placeholder="Masukkan Deskripsi" onKeyUp='textCounter(this)' wrap='physical' rows='1' cols='60' oninput="this.className = ''" name="deskripsi"><?php echo $data['deskripsi'] ?></textarea>
        <p>Harga</p>
        <input type="number" placeholder="Harga Pertahun" oninput="this.className = ''" name="harga" value="<?php echo $data['harga'] ?>">
        <p>Kurun Sewa</p>
          <select name="kurun_sewa" required/>
            <option><?php echo $data['kurun_sewa'] ?></option>
            <option>Bulanan</option>
            <option>Tahunan</option>
          </select>
        <h3>Fasilitas</h3>
        <p>Irigasi</p>
          <select name="fasilitas_irigasi" required/>
            <option><?php echo $data['fasilitas_irigasi'] ?></option>
            <option>Langsung Dari Parit</option>
            <option>Menggunakan Pompa Air</option>
            <option>Melewati Saluran Kecil</option>
          </select>
        <p>Jenis Tanah</p>
          <select name="fasilitas_tanah" required/>
            <option><?php echo $data['fasilitas_tanah'] ?></option>
            <option>Gambut</option>
            <option>Liat</option>
            <option>Humus</option>
            <option>Alluvial</option>
          </select>
        <p>Akses Jalan</p>
          <select name="fasilitas_jalan" required/>
            <option><?php echo $data['fasilitas_jalan'] ?></option>
            <option>Pinggir Jalan Raya</option>
            <option>Melewati Jalan Setapak Sawah</option>
          </select>
        <p>Pemandangan</p>
          <select name="fasilitas_pemandangan">
            <option><?php echo $data['fasilitas_pemandangan'] ?></option>
            <option>Tidak Ada</option>
            <option>Terasering</option>
            <option>Latar Belakang Gunung</option>
          </select>
        <h3>Kondisi</h3>
          <select name="kondisi">
            <option><?php echo $data['kondisi'] ?></option>
            <option>Tersedia</option>
            <option>Tersewa</option>
          </select>
        <h3>Gambar Lahan</h3>
        <a href="#" id="myBtn" class="btn default" style="width: 100%;border:2px solid #aaaaaa;">Ganti Foto</a>
        <p><input type="submit" name="kirim-edit" class="success" value="Kirim Data"></p>
    </form>
  </div>
  <div id="myModal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span>
          <h2>Ganti Foto Lahan</h2>
        </div>
        <div class="modal-body">
          <form method="post" action="fieldProses.php" id="regForm" enctype="multipart/form-data">
            <input type="hidden" name="id_lahan" value="<?php echo $data['id_lahan'] ?>">
            <input type="file" name="foto_lahan">
            <button type="submit" name="ganti-foto">Ganti Foto Lahan</button>
          </form>
        </div>
        <div class="modal-footer">
          <h3>gubuktani.co.id</h3>
        </div>
      </div>
    </div>
</div>
<?php include "template/footer.php"; ?>
<script type="text/javascript" src="js/sticky.js"></script>
<script type="text/javascript" src="js/tabForm.js"></script>
<script type="text/javascript" src="js/uploadPreview.js"></script>
<script type="text/javascript" src="js/modal.js"></script>
<script type="text/javascript" src="js/textarea.js"></script>
<script type="text/javascript" src="js/modal.js"></script>
</body>
</html>
