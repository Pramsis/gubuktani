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
$pdf->Cell(0,10,'Data Umpan Balik',0,1,'C');
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,10,'Gubuktani.co.id',0,1,'C');
$pdf->SetFont('Arial','',15);
$pdf->Cell(0,10,'Dicetak Pada Tanggal ' . date('d/m/Y'),0,1,'C');
//memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(70,6,'Nama Lengkap',1,0);
$pdf->Cell(70,6,'Email',1,0);
$pdf->Cell(70,6,'Umpan Balik',1,0);
$pdf->Cell(70,6,'Waktu Dibuat',1,0);

$sql = "SELECT A.*, DATE_FORMAT(A.create_at, '%d/%m/%Y %H:%i') AS dibuat, DATE_FORMAT(A.update_at,'%d/%m/%Y %H:%i') AS diperbarui FROM tb_feedback AS A";
$query = $db->prepare($sql);
$query->execute();

$data = $query->fetchAll();

$pdf->SetFont('Arial','',8);
foreach($data as $value):
	$pdf->Cell(10,7,'',0,1);
	$pdf->Cell(70,6,$value['nama'],1,0);
	$pdf->Cell(70,6,$value['email'],1,0);
	$pdf->Cell(70,6,$value['pesan'],1,0);
	$pdf->Cell(70,6,$value['create_at'],1,0);
endforeach;


$pdf->Output();
?>`