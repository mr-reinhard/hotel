<?php 
include '../../koneksi/koneksi.php';
?>

<div class="card">
    <h5 class="card-header">Form Pemesanan Kamar</h5>
    <div class="card-body">
        <div class="container form-control">
<!-- 
        Harga Kamar

        - Weekdays
        Melati 210.000
        Anggrek 230.000
        VIP 260.000

        - Weekend
        Melati 250.000
        Anggrek 270.000
        VIP 320.000
     -->
        <script>
            $(document).ready(function(){

                //========================================

                $("#id_dateCheckin,#id_dateCheckOut").change(function(){
                    var tanggalCheckin = new Date($("#id_dateCheckin").val());
                    var tanggalCheckout = new Date($("#id_dateCheckOut").val());
                    var nilaiKamar = $("#id_tipeKamar_formDaftarAdmin").val();

                    if (tanggalCheckout < tanggalCheckin) {
                        console.log("Tanggal tidak valid");
                        return;
                    }

                    var miliSecondPerDay = 1000 * 60 * 60 * 24;

                    var timeDiff = Math.abs(tanggalCheckout.getTime() - tanggalCheckin.getTime());
                    var jumlahHari = Math.ceil(timeDiff / miliSecondPerDay);// menghitung jumlah hari

                    // JIka checkout malam dan keluar besok akan dihutung 1 hari
                    if (tanggalCheckin.getDate() !== tanggalCheckout.getDate()) {
                        jumlahHari = 1;
                    }

                    var melatiWeekDays = 210000;
                    var melatiWeekEnd = 250000;
                    var anggrekWeekDays = 230000;
                    var anggrekWeekEnd = 270000;
                    var vipWeekDays = 260000;
                    var vipWeekEnd = 320000;
                    var totalHarga = 0;

                    var tanggalSekarang  = new Date(tanggalCheckin);

                    while (tanggalSekarang <= tanggalCheckout) {

                        var hariSekarang = tanggalSekarang.getDay();// mendapatkan hari dalam bentuk angka

                        if (hariSekarang === 0 || hariSekarang === 6) {
                            // hari sabtu minggu dianggap weekend
                            totalHarga += melatiWeekEnd;
                        }
                        else{
                            totalHarga += melatiWeekDays;
                        }
                        tanggalSekarang.setDate(tanggalSekarang.getDate() + 1);// pindah ke hari berikut nya
                    }

                    console.log(totalHarga);
                    
                    //$("#idTotalHarga").html("Rp "+ totalHarga)

                    
                    
                });
            });
        </script>

            <form>

                <div class="mb-3">
                    <label for="id_inputNamaCustomer" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="id_inputNamaCustomer" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="id_inputTipeKamar" class="form-label">Tipe Kamar</label>
                    <select name="" id="id_tipeKamar_formDaftarAdmin" class="form-select">
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
                    <label for="id_dateCheckin" class="form-label">Tanggal Check In</label>
                    <input type="datetime-local" name="" id="id_dateCheckin" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="id_dateCheckOut">Tanggal Check Out</label>
                    <input type="datetime-local" name="" id="id_dateCheckOut" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="id_telfonCustomer">Telfon</label>
                    <input type="text" name="" id="id_telfonCustomer" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="id_remarksCustomer">Catatan</label>
                    <textarea name="" id="id_remarksCustomer" class="form-control" cols="5" rows="3" placeholder="Contoh, Pembayaran atas nama Mrs, Ms Jane"></textarea>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        Total pembayaran
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p id="idTotalHarga">0</p>
                            <footer class="blockquote-footer">Pembayaran dapat dilakukan setelah halaman ini</footer>
                        </blockquote>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Lanjut</button>

            </form>

        </div>
    </div>
</div>