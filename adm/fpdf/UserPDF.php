<?php
//memanggil library FPDF
include '../db.php';
require ('fpdf.php');
//intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF ('P','mm','A4');
//membuat halaman baru
$pdf->AddPage();
//setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',30);
//mencetak string
$pdf->Cell(190,10,'Data User',0,1,'C');
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(190,10,'Gubuktani.co.id',0,1,'C');
//memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(27.142857143,6,'Nama Lengkap',1,0);
$pdf->Cell(27.142857143,6,'Email',1,0);
$pdf->Cell(27.142857143,6,'Alamat',1,0);
$pdf->Cell(27.142857143,6,'Telepon',1,0);
$pdf->Cell(27.142857143,6,'Profesi',1,0);
$pdf->Cell(27.142857143,6,'Data Dibuat',1,0);
$pdf->Cell(27.142857143,6,'Data Diperbarui',1,0);

$sql = "SELECT * FROM tb_user";
$query = $db->prepare($sql);
$query->execute();

$data = $query->fetchAll();
$pdf->SetFont('Arial','',8);
foreach($data as $value):
	$pdf->Cell(10,7,'',0,1);
	$pdf->Cell(27.142857143,6,$value['nama_depan'] . ' ' . $value['nama_belakang'],1,0);

endforeach;


$pdf->Output();
?>`