<?php
    require_once "db.php";
    require_once "User.php";

    $user = new User($db);

    if(!$user->isLoggedIn()){
        echo "<script>alert('Anda Harus Login Dahulu');window.location='login.php';</script>";
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
<body>
<?php include "template/header.php"; ?>
<div class="header">
  <h1><i class="fa fa-pencil"></i> Pasang Iklan</h1>
</div>
<div class="content">
  <div class="formAdd">
    <form action="fieldProses.php" method="post" id="regForm" class="regForm" enctype="multipart/form-data">
        <h3>Alamat Lengkap Lahan *Wajib Di Isi</h3>
        <input type="hidden" name="id_user" value="<?php echo $currentUser['id_user'] ?>">
        <p>Kategori</p>
          <select name="id_kategori" required/>
            <option value="">Pilih Kategori</option>
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
        <input type="text" placeholder="Masukkan Judul Minimal 60 Karakter" maxlength="60" oninput="this.className = ''" name="judul">
        <p>Alamat Lengkap</p>
        <input type="text" placeholder="Masukkan Alamat Lengkap" oninput="this.className = ''" name="alamat_lahan">
        <h3>Spesifikasi Lengkap Lahan *Wajib Di Isi</h3>
        <p>Luas</p>
        <input type="number" placeholder="Luas Tanah / M2" oninput="this.className = ''" name="luas">
        <p>Jenis Sertifikasi Tanah</p>
          <select name="sertifikasi" oninput="this.className = ''">
            <option>--Pilih Jenis Serifikasi Bangunan--</option>
            <option>SHM - Sertifikat Hak Milik</option>
            <option>HGB - Hak Guna Bangunan</option>
            <option>Lainnya (PPJB,Girik,Adat,dll)</option>
          </select>
        <p>Deskripsi</p>
        <textarea placeholder="Masukkan Deskripsi" onKeyUp='textCounter(this)' wrap='physical' rows='1' cols='60' oninput="this.className = ''" name="deskripsi" ></textarea>
        <p>Harga</p>
        <input type="text" id="tanpa-rupiah" placeholder="Harga Pertahun" oninput="this.className = ''"  name="harga" 
>        <p>Kurun Sewa</p>
          <select name="kurun_sewa" required/>
            <option value="">--Pilih Kurun Sewa--</option>
            <option>Bulanan</option>
            <option>Tahunan</option>
          </select>
        <input type="hidden" name="status" value="Belum Terverifikasi">
        <input type="hidden" name="kondisi" value="Tersedia">
        <h3>Fasilitas *Wajib Di Isi</h3>
        <p>Irigasi</p>
          <select name="fasilitas_irigasi" required/>
            <option value="">--Pilih Irigasi--</option>
            <option>Langsung Dari Parit</option>
            <option>Menggunakan Pompa Air</option>
            <option>Melewati Saluran Kecil</option>
          </select>
        <p>Jenis Tanah</p>
          <select name="fasilitas_tanah" required/>
            <option value="">--Pilih Jenis Tanah--</option>
            <option>Gambut</option>
            <option>Liat</option>
            <option>Humus</option>
            <option>Alluvial</option>
          </select>
        <p>Akses Jalan</p>
          <select name="fasilitas_jalan" required/>
            <option value="">--Pilih Akses Jalan--</option>
            <option>Pinggir Jalan Raya</option>
            <option>Melewati Jalan Setapak Sawah</option>
          </select>
        <p>Pemandangan</p>
          <select name="fasilitas_pemandangan">
            <option value="Tidak Ada">Tidak Ada</option>
            <option>Terasering</option>
            <option>Latar Belakang Gunung</option>
          </select>
        <h3>Gambar Lahan *Wajib Di Isi</h3>
          <input type="file" name="foto_lahan"/>
        <p><input type="submit" name="kirim" class="success" value="Kirim Data"></p>
    </form>
  </div>
</div>
<?php include "template/footer.php"; ?>
<script type="text/javascript" src="js/sticky.js"></script>
<script type="text/javascript" src="js/tabForm.js"></script>
<script type="text/javascript" src="js/uploadPreview.js"></script>
<script type="text/javascript" src="js/textarea.js"></script>
<script type="text/javascript" src="js/minchars.js"></script>
<script type="text/javascript" src="js/rupiah.js"></script>
<script type="text/javascript" src="js/modal.js"></script>
</body>
</html>

