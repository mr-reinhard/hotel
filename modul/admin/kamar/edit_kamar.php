<?php 
include '../../koneksi/koneksi.php';

$idKamar = $_GET['idBtn_editKamar'];
$query = "SELECT * FROM vw_kamar WHERE id_kamar LIKE '%".$idKamar."%'";
$runQuery = mysqli_query($koneksi,$query);
$fetchArr = mysqli_fetch_array($runQuery);

?>

<div class="card">
    <div class="card-header">
        Pengaturan Kamar
    </div>
    <div class="card-body">
        <h5 class="card-title text-center">Edit Kamar</h5>

        <div class="container form-control">

            <form method="post" id="idFormEditKamar" autocomplete="off">

                <input type="text" name="nameIdKamar" value="<?php echo $idKamar ?>" readonly hidden>
                <input type="text" name="nameIdNamaKamar" value="<?php echo $fetchArr['id_namaKamar'] ?>" readonly hidden>
                <div class="mb-3">
                    <label for="id_inputNamaKamar" class="form-label">Nama Kamar</label>
                    <input type="text" name="nameNamaKamar" class="form-control" id="id_inputNamaKamar" value="<?php echo $fetchArr['namaKamar'] ?>" aria-describedby="emailHelp">
                    
                </div>
    
                <div class="mb-3">
                    <label for="id_inputNomorKamar" class="form-label">Nomor</label>
                    <input type="text" name="nameNomorKamar" class="form-control" id="id_inputNomorKamar" maxlength="4" value="<?php echo $fetchArr['nomor_kamar'] ?>">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
</div>