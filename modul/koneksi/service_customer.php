<?php 
include 'koneksi.php';

    function idBooking(){
        $unique_id = '0123456789ABCDEFGHIJKLMNOPQRSTUVWQYZ';
        $output_id = substr(str_shuffle($unique_id),0,6);
        return $output_id;

    }

    function idCustomer(){
        $unique_id = '0123456789ABCDEFGHIJKLMNOPQRSTUVWQYZ';
        $output_id = substr(str_shuffle($unique_id),0,16);
        return $output_id;
    }
    
    function idCustomerDetails(){
        $unique_id = '0123456789ABCDEFGHIJKLMNOPQRSTUVWQYZ';
        $output_id = substr(str_shuffle($unique_id),0,16);
        return $output_id;
    }

    function idPembayaran(){
        $unique_id = '0123456789ABCDEFGHIJKLMNOPQRSTUVWQYZ';
        $output_id = substr(str_shuffle($unique_id),0,6);
        return $output_id;
    }


switch ($_GET['aksi']) {
    case 'simpan_daftar_booking':
        # code...
        $kodeBooking = idBooking();
        $idKamar = $_POST['nameIdKamar'];
        $idPembayaran = idPembayaran();
        $idCustomer = idCustomer();
        $idCustomerDetail = idCustomerDetails();
        $emailCust = $_POST['nameEmailCustomer'];
        $namaCustomer = $_POST['nameNamaCustomer'];
        $tanggalCheckin = $_POST['nameTanggalCheckIn'];
        $tanggalCheckout = $_POST['nameTanggalCheckOut'];
        $telfon = $_POST['nameTelfonCustomer'];
        $jenisPembayaran = $_POST['nameSelectJenisPembayaran'];
        $catatanCustomer = $_POST['nameCatatanCustomer'];
        $totalTagihan = $_POST['nameTotalTagihan'];
        $tanggalBooking = date('Y-m-d H:i:s');


        // ke table Customer
        $sqlCust = "INSERT INTO tbl_customer(id_customer,nama_customer)VALUES('$idCustomer','$namaCustomer')";

        // ke table customer details
        $sqlCustDetails = "INSERT INTO tbl_cust_details(id_detail_customer,id_customer,telp,email)VALUES('$idCustomerDetail','$idCustomer','$telfon','$emailCust')";

        // ke table booking
        $sqlBooking = "INSERT INTO tbl_booking(id_booking,id_kamar,id_customer,tanggal_booking,catatan)VALUES('$kodeBooking','$idKamar','$idCustomer','$tanggalBooking','$catatanCustomer')";

        // ke table checkin
        $sqlCheckIn = "INSERT INTO tbl_checkin(id_booking,tanggal_checkin,tanggal_checkout)VALUES('$kodeBooking','$tanggalCheckin','$tanggalCheckout')";        

        // ke table pembayaran
        $sqlPembayaran = "INSERT INTO tbl_pembayaran(id_pembayaran,id_booking,total_bayar,id_jenis_bayar)VALUES('$idPembayaran','$kodeBooking','$totalTagihan','$jenisPembayaran')";        

        // ke tabel pelunasan
        $sqlPelunasan = "INSERT INTO tbl_pelunasan(id_pembayaran,id_status_bayar)VALUES('$idPembayaran','SB3')";        


        $runCust = mysqli_query($koneksi,$sqlCust);
        $runCustDetails = mysqli_query($koneksi, $sqlCustDetails);
        $runBooking = mysqli_query($koneksi, $sqlBooking);
        $runCheckIn = mysqli_query($koneksi, $sqlCheckIn);
        $runPembayaran = mysqli_query($koneksi, $sqlPembayaran);
        $runPelunasan = mysqli_query($koneksi,$sqlPelunasan);

        echo $kodeBooking;
        break;

    case 'truncateTable':
        # code...
        $tblBooking = "TRUNCATE tbl_booking";
        $tblCheckin = "TRUNCATE tbl_checkin";
        $tblCustomer = "TRUNCATE tbl_customer";
        $tblCustDetails = "TRUNCATE tbl_cust_details";
        $tblPembayaran = "TRUNCATE tbl_pembayaran";
        $tblPelunasan = "TRUNCATE tbl_pelunasan";
        $tblCheckout = "TRUNCATE tbl_checkout";

        $run1 = mysqli_query($koneksi,$tblBooking);
        $run2 = mysqli_query($koneksi,$tblCheckin);
        $run3 = mysqli_query($koneksi,$tblCustomer);
        $run4 = mysqli_query($koneksi,$tblCustDetails);
        $run5 = mysqli_query($koneksi,$tblPembayaran);
        $run6 = mysqli_query($koneksi,$tblPelunasan);
        $run7 = mysqli_query($koneksi,$tblCheckout);
        break;

    case 'testValue':
        # code...
        $nomorId = idBooking();
        echo $nomorId;
        break;
    
    default:
        # code...
        break;
}
?>