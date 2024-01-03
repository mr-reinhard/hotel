<?php include '../../koneksi/koneksi.php' ?>
<div class="card">
    <div class="card-header">
        Pengaturan Kamar
    </div>
    <div class="card-body">
        <h5 class="card-title text-center">Tambah Kamar</h5>

        <div class="container form-control">

            <form id="idForm_tambahKamar" method="post" autocomplete="off">
                <div class="mb-3">
                    <label for="id_inputNamaKamar" class="form-label">Nama Kamar</label>
                    <select name="name_pilihKamar" id="id_inputNamaKamar" class="form-select">
                    <option value="" disabled selected>-- Pilih Tipe --</option>
                    <?php
                    $query = "SELECT * FROM tbl_nama_kamar ORDER BY namaKamar ASC";
                    $result = mysqli_query($koneksi,$query);
                    while ($jumlahData = mysqli_fetch_array($result)) {
                    // code...
                    echo "<option value = '".$jumlahData['id_namaKamar']."'>".$jumlahData['namaKamar']."</option>";
                    }
                    ?>
                    </select>
                    <button type="button" class="btn btn-success" id="idButton_tambahNamaKamar"><i class="fa-solid fa-circle-plus"></i></button>
                </div>
    
                <div class="mb-3">
                    <label for="id_inputLantaiKamar" class="form-label">Lantai</label>
                    <select name="name_pilihLantai" id="idPilih_lantaiKamar" class="form-select">
                        <option value="" disabled selected>-- Pilih Lantai --</option>
                    </select>
                    <button type="button" class="btn btn-success" id="id_tambahLantai"><i class="fa-solid fa-circle-plus"></i></button>
                </div>
    
                <div class="mb-3">
                    <label for="id_inputNomorKamar" class="form-label">Nomor</label>
                    <input type="text" name="name_nomorKamar" class="form-control" id="id_inputNomorKamar" maxlength="4">
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>

    </div>
</div>