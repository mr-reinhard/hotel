<?php
require('../../../asset/lib/fpdf/fpdf.php');
include '../../koneksi/koneksi.php';
include '../../koneksi/fungsi.php';

$idBooking = $_POST['btnPrintBooking'];

$query = "SELECT * FROM vw_pembayaran WHERE id_booking LIKE '%".$idBooking."%'";
$run = mysqli_query($koneksi, $query);
$fetchArr = mysqli_fetch_array($run);




$dateNow = date('F, jS Y');
class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 12, 'Hotel Danau Indah Utama', 0, 1, 'L');
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(0, 1, ' Jl. Kelana No.07, Kec. Tambun Selatan,', 0, 1, 'L');
        $this->Cell(0, 10, 'Kabupaten Bekasi, Jawa Barat 17510', 0, 1, 'L');
        $this->Cell(0, 1, 'danauindahutama@gmail.com', 0, 1, 'L');
        $this->Cell(0, 10, '+62 8521 913 5630 ', 0, 1, 'L');
        $this->Image('../../../asset/image/logo_din_black.png', 150, 10, 50);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 50, 'BOOKING RECEIPT', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Tanggal Cetak: ' . date('d-m-Y'), 0, 1, 'L');
        //$this->Image('../../../asset/image/DSC_0074.jpg', 150, 280, 50);
    }

    function AddBookingInfo($kodeBooking, $namaPemesan, $tipeKamar, $checkIn, $checkOut) {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Pemesan', 0, 1, 'L');
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, 'Kode Booking : ' . $kodeBooking, 0, 1, 'L');
        $this->Cell(0, 10, 'Tn / Ny : ' . $namaPemesan, 0, 1, 'L');
        $this->Cell(0, 10, 'Tipe Kamar : ' . $tipeKamar, 0, 1, 'L');
        $this->Cell(0, 10, 'Check In : ' . $checkIn, 0, 1, 'L');
        $this->Cell(0, 10, 'Check Out : ' . $checkOut, 0, 1, 'L');
        $this->Ln(10);
    }

    function grantTotal($tipePembayaran, $totalTagihan){
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Grand Total', 0, 1, 'L');
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, 'Total Pembayaran : Rp. ' . $totalTagihan, 0, 1, 'L');
        $this->Cell(0, 10, 'Tipe pembayaran : ' . $tipePembayaran, 0, 1, 'L');
    }

    function bestRegards($bestRegards){
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, '' . $bestRegards, 0, 1, 'R');
        $this->Image('../../../asset/image/ttd_din.png', 150, 220, 50);
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->AddBookingInfo(
    $fetchArr['id_booking'],
    $fetchArr['nama_customer'],
    $fetchArr['namaKamar'],
    $fetchArr['tanggal_checkin'],
    $fetchArr['tanggal_checkout']
);
$pdf->grantTotal(
    $fetchArr['jenis_bayar'],
    format_rupiah($fetchArr['total_bayar'])
);
$pdf->bestRegards(
    $dateNow
);
$pdf->Output("Danau_Indah_Utama_".$fetchArr['id_booking'].".pdf","I");
?>