<?php
//memanggil library FPDF
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
$pdf->Cell(27,6,'NISN',1,0);
$pdf->Cell(23,6,'Nama',1,0);
$pdf->Cell(14,6,'Kelas',1,0);
$pdf->Cell(11,6,'Alamat',1,0);
$pdf->Cell(27,6,'Agama',1,0);
$pdf->Cell(13,6,'Absensi',1,0);

$pdf->SetFont('Arial','',8);


include '../db.php';
$absensi = mysql_query("Select * from tb_murid");
while ($row = mysql_fetch_array($absensi)){
	$pdf->Cell(10,7,'',0,1);
	$pdf->Cell(27,6,$row['nisn'],1,0);
	$pdf->Cell(23,6,$row['nama'],1,0);
	$pdf->Cell(14,6,$row['kelas'],1,0);
	$pdf->Cell(11,6,$row['alamat'],1,0);
	$pdf->Cell(27,6,$row['agama'],1,0);
	$pdf->Cell(13,6,$row['absensi'],1,0);
}
$pdf->Output();
?>

