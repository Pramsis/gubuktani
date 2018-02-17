<?php
//memanggil library FPDF
include '../db.php';
require ('fpdf.php');

date_default_timezone_set("Asia/Jakarta");

//intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF ('L','mm','A4');
//membuat halaman baru
$pdf->AddPage();
//setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',30);
//mencetak string
$pdf->Cell(0,10,'Data Admin',0,1,'C');
$pdf->Cell(0,7,'',0,1);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,'Gubuktani.co.id',0,1,'C');
$pdf->SetFont('Arial','',15);
$pdf->Cell(0,10,'Dicetak Pada Tanggal ' . date('d/m/Y'),0,1,'C');
//memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(55.4,6,'Nama',1,0);
$pdf->Cell(55.4,6,'Username',1,0);
$pdf->Cell(55.4,6,'Email',1,0);
$pdf->Cell(55.4,6,'Waktu Dibuat',1,0);
$pdf->Cell(55.4,6,'Waktu Diperbarui',1,0);

$sql = "SELECT A.*, DATE_FORMAT(A.create_at, '%d/%m/%Y %H:%i') AS dibuat, DATE_FORMAT(A.update_at,'%d/%m/%Y %H:%i') AS diperbarui FROM tb_admin AS A";
$query = $db->prepare($sql);
$query->execute();

$data = $query->fetchAll();
$pdf->SetFont('Arial','',8);
foreach($data as $value):
	$pdf->Cell(55.4,7,'',0,1);
	$pdf->Cell(55.4,6,$value['nama'],1,0);
	$pdf->Cell(55.4,6,$value['username'],1,0);
	$pdf->Cell(55.4,6,$value['email'],1,0);
	$pdf->Cell(55.4,6,$value['dibuat'],1,0);
	$pdf->Cell(55.4,6,$value['diperbarui'],1,0);

endforeach;


$pdf->Output();
?>