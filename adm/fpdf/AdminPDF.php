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
$pdf->Cell(190,10,'Data Admin',0,1,'C');
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(190,10,'Gubuktani.co.id',0,1,'C');
//memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(63.3,6,'Nama',1,0);
$pdf->Cell(63.3,6,'Username',1,0);
$pdf->Cell(63.3,6,'Email',1,0);

$sql = "SELECT * FROM tb_admin";
$query = $db->prepare($sql);
$query->execute();

$data = $query->fetchAll();
$pdf->SetFont('Arial','',8);
foreach($data as $value):
	$pdf->Cell(10,7,'',0,1);
	$pdf->Cell(63.3,6,$value['nama'],1,0);
	$pdf->Cell(63.3,6,$value['username'],1,0);
	$pdf->Cell(63.3,6,$value['email'],1,0);

endforeach;


$pdf->Output();
?>