<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'PT Linggo Daya Energi',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'Jln Bdr buat No.22',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'No',1,0);
$pdf->Cell(25,6,'Faktur',1,0);
$pdf->Cell(40,6,'Tanggal',1,0);
$pdf->Cell(40,6,'Nama Pelanggan',1,0);
$pdf->Cell(30,6,'Total Biaya',1,0);
$pdf->Cell(50,6,'Keterangan',1,1);



$pdf->SetFont('Arial','',10);
$no=1;
$koneksi=mysqli_connect("localhost","root","","db_iventory"); 
$data=mysqli_query($koneksi,"SELECT * FROM penjualan,pelanggan where penjualan.id_pelanggan=pelanggan.id_pelanggan");
while ($row = mysqli_fetch_array($data)){
    $pdf->Cell(10,6,$no,1,0);
    $pdf->Cell(25,6,$row['faktur'],1,0);
    $pdf->Cell(40,6,$row['tgl_penjualan'],1,0);
	$pdf->Cell(40,6,$row['nama_pelanggan'],1,0);
	$pdf->Cell(30,6,$row['total_bayar'],1,0);
	$pdf->Cell(50,6,$row['keterangan'],1,1);$no++;
}

$pdf->Output();
?>