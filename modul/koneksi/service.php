<?php 

include 'koneksi.php';

function randomID(){
    $unique_id = '0123456789ABCDEFGHIJKLMNOPQRSTUVWQYZ';
    $output_id = substr(str_shuffle($unique_id),0,16);
    return $output_id;
}

switch ($_GET['aksi']) {

    // Simpan data kamar
    case 'simpan_data_kamar':
        # code...
        $idKamar = randomID();
        $idNamaKamar = $_POST['name_pilihKamar'];
        $nomorLantai = $_POST['name_pilihLantai'];
        $nomorRuangan = $_POST['name_nomorKamar'];

        $sql = "INSERT INTO tbl_kamar(id_kamar,id_namaKamar,id_nomorLantai,
        nomor_kamar,id_status_kamar)VALUES('$idKamar','$idNamaKamar','$nomorLantai','$nomorRuangan','SK1')";
        $run = mysqli_query($koneksi,$sql);
        break;

    case 'hapus_data_kamar':
        # code...
        $idKamar = $_POST['id_kamar'];

        $sql = "DELETE FROM tbl_kamar WHERE id_kamar LIKE '%".$idKamar."%'";
        $sqlRun = mysqli_query($koneksi,$sql);
        break;

        // Simpan tipe kamar
    case 'simpan_tipe_kamar':
        # code...
        $idTipe = randomID();
        $namaTipe = $_POST['name_namaTipeKamar'];

        $cek = "SELECT * FROM tbl_nama_kamar WHERE namaKamar LIKE '%".$namaTipe."%'";
        $insert = "INSERT INTO tbl_nama_kamar(id_namaKamar,namaKamar)VALUES('$idTipe','$namaTipe')";
        
        $runCek = mysqli_query($koneksi,$cek);
        if (mysqli_num_rows($runCek) > 0) {
            # code...
            echo "nama_kamar_ada";
        }
        else {
            # code...
            $runInsert = mysqli_query($koneksi, $insert);    
        }
        break;

    case 'simpan_nomor_lantai':
        # code...
        $kodeLantai = randomID();
        $kodeKamar = $_POST['namePilihNamaKamar_formTambahKamar'];
        $nomorLantai = $_POST['nameNomorLantai_formTambahLantai'];

        $cek = "SELECT * FROM tbl_nomor_lantai WHERE id_namaKamar LIKE '%".$kodeKamar."%' AND nomorLantai LIKE '%".$nomorLantai."%'";
        $insert = "INSERT INTO tbl_nomor_lantai(id_nomorLantai,id_namaKamar,nomorLantai)VALUES('$kodeLantai','$kodeKamar','$nomorLantai')";

        $runCek = mysqli_query($koneksi,$cek);
        if (mysqli_num_rows($runCek) > 0) {
            # code...
            echo "nomor_kamar_ada";
        }
        else {
            # code...
            $runInsert = mysqli_query($koneksi,$insert);
        }
        break;

    case 'fetch_lantai':
        # code...
        $id_namaKamar = $_POST['id_inputNamaKamar'];
        $sql = "SELECT * FROM tbl_nomor_lantai WHERE id_namaKamar LIKE '%".$id_namaKamar."%'";
        $runSql = mysqli_query($koneksi,$sql);
        while ($hasilQuery = mysqli_fetch_array($runSql)) {
            # code...
            $idNomorLantai = $hasilQuery['id_nomorLantai'];
            $nomorLantai = $hasilQuery['nomorLantai'];
            echo "<option value = '$idNomorLantai'>$nomorLantai</option>";
        }
    break;

    case 'simpan_verifikasi':
        # code...
        $idBooking = $_POST['name_idBooking'];
        $idKamar = $_POST['name_idKamar'];
        $idPembayaran = $_POST['name_idPembayaran'];
        $jenisVerif = $_POST['name_pilihVerifikasi'];
        $catatanVerif = $_POST['name_catatanVerif'];

        $updateTblKamar = "UPDATE tbl_kamar SET id_status_kamar = 'SK2' WHERE id_kamar LIKE '%".$idKamar."%'";
        $updateCatatanPelunasan = "UPDATE tbl_pelunasan SET catatan = '$catatanVerif'  WHERE id_pembayaran LIKE '%".$idPembayaran."%'";
        $updateStatusLunas = "UPDATE tbl_pelunasan SET id_status_bayar = '$jenisVerif' WHERE id_pembayaran LIKE '%".$idPembayaran."%'";
        $insertCheckout = "INSERT INTO tbl_checkout(id_booking,id_status_checkout,tanggal_proses,catatan)VALUES('$idBooking','SC1','','')";

        $runKamar = mysqli_query($koneksi,$updateTblKamar);
        $runPelunasan = mysqli_query($koneksi, $updateCatatanPelunasan);
        $runStatusLunas = mysqli_query($koneksi,$updateStatusLunas);
        $runCheckout = mysqli_query($koneksi,$insertCheckout);
        break;

    case 'simpan_data_checkout':
        # code...
        $idBooking = $_POST['name_idBooking'];
        $idKamar = $_POST['name_idKamar'];
        $verifCheckout = $_POST['name_verifCheckout'];
        $catatanCheckout = $_POST['name_catatanCheckout'];
        $tanggalProses = date('Y-m-d H:i:s');

        $sqlUpdateStatus = "UPDATE tbl_checkout SET id_status_checkout = '$verifCheckout' WHERE id_booking LIKE '%".$idBooking."%'";
        $sqlUpdateTanggal = "UPDATE tbl_checkout SET tanggal_proses = '$tanggalProses' WHERE id_booking LIKE '%".$idBooking."%'";
        $sqlUpdateCatatan = "UPDATE tbl_checkout SET catatan = '$catatanCheckout' WHERE id_booking LIKE '%".$idBooking."%'";
        $updateKamar = "UPDATE tbl_kamar SET id_status_kamar = 'SK1' WHERE id_kamar LIKE '%".$idKamar."%'";

        $sql1 = mysqli_query($koneksi,$sqlUpdateStatus);
        $sql2 = mysqli_query($koneksi,$sqlUpdateTanggal);
        $sql3 = mysqli_query($koneksi,$sqlUpdateCatatan);
        $sql4 = mysqli_query($koneksi,$updateKamar);
        break;

    case 'truncate_tblKamar':
        # code...
        $sql = "TRUNCATE TABLE tbl_kamar";
        $run = mysqli_query($koneksi,$sql);
        break;

    case 'load_pemesan':
        # code...
        $sql = "SELECT * FROM vw_customer";
        $runSql = mysqli_query($koneksi,$sql);

        if (mysqli_num_rows($runSql) > 0) {
            # code...
            echo "data_ada";
        }
        else {
            # code...
            echo "data_tidak_ada";
        }
        
        break;

    case 'loadListKamar':
        # code...
        $idNamaKamar = $_POST['idPilihKamar'];
        $sql = "SELECT * FROM vw_kamar WHERE id_namaKamar LIKE '%".$idNamaKamar."%'";

        $runSql = mysqli_query($koneksi, $sql);

        while ($hasilData = mysqli_fetch_array($runSql)) {
            # code...
            $Kamar = $hasilData['namaKamar'];
            $Lantai = $hasilData['nomorLantai'];
            $nomorKamar = $hasilData['nomor_kamar'];
            $idKamar = $hasilData['id_kamar'];

            echo "<tr>
            <th scope='row'>
            $Kamar
            </th>

            <td>
            $Lantai
            </td>

            <td>
            $nomorKamar
            </td>

            <td>
                <button type='button' id='idBtn_editKamar' class='btn btn-warning' value='$idKamar' title='Edit' name='button'>
                    <i class='fa-solid fa-pen-to-square'></i>
                </button>

                <button type='button' id='idBtn_delKamar' class='btn btn-danger' value='$idKamar' title='Edit' name='button'>
                    <i class='fa-solid fa-trash-can'></i>
                </button>
            </td>
        </tr>";
        }
        break;

    case 'simpanEditKamar':
        # code...

        # ID
        $idKamar = $_POST['nameIdKamar'];
        $id_namaKamar = $_POST['nameIdNamaKamar'];

        # INPUT
        $nomorKamar = $_POST['nameNomorKamar'];
        $namaKamar = $_POST['nameNamaKamar'];
        

        $sqlKamar = "UPDATE tbl_kamar SET nomor_kamar = '$nomorKamar' WHERE id_kamar LIKE '%".$idKamar."%'";
        $sqlNamaKamar = "UPDATE tbl_nama_kamar SET namaKamar = '$namaKamar' WHERE id_namaKamar LIKE '%".$id_namaKamar."%'";
        

        $run1 = mysqli_query($koneksi,$sqlNamaKamar);
        $run3 = mysqli_query($koneksi,$sqlKamar);

        break;

    case 'loadGambar':
        # code...
        $idBooking = $_POST['kB'];

        $query = "SELECT * FROM tbl_bukti_transfer WHERE id_booking LIKE '%".$idBooking."%'";
        $run = mysqli_query($koneksi,$query);
        $fetchArr = mysqli_fetch_array($run);

        if (mysqli_num_rows($run) > 0) {
            # code...
            echo $fetchArr['gambar_upload'];
        }
        else{
            echo "gambartidakada";
        }

        break;
    
    default:
        # code...
        break;
}

?>