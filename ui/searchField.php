<?php
    require_once "db.php";
    require_once "User.php";

    $user = new User($db);

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
<div class="header">
  <h1>Gubuktani.co.id</h1>
</div>
<?php include "template/header.php"; ?>
<div class="header-2">
  <h1>Sekarang Menyewa Lahan Pertanian Semakin Mudah Dan Cepat</h1>
  <h3>Ayo Daftarkan Sekarang Dan Iklankan Lahan Anda Secara Online</h3>
</div>
<div class="content">
    <div class="view-data">
    <h2><i class="fa fa-map-o"></i>&nbsp;Lahan Sewa Terbaik</h2>
    <?php
        
        $limit = 9;
        $sql = "SELECT * FROM tb_lahan INNER JOIN tb_kategori ON tb_lahan.id_kategori=tb_kategori.id_kategori WHERE status = 'Terverifikasi' ORDER BY fieldCreate_at ASC";
        $query = $db->prepare($sql);
        $query->execute();
        $total_result = $query->rowCount();
        $total_pages = ceil($total_result/$limit);

        if(!isset($_GET['page']))
        {
          $page = 1;
        }
        else
        {
          $page = $_GET['page'];
        }

        $starting_limit = ($page-1)*$limit;
        $show = "SELECT * FROM tb_lahan INNER JOIN tb_kategori ON tb_lahan.id_kategori=tb_kategori.id_kategori WHERE status = 'Terverifikasi' ORDER BY fieldCreate_at ASC LIMIT $starting_limit , $limit";
        $showquery = $db->prepare($show);
        $showquery->execute();

        $data = $showquery->fetchAll();


        foreach($data as $field): 
      
      ?>
    <div class="responsive">
      <div class="img">
          <img src="images/<?php echo $field['foto_lahan'] ?>" style="min-width: 100%;min-height:200px;max-height: 200px; ">
        <div class="desc">
          <p><strong><?php echo $field['judul']?></strong></p>
          <p><?php echo $field['kategori']; ?></p>
          <p>Luas <?php echo $field['luas']; ?> M<sup>2</sup></p>
          <p>Rp .<?php echo $field['harga']; ?> / <?php echo $field['kurun_sewa']; ?></p>
        </div>
        <a href="fieldDetail.php?id_lahan=<?php echo $field['id_lahan'] ?>" class="btn info" style="width: 100%;">Lihat Selengkapnya</a>
      </div>
    </div>
    <?php endforeach; ?>
    <div class="clearfix"></div>
    <center>
    <div class="pagination">
      <?php for($page=1; $page <= $total_pages ; $page++):?>
        <a href="<?php echo "?page=$page" ?>"><?php echo $page; ?></a>
      <?php endfor; ?>
    </div>
    </center>
  </div>
</div>
<div class="clearfix"></div>
<div class="content-2" style="margin-top: -100px;">
  <h3>Gubuktani.co.id - Website Sewa Lahan Terbaik Di Indonesia</h3>
  <p>Gubuktani menyajikan informasi sewa lahan, lengkap dengan fasilitas lahan, harga lahan, dan deskripsi lahan beserta foto lahan sawah yang disesuaikan dengan kondisi sebenarnya. info lahan kami akurat dan bermanfaat untuk penyewa lahan sawah. Saat ini kami memiliki lebih dari beberapa info lahan sawah dan masih terus bertambah di Indonesia. Data lahan sawah yang kami miliki telah mencakup beberapa provinsi besar seperti jawa timur, jawa tengah, jawa barat, hingga kalimantan dan Sumatra. Pengembangan data lahan sawah masih terus kami usahakan. Namun demikian, kamu dapat request penambahan info lahan sawah di seputar area yang kamu inginkan dengan mengisi data di <a href="contact.php" style="text-decoration: underline; color: #fff;">Umpan Balik Kami</a>. Kamu juga dapat menambahkan masukan, saran dan kritikan untuk Gubuktani di form tersebut. Dukungan kamu, akan mempercepat pengembangan data lahan yang kami miliki.</p>
  <p>Jika kamu ingin mendapatkan inspirasi lahan yang sangat ciamik atau bisa cek lahan eksklusif yang ada di Mamikos. Dengan luas ruangan yang hampir sama, kebanyakan Kamar kost eksklusif hanya diberikan lahan strategis atau keuntungan yang lebih menarik, ditambah pemandangan beserta kesejukan lahan tersebut sebagai tempat wisata yang menghasilkan, dengan tambahan . Di Gubuktani kini juga telah ditambahkan berbagai info lahan dengan harga murah ataupun beberapa tipe lahan lain sesuai masukan dari pengguna Gubuktani.</p>
</div>

<?php include "template/footer.php"; ?>
<script type="text/javascript" src="js/sticky.js"></script>
<script type="text/javascript" src="js/tab.js"></script>
</body>
</html>
