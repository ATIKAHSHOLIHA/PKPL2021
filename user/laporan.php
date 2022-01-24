<?php
// memanggil library FPDF
require('FPDF/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string 
$pdf->Cell(190, 7, 'DATA PEGAWAI', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'SISTEM INFORMASI MANAJEMEN KEPEGAWAIAN', 0, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'NIP', 1, 0);
$pdf->Cell(50, 6, 'NAMA', 1, 0);
$pdf->Cell(20, 6, 'GENDER', 1, 0);
$pdf->Cell(50, 6, 'ALAMAT', 1, 0);
$pdf->Cell(30, 6, 'JABATAN', 1, 1);
$pdf->SetFont('Arial', '', 10);
include 'koneksi.php';
$peg = mysqli_query($con, "select * from pegawai");
while ($row = mysqli_fetch_array($peg)) {
    $pdf->Cell(30, 6, $row['nip'], 1, 0);
    $pdf->Cell(50, 6, $row['nama'], 1, 0);
    $pdf->Cell(20, 6, $row['jkel'], 1, 0);
    $pdf->Cell(50, 6, $row['alamat'], 1, 0);
    $pdf->Cell(30, 6, $row['jabatan'], 1, 1);
}
$pdf->Output();
