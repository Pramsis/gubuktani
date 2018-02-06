<?php
    // Lampirkan db dan User
    require_once "db.php";
    require_once "Admin.php";

    $admin = new Admin($db);

      if(!(isset($_SESSION['adm_session']) && $_SESSION['adm_session'] != '')){
          header ("Location: login.php");
      }

    $currentAdmin = $admin->getAdmin();

    $limit = 5;
    $sql = "SELECT * FROM tb_user ORDER BY create_at DESC";
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
    if(isset($_GET['cari']))
    {
      $cari = $_GET['cari'];
      $show = "SELECT * FROM tb_user WHERE nama_depan LIKE :cari LIMIT $starting_limit , $limit";
      $showquery = $db->prepare($show);
      $showquery->execute(array(':cari' => '%' . $cari . '%'));
    }
    else
    {
      $show = "SELECT * FROM tb_user ORDER BY create_at DESC LIMIT $starting_limit , $limit";
      $showquery = $db->prepare($show);
      $showquery->execute();
    }


    $data = $showquery->fetchAll();


 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Example Sidenav Admin Panel echo</title>
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
    <h2><i class="fa fa-user fa-fw" aria-hidden="true"></i>Data - Pengguna</h2>
    <!-- <form class="example" method="get">
      <input type="text" placeholder="Cari Nama Depan" name="cari">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form> -->
    <div style="overflow-x:auto;">
      <table id="myTable">
        <tr>
          <th class="no-column">#</th>
          <th>Nama Lengkap</th>
          <th>Email</th>
          <th>Alamat</th>
          <th>Telepon</th>
          <th>Profesi</th>
          <th class="action-column">Aksi</th>
        </tr>
        <?php
        $no=1;
        foreach ($data as $value) : ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $value['nama_depan'] . "&nbsp;" . $value['nama_belakang']; ?></td>
          <td><?php echo $value['email']; ?></td>
          <td><?php echo $value['alamat']; ?></td>
          <td><?php echo $value['telepon']; ?></td>
          <td><?php echo $value['profesi']; ?></td>
          <td>
            <a href="userView.php?id_user=<?php echo $value['id_user']; ?>" class="btn act info"><i class="fa fa-eye"></i></a>
            <a href="userProses.php?id_user=<?php echo $value['id_user']; ?>" class="btn act danger"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
     <!--    <?php if(isset($_GET['cari'])){ ?>

        <?php }else{ ?> -->
        <tr>
          <td colspan="7">
            <div class="pagination">
              <?php for($page=1; $page <= $total_pages ; $page++):?>
                  <a href="<?php echo "?page=$page" ?>"><?php echo $page; ?></a>
              <?php endfor; ?>
            </div>
          </td>
        </tr>
        <!-- <?php } ?> -->
      </table>
    </div>
<?php include "template/footer.php"; ?>
</div>
<script type="text/javascript" src="js/accordion.js"></script>
</body>
</html>
