<?php

error_reporting(0);
	session_start();
	include "db.php";
	include "pdf/fpdf.php";

	$pdf = new FPDF('P','mm','A4');
	$pdf->AddPage();

	$sql = mysqli_fetch_array(mysqli_query($konek,"Select * from user as A inner join jenjang as B on (A.id_jenjang = B.id_jenjang) where user='$_SESSION[user]'"));

	$judul		= "Ulangan Online";
	$nama		= "Nama              	           : ".($sql[nama])."";
	$almt		= "Alamat            	          : ".$sql[alamat]."";
	$tlpn		= "Telpon            	         : ".$sql[telepon]."";
	$kelas  		= "Kelas            	          : ".$sql[kelas]."";
	$sekolah ="Sekolah 							:".$sql[sekolah]."";

	$pdf->SetFont('Arial','B','16');
	$pdf->Cell(0, 20, $judul, '0', 1, 'C');

	$header = array(
		array("label"=>"No", "length"=>8, "align"=>"C", "next"=>"0"),
		array("label"=>"mapel", "length"=>55, "align"=>"C", "next"=>"0"),
		array("label"=>"kelas", "length"=>25, "align"=>"C", "next"=>"0"),
		array("label"=>"waktu", "length"=>40, "align"=>"C", "next"=>"0"),
		array("label"=>"tanggal", "length"=>25, "align"=>"C", "next"=>"0"),
		array("label"=>"nilai", "length"=>25, "align"=>"C", "next"=>"0"),
	);

	$pdf->Image('#.jpg',10,8,33);
    //Move to the right
    $pdf->Cell(80);
    //Line break
    $pdf->Ln(5);

	$pdf->SetFont('Arial','','10');
	$pdf->SetFillColor(255,255,255);
	$pdf->SetTextColor(0);
	$pdf->SetDrawColor(0,0,0);

	$pdf->Cell(20, 5, 'Nama', 0, '0', 'P', true);
	$pdf->Cell(2, 5, ':', 0, '0', 'C', true);
	$pdf->Cell(60, 5, $sql[nama], 0, '0', 'P', true);
	$pdf->Cell(20, 5, 'sekolah', 0, '0', 'P', true);
	$pdf->Cell(2, 5, ':', 0, '0', 'C', true);
	$pdf->Cell(60, 5, $sql[sekolah], 0, '1', 'P', true);

	$pdf->Cell(20, 5, 'Alamat', 0, '0', 'P', true);
	$pdf->Cell(2, 5, ':', 0, '0', 'C', true);
	$pdf->Cell(60, 5, $sql[alamat], 0, '0', 'P', true);
	$pdf->Cell(20, 5, 'kelas', 0, '0', 'P', true);
	$pdf->Cell(2, 5, ':', 0, '0', 'C', true);
	$pdf->Cell(60, 5, $sql[kelas], 0, '1', 'P', true);

	$pdf->Cell(20, 5, 'Telepon', 0, '0', 'P', true);
	$pdf->Cell(2, 5, ':', 0, '0', 'C', true);
	$pdf->Cell(60, 5, $sql[telepon], 0, '1', 'P', true);

	$pdf->Ln(5);

	foreach ($header as $kolom) {
		$pdf->Cell($kolom['length'], 10, $kolom['label'], 1, $kolom['next'], $kolom['align'], true);
	}

	$pdf->SetFillColor(255,255,255);
	$pdf->SetTextColor(0);

	$panjang = array(10, 30, 30, 60, 55, 245, 50, 20, 25, 30, 30, 30, 30, 30, 30);

	$a = mysqli_query($konek,"Select * from proses_nilai as A inner join soal as B on (A.id_soal = B.id_soal) inner join tb_murid as C on (A.tb_murid = C.tb_murid) inner join tb_mapel as D on (B.id_mapel = D.id_mapel) inner join tb_kelas as F on (E.id_kelas = F.id_kelas) where A.murid='$_SESSION[murid]'");
	$no = 1;
	while ($b = mysqli_fetch_array($a)){
	if($b[nilai_ujian] >= 85){
	$grade ="A";
	}elseif($b[nilai_ujian] >= 70){
	$grade ="B";
	}elseif($b[nilai_ujian] >= 55){
	$grade ="C";
	}elseif($b[nilai_ujian] >= 40){
	$grade ="D";
	}elseif($b[nilai_ujian] == 0){
	$grade ="F";
	}else{
	$grade ="E";
	}
		$pdf->Cell(8, 10, $no, 1, '0', 'C', true);
		$pdf->Cell(55, 10, $b[mapel], 1, '0', 'C', true);
		$pdf->Cell(25, 10, $b[kelas], 1, '0', 'C', true);
		$pdf->Cell(30, 10, $b[waktu], 1, '0', 'C', true);
		$pdf->Cell(25, 10, $b[tanggal], 1, '0', 'C', true);
		$pdf->Cell(25, 10, $b[nilai], 1, '0', 'C', true);
	$no++;
	}

	$pdf->Output();
?>
