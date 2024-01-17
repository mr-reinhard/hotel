<?php 
include 'koneksi.php';
include 'fungsi.php';

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

    function idComment(){
        $unique_id = '0123456789ABCDEFGHIJKLMNOPQRSTUVWQYZ';
        $output_id = substr(str_shuffle($unique_id),0,5);
        return $output_id;
    }

    function idGambar(){
        $unique_id = '0123456789ABCDEFGHIJKLMNOPQRSTUVWQYZ';
        $output_id = substr(str_shuffle($unique_id),0,5);
        return $output_id;
    }

    function fnTestUpload(){
        $fileName = $_FILES['nameBuktiTransfer']['name'];
        $tempName = $_FILES['nameBuktiTransfer']['tmp_name'];
        $folder = "upload/" . $fileName;

        move_uploaded_file($tempName, $folder);
    }

    function uploadGambar(){
        $namaFile = $_FILES['nameBuktiTransfer']['name']; //undefined index
        $ukuranFile = $_FILES['nameBuktiTransfer']['size'];
        $pesanError = $_FILES['nameBuktiTransfer']['error'];
        $tmpName = $_FILES['nameBuktiTransfer']['tmp_name'];
        //$uploadDir = '../../asset/upload';

        // if ($pesanError === 4) {
        //     # code...
        //     echo "gambartidakada";
        //     return false;
        // }

        // pisahkan string
        $extGambar = explode('.', $namaFile);
        //$extGambar = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
        //$extGambar = end($extGambar);
        $extGambar = strtolower(end($extGambar));

        // cek ukuran
        if ($ukuranFile > 500000) {
            # code...
            # 0 = error
            # 1 = ok
            echo "ukuranterlalubesar";
            return false;
        }

        // lolos
        $namaFileBaru = idGambar();
        //$namaFileBaru .= '.';
        $namaFileBaru .= '.' . $extGambar;

        move_uploaded_file($tmpName, '../../asset/upload/' . $namaFileBaru);

        return $namaFileBaru;
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
        //======
        

        if ($jenisPembayaran == 'JP1') {
            # code...
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

            $runCust = mysqli_query($koneksi, $sqlCust);
            $runCustDetails = mysqli_query($koneksi, $sqlCustDetails);
            $runBooking = mysqli_query($koneksi, $sqlBooking);
            $runCheckIn = mysqli_query($koneksi, $sqlCheckIn);
            $runPembayaran = mysqli_query($koneksi, $sqlPembayaran);
            $runPelunasan = mysqli_query($koneksi, $sqlPelunasan);

            echo "$kodeBooking";

            return false;
        }
        else{
            
            $buktiTransfer = uploadGambar();
            
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

            // ke table upload
            $sqlUpload = "INSERT INTO tbl_bukti_transfer(id_booking,gambar_upload)VALUES('$kodeBooking','$buktiTransfer')";

            $runCust = mysqli_query($koneksi, $sqlCust);
            $runCustDetails = mysqli_query($koneksi, $sqlCustDetails);
            $runBooking = mysqli_query($koneksi, $sqlBooking);
            $runCheckIn = mysqli_query($koneksi, $sqlCheckIn);
            $runPembayaran = mysqli_query($koneksi, $sqlPembayaran);
            $runPelunasan = mysqli_query($koneksi, $sqlPelunasan);
            $runUpload = mysqli_query($koneksi, $sqlUpload);
            
            echo "$kodeBooking";
            return false;
        }
        
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
        $tblUpload = "TRUNCATE tbl_bukti_transfer";

        $run1 = mysqli_query($koneksi,$tblBooking);
        $run2 = mysqli_query($koneksi,$tblCheckin);
        $run3 = mysqli_query($koneksi,$tblCustomer);
        $run4 = mysqli_query($koneksi,$tblCustDetails);
        $run5 = mysqli_query($koneksi,$tblPembayaran);
        $run6 = mysqli_query($koneksi,$tblPelunasan);
        $run7 = mysqli_query($koneksi,$tblCheckout);
        $run8 = mysqli_query($koneksi,$tblUpload);
        break;

    case 'simpanComment':
        # code...
        $idUser = idComment();
        $namaUser = $_POST['nameNamaUser'];
        $commentUser = $_POST['nameCommentUser'];
        $tanggalComment = date('Y-m-d');

        $insertUser = "INSERT INTO tbl_user_comment(id_user,nama_user)VALUES('$idUser','$namaUser')";
        $insertComment = "INSERT INTO tbl_comment(id_user,comment,tgl_comment)VALUES('$idUser','$commentUser','$tanggalComment')";

        $runUser = mysqli_query($koneksi,$insertUser);
        $runComment = mysqli_query($koneksi,$insertComment);
        break;

    case 'fetchKamarTersedia':
            # code...
            $idNamaKamar = $_POST['idNameTipeKamar'];
            $sql = "SELECT * FROM vw_kamar_tersedia WHERE id_namaKamar LIKE '%".$idNamaKamar."%'";
    
            $runSql = mysqli_query($koneksi, $sql);
            while ($hasilQuey = mysqli_fetch_array($runSql)) {
                # code...
                $namaKamar = $hasilQuey['namaKamar'];
                $nomorLantai = $hasilQuey['nomorLantai'];
                $nomorKamar = $hasilQuey['nomor_kamar'];
                $idKamar = $hasilQuey['id_kamar'];
    
                echo "<tr>
                <th scope='row'>
                $namaKamar
                </th>

                <td>
                $nomorLantai
                </td>

                <td>
                $nomorKamar
                </td>

                <td>
                    <button type='button' id='idBtn_orderKamar' class='btn btn-success' value='$idKamar' title='Edit' name='Button'>
                        <i class='fa-solid fa-arrow-right-to-bracket'></i>
                    </button>
                </td>
            </tr>";
            }
    break;


    case 'cariKodeBooking':
        # code...
        $kodeBooking = $_POST['id_cekBooking_customer'];

        $sql = "SELECT * FROM vw_pembayaran WHERE id_booking LIKE '%".$kodeBooking."%'";
        $runSQl = mysqli_query($koneksi, $sql);
        while ($hasil = mysqli_fetch_array($runSQl)) {
            # code...
            echo "  


            <form>
                <div class='mb-3'>
                  <label for='exampleInputPassword1' class='form-label'>ID BOOKING</label>
                  <input type='text' class='form-control' id='exampleInputPassword1' value='". $hasil['id_booking']."'>
                </div>
            
                <div class='mb-3'>
                  <label for='exampleInputPassword1' class='form-label'>Pemesan</label>
                  <input type='text' class='form-control' id='exampleInputPassword1' value='".$hasil['nama_customer']. "'>
                </div>
            
                <div class='mb-3'>
                  <label for='exampleInputPassword1' class='form-label'>Tipe Kamar</label>
                  <input type='text' class='form-control' id='exampleInputPassword1' value='".$hasil['namaKamar']."'>
                </div>
            
                <div class='mb-3'>
                  <label for='exam-pleInputPassword1' class='form-label'>Check in</label>
                  <input type='text' class='form-control' id='exampleInputPassword1' value='".tanggalSaja($hasil['tanggal_checkin']),"'>
                </div>
            
                <div class='mb-3'>
                  <label for='exam-pleInputPassword1' class='form-label'>Check Out</label>
                  <input type='text' class='form-control' id='exampleInputPassword1' value='".tanggalSaja($hasil['tanggal_checkout'])."'>
                </div>
            
                <div class='mb-3'>
                  <label for='exam-pleInputPassword1' class='form-label'>Jenis Pembayaran</label>
                  <input type='text' class='form-control' id='exampleInputPassword1' value='".$hasil['jenis_bayar']."'>
                </div>
            
                <div class='mb-3'>
                  <label for='exam-pleInputPassword1' class='form-label'>Total</label>
                  <input type='text' class='form-control' id='exampleInputPassword1' value='Rp. ".format_rupiah($hasil['total_bayar'])."'>
                </div>
            </form>";
        }


        break;
    
    default:
        # code...
        break;
}
?>