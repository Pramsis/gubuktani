<div class="header">
  <!-- <a href="../ui/" target="_blank" title="Pratinjau Website"><h2>gubuktani.co.id</h2></a> -->
  <h2><a href="index.php">Example Sidenav Admin Panel</a></h2>
</div>

<?php
  $a = $_SERVER['PHP_SELF'];
  $b = "/gubuktani/adm/";
  $c = array(
    "index.php",
    "AdminData.php",
    "userData.php",
    "catData.php",
    "fieldData.php",
    "feedbackData.php",
  );
  $d = "active";
?>

<ul class="sidenav">
  <li><a id="brand"><b>Admin </b><?php echo $currentAdmin['nama']; ?></a></li>
  <li><a href="<?php echo $c[0] ?>" class="<?php if($a == $b . $c[0]){echo $d;}?>"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp;Beranda</a></li>
  <li><a href="<?php echo $c[1] ?>" class="<?php if($a == $b . $c[1]){echo $d;}?>"><i class="fa fa-lock fa-fw" aria-hidden="true"></i>&nbsp;Data Admin</a></li>
  <li><a href="<?php echo $c[2] ?>" class="<?php if($a == $b . $c[2]){echo $d;}?>"><i class="fa fa-user fa-fw" aria-hidden="true"></i>&nbsp;Data Pengguna</a></li>
  <li><a href="<?php echo $c[3] ?>" class="<?php if($a == $b . $c[3]){echo $d;}?>"><i class="fa fa-tag fa-fw" aria-hidden="true"></i>&nbsp;Data Kategori</a></li>
  <li><a href="<?php echo $c[4] ?>" class="<?php if($a == $b . $c[4]){echo $d;}?>"><i class="fa fa-map fa-fw" aria-hidden="true"></i>&nbsp;Data Lahan Pemilik</a></li>
  <li><a href="<?php echo $c[5] ?>" class="<?php if($a == $b . $c[5]){echo $d;}?>"><i class="fa fa-send fa-fw" aria-hidden="true"></i>&nbsp;Data Umpan Balik</a></li>
   <li><a href="logout.php"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>&nbsp;Logout</a></li>
</ul>
