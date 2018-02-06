<?php

	require_once "db.php";
	require_once "guru.php";
	//buat onject user
	$guru = new guru($db);
	//jika sudah login
	if(!$guru->isLoggedIn()){
		header("location:login.php");
	}
	
	$currentguru = $guru->getguru();

	// Buat prepared statement untuk mengambil semua data dari tbBiodata
		$query = $db->prepare("SELECT * FROM tb_murid");
		// Jalankan perintah SQL
		$query->execute();
		// Ambil semua data dan masukkan ke variable $data
		$data = $query->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
<title>Beranda </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
</head>
<body>

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 9px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

<ul class="sidenav">
  <li><a href="index.php">Beranda</a></li>
  <li><a href="isi_jadwal.php">Isi Jadwal UL</a></li>
  <li><a class="active" href="absensi.php">Absensi</a></li>
  <li><a href="edit_nilai.php">Edit Nilai</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<form method="post" action="updateabsensi.php">
<div class="wrapper">
  <div class="header">
    <h2>Table Absensi Murid</h2>
  </div>
  <div class="content">
  <br>
    <b><a href="fpdf/coba.php">Save Data</a></b>
    <table>
      <tr>
				<th>NISN</th>
				<th>Username</th>
				<th>Nama</th>
				<th>Kelas</th>
				<th>Alamat</th>
				<th>Agama</th>
				<th>Absensi</th>
			</tr>
			<?php foreach($data as $value): ?>
			<tr>
				<td><?php echo $value['nisn'] ?></td>
				<td><?php echo $value['username'] ?> </td>
				<td><?php echo $value['nama'] ?> </td>
				<td><?php echo $value['kelas'] ?> </td>
				<td><?php echo $value['alamat'] ?> </td>
				<td><?php echo $value['agama'] ?> </td>
				<td><a href="edit_absensi.php?nisn=<?php echo $value['nisn']?>">Edit</a></td>
				</tr>
			<?php endforeach; ?>
    </table>
  </div>
 </form>
  
</div>
</body>
</html>
