<?php
    require_once "db.php";
    require_once "Admin.php";

    $admin = new Admin($db);

      if(!(isset($_SESSION['adm_session']) && $_SESSION['adm_session'] != '')){
          header ("Location: login.php");
      }

    $currentAdmin = $admin->getAdmin();


    if($currentAdmin['username'] == "admin"){

      $limit = 5;
      $sql = "SELECT * FROM tb_admin";
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
      $show = "SELECT * FROM tb_admin  LIMIT $starting_limit , $limit";
      $showquery = $db->prepare($show);
      $showquery->execute();

      $data = $showquery->fetchAll();

    }else{

      $sql = "SELECT * FROM  tb_admin WHERE id_admin = $currentAdmin[id_admin]";
      $query = $db->prepare($sql);
      $query->execute();
      $data = $query->fetchAll();
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
    <h2><i class="fa fa-lock fa-fw" aria-hidden="true"></i>Data - Admin</h2>
    <?php if($currentAdmin['username'] == "admin"){ ?>
    <button id="myBtn" class="btn success">Tambah Data</button>
    <?php }else{ ?>
    <?php } ?>
    <div id="myModal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close">&times;</span>
          <h2><i class="fa fa-plus"></i> Tambah Data Admin</h2>
        </div>
        <div class="modal-body">
          <form action="AdminProses.php" method="post" class="form-tambah" enctype="multipart/form-data">
              <input type="text" id="fname" name="nama" placeholder="Nama" required/>
              <input type="text" id="lname" name="username" placeholder="username" maxlength="10" required/>
              <input type="password" id="lname" name="password" placeholder="password" required/>
              <input type="text" id="lname" name="email" placeholder="email" required/>
              <input type="submit" value="Submit" name="kirim">
            </form>
        </div>
        <div class="modal-footer">
          <h3>gubuktani.co.id</h3>
        </div>
      </div>
    </div>
    <div style="overflow-x:auto;">
      <table id="myTable">
        <tr>
          <th class="no-column">#</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Email</th>
          <th>Waktu Dibuat</th>
          <th>Waktu Diperbarui</th>
          <th class="action-column">Aksi</th>
        </tr>
        <?php
        $no=1;
        foreach ($data as $value) : ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $value['nama']; ?></td>
          <td><?php echo $value['username']; ?></td>
          <td><?php echo $value['email']; ?></td>
          <td><?php echo $value['create_at']; ?></td>
          <td><?php echo $value['update_at']; ?></td>
          <td>
            <a href="AdminEdit.php?id_admin=<?php echo $value['id_admin']; ?>" class="btn act info"><i class="fa fa-pencil"></i></a>
            <a href="AdminEditPass.php?id_admin=<?php echo $value['id_admin']; ?>" class="btn act warning"><i class="fa fa-lock"></i></a>
            <?php if($currentAdmin['id_admin'] == $value['id_admin']){ ?>
            <?php }else{ ?>
            <a href="AdminProses.php?id_admin=<?php echo $value['id_admin']; ?>" class="btn act danger"><i class="fa fa-trash"></i></a>
            <?php } ?>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php if($currentAdmin['id_admin'] == $value['id_admin']){ ?>
        <?php }else{ ?>
        <tr>
          <td colspan="7">
            <div class="pagination">
              <?php for($page=1; $page <= $total_pages ; $page++):?>
                  <a href="<?php echo "?page=$page" ?>"><?php echo $page; ?></a>
              <?php endfor; ?>
            </div>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
<?php include "template/footer.php"; ?>
</div>
<script type="text/javascript" src="js/accordion.js"></script>
<script type="text/javascript" src="js/modal.js"></script>
</body>
</html>
