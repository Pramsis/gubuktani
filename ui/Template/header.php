<?php
  $a = $_SERVER['PHP_SELF'];
  $b = "/gubuktani/ui/";
  $c = array(
    "index.php",
    "login.php",
    "register.php",
    "akun.php",
    "akunEdit.php",
    "akunEditPass.php",
    "fieldAdd.php",
    "searchField.php",

  );
  $d = "active";
?>

<div class="topnav" id="navbar">
  <a href="<?php echo $c[0] ?>" class="<?php if($a == $b . $c[0]){echo $d;}?>">Beranda</a>
  <a href="<?php echo $c[7] ?>" class="<?php if($a == $b . $c[7]){echo $d;}?>">Cari Lahan</a>
  <a href='fieldAdd.php' class="<?php if(($a == $b . $c[6])){echo $d;}?>"><i class='fa fa-pencil'></i> Pasang Iklan</a>

  <?php
    if(!$user->isLoggedIn()){?>
          <a href='login.php' class="<?php if(($a == $b . $c[1]) || ($a == $b . $c[2])){echo $d;}?>" style='float:right;'>Login</a>
        <?php }else{ ?>
          <a href='logout.php' style='float:right;'>Logout</a>
          <div class="dropdown">
            <button class="dropbtn">Akun <?php echo $currentUser['nama_depan'] ?>&nbsp;
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href='akun.php?id_user=<?php echo $currentUser['id_user']; ?>'>Profil</a>
              <a id="myBtn" style="cursor: pointer;">Edit Foto Profil</a>
              <a href='akunEditPass.php?id_user=<?php echo $currentUser['id_user']; ?>'>Ganti Password</a>
            </div>
          </div> 
       <?php } ?>
  <div class="search-container">
    <form action="index.php" method="get">
      <input type="text" placeholder="Ketik Judul Iklan" name="cari" required/>
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
<div id="myModal" class="modal">
    <div class="modal-content">
      <div class="modal-body">
        <span class="close">&times;</span>
        <form method="post" action="UserAkun.php" id="regForm" enctype="multipart/form-data">
          <input type="hidden" name="id_user" value="<?php echo $data['id_user'] ?>">
          <input type="file" name="foto">
          <button type="submit" name="ganti-foto">Ganti Foto Profil</button>
        </form>
      </div>
    </div>
  </div>