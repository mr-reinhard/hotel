<?php include '../../koneksi/koneksi.php' ?>
<div class="card">
    <div class="card-header">
        Pengaturan Kamar
    </div>
    <div class="card-body">
        <h5 class="card-title text-center">Tambah Lantai</h5>

        <div class="container form-control">

            <form id="idForm_tambahLantai" method="post" autocomplete="off">
                <div class="mb-3">
                    <label for="id_inputNamaKamar" class="form-label">Nama Kamar</label>
                    <select name="namePilihNamaKamar_formTambahKamar" id="id_inputNamaKamar" class="form-select">
                        <option value="" disabled selected>-- Pilih Kamar --</option>
                        <?php
                        $query = "SELECT * FROM tbl_nama_kamar ORDER BY namaKamar ASC";
                        $result = mysqli_query($koneksi,$query);
                        while ($jumlahData = mysqli_fetch_array($result)) {
                        // code...
                        echo "<option value = '".$jumlahData['id_namaKamar']."'>".$jumlahData['namaKamar']."</option>";
                        }
                        ?>
                    </select>
                </div>
    
                <div class="mb-3">
                    <label for="id_inputLantaiKamar" class="form-label">Lantai</label>
                    <input type="text" name="nameNomorLantai_formTambahLantai" id="id_inputLantaiKamar" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>

    </div>
</div>