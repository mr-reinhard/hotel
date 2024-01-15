
<?php 
include '../../koneksi/koneksi.php';
$idKamar = $_GET['id_kamar'];
$qry = "SELECT * FROM vw_kamar WHERE id_kamar LIKE '%".$idKamar."%'";
$exec = mysqli_query($koneksi,$qry);
$fetch_arr = mysqli_fetch_array($exec);
?>

<script>
    $(document).ready(function(){
        $("#contentUpload").hide();

        var namaKamar = $("#idKamar").val();
        if (namaKamar == "Melati") {

            $("#idTanggalCheckIn,#idTanggalCheckOut").change(function(){
                    var tanggalCheckin = new Date($("#idTanggalCheckIn").val());
                    var tanggalCheckout = new Date($("#idTanggalCheckOut").val());

                    if (tanggalCheckout < tanggalCheckin) {
                        
                        tanggalTidakValid();
                        $("#idTanggalCheckIn").val("");
                        $("#idTanggalCheckOut").val("");
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
                    
                    $("#idTotalBayar").html("Rp "+ totalHarga)
                    $("#idPancingan").val(totalHarga)

                });
        }
        else{
            if (namaKamar == "Anggrek") {
                $("#idTanggalCheckIn,#idTanggalCheckOut").change(function(){
                    var tanggalCheckin = new Date($("#idTanggalCheckIn").val());
                    var tanggalCheckout = new Date($("#idTanggalCheckOut").val());

                    if (tanggalCheckout < tanggalCheckin) {
                        $("#idTanggalCheckIn").val("");
                        $("#idTanggalCheckOut").val("");
                        tanggalTidakValid();
                        return;
                    }

                    var miliSecondPerDay = 1000 * 60 * 60 * 24;

                    var timeDiff = Math.abs(tanggalCheckout.getTime() - tanggalCheckin.getTime());
                    var jumlahHari = Math.ceil(timeDiff / miliSecondPerDay);// menghitung jumlah hari

                    // JIka checkout malam dan keluar besok akan dihutung 1 hari
                    if (tanggalCheckin.getDate() !== tanggalCheckout.getDate()) {
                        jumlahHari = 1;
                    }

                    var anggrekWeekDays = 230000;
                    var anggrekWeekEnd = 270000;
                    var totalHarga = 0;

                    var tanggalSekarang  = new Date(tanggalCheckin);

                    while (tanggalSekarang <= tanggalCheckout) {

                        var hariSekarang = tanggalSekarang.getDay();// mendapatkan hari dalam bentuk angka

                        if (hariSekarang === 0 || hariSekarang === 6) {
                            // hari sabtu minggu dianggap weekend
                            totalHarga += anggrekWeekEnd;
                        }
                        else{
                            totalHarga += anggrekWeekDays;
                        }
                        tanggalSekarang.setDate(tanggalSekarang.getDate() + 1);// pindah ke hari berikut nya
                    }

                    console.log(totalHarga);
                    
                    $("#idTotalBayar").html("Rp "+ totalHarga)
                    $("#idPancingan").val(totalHarga)
                    
                });
            }
            else{
                if (namaKamar == "VIP") {
                    $("#idTanggalCheckIn,#idTanggalCheckOut").change(function(){
                    var tanggalCheckin = new Date($("#idTanggalCheckIn").val());
                    var tanggalCheckout = new Date($("#idTanggalCheckOut").val());

                    if (tanggalCheckout < tanggalCheckin) {
                        tanggalTidakValid();
                        $("#idTanggalCheckIn").val("");
                        $("#idTanggalCheckOut").val("");
                        return;
                    }

                    var miliSecondPerDay = 1000 * 60 * 60 * 24;

                    var timeDiff = Math.abs(tanggalCheckout.getTime() - tanggalCheckin.getTime());
                    var jumlahHari = Math.ceil(timeDiff / miliSecondPerDay);// menghitung jumlah hari

                    // JIka checkout malam dan keluar besok akan dihutung 1 hari
                    if (tanggalCheckin.getDate() !== tanggalCheckout.getDate()) {
                        jumlahHari = 1;
                    }

                    var vipWeekDays = 260000;
                    var vipWeekEnd = 320000;
                    var totalHarga = 0;

                    var tanggalSekarang  = new Date(tanggalCheckin);

                    while (tanggalSekarang <= tanggalCheckout) {

                        var hariSekarang = tanggalSekarang.getDay();// mendapatkan hari dalam bentuk angka

                        if (hariSekarang === 0 || hariSekarang === 6) {
                            // hari sabtu minggu dianggap weekend
                            totalHarga += vipWeekEnd;
                        }
                        else{
                            totalHarga += vipWeekDays;
                        }
                        tanggalSekarang.setDate(tanggalSekarang.getDate() + 1);// pindah ke hari berikut nya
                    }

                   
                    
                    $("#idTotalBayar").html("Rp "+ totalHarga)

                    $("#idPancingan").val(totalHarga)
                    
                });
                }
            }
        }
        
        //Kondisi Cash dan Non tunai
        $("#idJenisPembayaran").change(function(){
            function hideElement(){
                $("#contentUpload").hide();
            }

            function showElement(){
                $("#contentUpload").show();
            }
            // JP1 =  CASH
            var InputPembayaran = $("#idJenisPembayaran").val();

            if (InputPembayaran == "JP1") {
                hideElement();
                return false;
            }
            else{
                showElement();
            }
        });

        // cek ekstensi dan Preview gambar yang di upload
        $("#contentUpload").on("change","#idContentUpload", function(){
            var file = this.files[0];
            var validExt = ['png','jpg','jpeg'];

            var fileExt = file.name.split('.').pop().toLowerCase();

            if ($.inArray(fileExt, validExt) === -1) {
                console.log("Ekstensi file tidak valid");
                $("#idContentUpload").val("");
                return false;
            }
            else{
                var reader = new FileReader();

                reader.onload = function(event){
                    var imageUrl = event.target.result;
                    var previewDiv = $("#previewImage");
                    previewDiv.html('<img src="' + imageUrl + '" alt="Preview Image" class = "img-fluid rounded-start">');
                }
                reader.readAsDataURL(file);
            }
        });

        $("#contentUpload").change("#idContentUpload",function(){
            var statusUpload = $("#idContentUpload").val();
            
        })
    });
</script>

<div class="container mt-3 mb-3">
        <div class="card">
            <div class="card-header text-center">
                Booking Online
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Isi data diri pemesan</h5>
                <form method="post" class="" id="idForm_BookingCustomer" autocomplete="on" enctype="multipart/form-data">

                <input type="text" readonly name="nameIdKamar" hidden value="<?php echo $fetch_arr['id_kamar']; ?>">

                        <div class="mb-3">
                            <label for="idKamar" class="form-label">Tipe Kamar</label>
                            <input type="text" value="<?php echo $fetch_arr['namaKamar']; ?>" class="form-control" id="idKamar"
                                aria-describedby="emailHelp" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="idLantai" class="form-label">Lantai</label>
                            <input type="text" value="<?php echo $fetch_arr['nomorLantai']; ?>" class="form-control" id="idLantai"
                                aria-describedby="emailHelp" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="idNomor" class="form-label">Nomor Kamar</label>
                            <input type="text" value="<?php echo $fetch_arr['nomor_kamar']; ?>" class="form-control" id="idNomor"
                                aria-describedby="emailHelp" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="idEmail" class="form-label">Email</label>
                            <input type="text" class="form-control" id="idEmail"
                                aria-describedby="emailHelp" name="nameEmailCustomer">
                            <div id="emailHelp" class="form-text">Kosongkan jika tidak perlu.</div>
                        </div>

                        <div class="mb-3">
                            <label for="idNamaLengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="idNamaLengkap"
                                aria-describedby="emailHelp" name="nameNamaCustomer" required>
                            <div id="emailHelp" class="form-text">Isi nama lengkap pemesan.</div>
                        </div>

                        <div class="mb-3">
                            <label for="idTanggalCheckIn" class="form-label">Check In</label>
                            <input type="datetime-local" name="nameTanggalCheckIn" class="form-control" id="idTanggalCheckIn" aria-describedby="checkIn" required>
                            <div id="checkIn" class="form-text">Isi tanggal check in.</div>
                        </div>

                        <div class="mb-3">
                            <label for="idTanggalCheckOut" class="form-label">Check Out</label>
                            <input type="datetime-local" name="nameTanggalCheckOut" class="form-control" id="idTanggalCheckOut" aria-describedby="checkOut" required>
                            <div id="checkOut" class="form-text">Isi tanggal check out.</div>
                        </div>

                        <div class="mb-3">
                            <label for="idTelfon" class="form-label">Telfon</label>
                            <input type="text" class="form-control" id="idTelfon"
                                aria-describedby="emailHelp" name="nameTelfonCustomer" required>
                            <div id="emailHelp" class="form-text">Isi nomor yang dapat dihubungi.</div>
                        </div>

                        <div class="mb-3">
                            <label for="idJenisPembayaran">Jenis Pembayaran</label>
                            <select name="nameSelectJenisPembayaran" id="idJenisPembayaran" class="form-select" required>
                                <option value="JP1">Cash</option>
                                <option value="JP2">Non Tunai</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="idCatatan" class="form-label">Catatan</label>
                            <textarea name="nameCatatanCustomer" id="" cols="30" rows="3" class="form-control" placeholder="Contoh, Pembayaran atas nama Mr/Mrs/Ms John atau Jane" required></textarea>
                            <div id="idCatatanp" class="form-text">Tambahan informasi, kosongkan jika tidak perlu.</div>
                        </div>

                        <input type="text" name="nameTotalTagihan" id="idPancingan" readonly hidden>

                        <div class="card mb-3">
                            <div class="card-header">
                                Total pembayaran
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p id="idTotalBayar"></p>
                                </blockquote>
                            </div>
                        </div>

                        <!-- Bukti Transfer -->
                        <div id="contentUpload">

                            <div class="card">
                                <div class="card-header">
                                    Upload Bukti Transfer
                                </div>
                                <div class="card-body">
                                    <input type="file" name="nameBuktiTransfer" id="idContentUpload" value="" class="form-control" accept="image/*">
                                </div>
                            </div>

                            
                            <div class="card">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4" id="previewImage">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Preview Bukti transfer -->

                        <div class="card">
                            <div class="card-header">
                              Cara Pembayaran
                            </div>
                            <div class="card-body">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                      <div class="col-md-4">
                                        <img src="../../asset/image/bca.png" class="img-fluid rounded-start mt-5" alt="...">
                                      </div>
                                      <div class="col-md-8">
                                        <div class="card-body">
                                          <h5 class="card-title">6320226269</h5>
                                          <p class="card-text">SABAR RANTO</p>
                                          <p class="card-text"><small class="text-muted">Bank Central Asia</small></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                          </div>

                        <button type="submit" class="btn btn-primary mt-3">Lanjutkan</button>
                </form>
            </div>
            <div class="card-footer text-muted text-center">
                Danau Indah Utama
            </div>
        </div>
    </div>