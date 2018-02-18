<?php
//memanggil library FPDF
include '../db.php';
require ('fpdf.php');

date_default_timezone_set("Asia/Jakarta");

if (isset($_GET['id_lahan'])) {

	$id = $_GET['id_lahan'];

	$sql = "SELECT * FROM tb_lahan INNER JOIN tb_user ON tb_lahan.id_user=tb_user.id_user INNER JOIN tb_kategori ON tb_lahan.id_kategori=tb_kategori.id_kategori WHERE id_lahan=$id";
	$query = $db->prepare($sql);
	$query->execute();

	$data = $query->fetch();
	
}else{
	header("Location: fieldData.php");
}


//intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF ('L','mm','A4');
//membuat halaman baru
$pdf->AddPage();
//setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',30);
//mencetak string
$pdf->Cell(0,10,'Data Lahan' . ' ' . $data['nama_depan'] . ' ' . $data['nama_belakang'],0,1,'C');
$pdf->Cell(0,7,'',0,1);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,'Gubuktani.co.id',0,1,'C');
$pdf->SetFont('Arial','',15);
$pdf->Cell(0,10,'Dicetak Pada Tanggal ' . date('d/m/Y'),0,1,'C');
//memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55.4,6,'Kategori',1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(223.6,6,$data['kategori'],1,0);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55.4,6,'Judul',1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(223.6,6,$data['judul'],1,0);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55.4,6,'Nama Pemilik',1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(223.6,6,$data['nama_depan'] . ' ' .$data['nama_belakang'] ,1,0);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55.4,6,'Kontak Pemilik',1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(223.6,6,$data['telepon'],1,0);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55.4,6,'Luas',1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(223.6,6,$data['luas'],1,0);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55.4,6,'Sertifikasi',1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(223.6,6,$data['sertifikasi'],1,0);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55.4,6,'harga',1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(223.6,6,$data['harga'],1,0);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55.4,6,'Kurun Sewa',1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(223.6,6,$data['kurun_sewa'],1,0);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55.4,6,'Deskripsi',1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(223.6,6,$data['deskripsi'],1,0);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55.4,6,'Irigasi',1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(223.6,6,$data['fasilitas_irigasi'],1,0);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55.4,6,'Tanah',1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(223.6,6,$data['fasilitas_tanah'],1,0);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55.4,6,'Jalan',1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(223.6,6,$data['fasilitas_jalan'],1,0);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55.4,6,'Pemandangan',1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(223.6,6,$data['fasilitas_pemandangan'],1,0);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55.4,6,'Waktu Dibuat',1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(223.6,6,$data['fieldCreate_at'],1,0);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55.4,6,'Waktu Diperbarui',1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(223.6,6,$data['fieldUpdate_at'],1,0);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55.4,6,'Status',1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(223.6,6,$data['status'],1,0);

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(55.4,6,'Kondisi',1,0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(223.6,6,$data['kondisi'],1,0);

$pdf->Output();
?>