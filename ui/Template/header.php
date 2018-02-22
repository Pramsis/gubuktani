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
          <a href='akun.php?id_user=<?php echo $currentUser['id_user']; ?>' class="<?php if(($a == $b . $c[3]) || ($a == $b . $c[4]) || ($a == $b . $c[5])){echo $d;}?>" style='float:right; text-transform:capitalize;'>Akun <?php echo $currentUser['nama_depan'] ?></a>
          <div class="dropdown">
            <button class="dropbtn">Dropdown 
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="#">Link 1</a>
              <a href="#">Link 2</a>
              <a href="#">Link 3</a>
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
