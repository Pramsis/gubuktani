<?php
//memanggil library FPDF
include '../db.php';
require ('fpdf.php');
//intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF ('P','mm','A4');
//membuat halaman baru
$pdf->AddPage();
//setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
//mencetak string
$pdf->Cell(180,10,'Ulangan Online',0,1,'C');
$pdf->Cell(180,10,'Absensi Murid',0,1,'C');
//memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,6,'NISN',1,0);
$pdf->Cell(40,6,'Nama',1,0);
$pdf->Cell(14,6,'Kelas',1,0);
$pdf->Cell(60,6,'Alamat',1,0);
$pdf->Cell(24,6,'Agama',1,0);
$pdf->Cell(25,6,'Absensi',1,0);

$sql = "SELECT * FROM tb_murid";
$query = $db->prepare($sql);
$query->execute();

$data = $query->fetchAll();

foreach($data as $value):
	$pdf->Cell(10,7,'',0,1);
	$pdf->Cell(10,6,$value['nisn'],1,0);
	$pdf->Cell(40,6,$value['nama'],1,0);
	$pdf->Cell(14,6,$value['kelas'],1,0);
	$pdf->Cell(60,6,$value['alamat'],1,0);
	$pdf->Cell(24,6,$value['agama'],1,0);
	$pdf->Cell(25,6,$value['absensi'],1,0);
endforeach;

$pdf->Output();
?>