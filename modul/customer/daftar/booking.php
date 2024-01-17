
<?php 
include '../../koneksi/koneksi.php';
$idKamar = $_GET['id_kamar'];
$qry = "SELECT * FROM vw_kamar WHERE id_kamar LIKE '%".$idKamar."%'";
$queryKamar = "SELECT * FROM tbl_kamar WHERE id_kamar LIKE '%".$idKamar."%'";
$exec = mysqli_query($koneksi,$qry);
$execKamar = mysqli_query($koneksi,$queryKamar);
$fetch_arr = mysqli_fetch_array($exec);
$fetchArrKamar = mysqli_fetch_array($execKamar);
?>

<script>
    $(document).ready(function(){
        $("#contentUpload").hide();

        var namaKamar = $("#idKamar").val();
        
        $("#datePickerCheckIn, #datePickerCheckOut").datepicker({
            dateFormat: "yy-mm-dd",
            minDate:0
        });

        $("#datePickerCheckOut").change(function(){

            var checkinDate = new Date($("#datePickerCheckIn").val());
            var checkinOutDate = new Date($("#datePickerCheckOut").val());
            var idTipeKamar = $("#idTipeKamar").val();

            if (checkinDate >= checkinOutDate) {
                tanggalTidakValid();
                return;
            }

            var oneDay = 24 * 60 * 60 * 1000; // jam * menit * detik * ms
            var diffDays = Math.round(Math.abs((checkinDate - checkinOutDate) / oneDay));

            var weekdayRate, weekendRate;

            switch (idTipeKamar) {
                case "FES2KY7906BN1JMZ": // melati
                weekdayRate = 210000;
                weekendRate = 250000;
                    break;

                case "O4J6NIQ9T0AWCESG": // anggrek
                weekdayRate = 230000;
                weekendRate = 270000;
                    break;

                case "3W4ILG5E8CUHVQJF": // VIP
                weekdayRate = 260000;
                weekendRate = 320000;
                    break;

                case "SR9E4PUYNA1QLOZ6": //Family Room
                weekdayRate = 280000;
                weekendRate = 350000;
                    break;
            
                default:
                    return;
            }

            var totalPrice = 0;

            for (var i = 0; i < diffDays; i++) {
                var currentDate = new Date(checkinDate.getTime() + (i * oneDay));

                // Periksa apakah ini hari pertama (check-in) atau hari terakhir (check-out)
                var isFirstDay = i === 0;
                var isLastDay = i === diffDays - 1;

                if ((isFirstDay && checkinDate.getHours() > 12) || (isLastDay && checkinOutDate.getHours() <= 12)) {
                    // Jika ini hari pertama dan check-in setelah jam 12,
                    // atau ini hari terakhir dan check-out sebelum jam 12,
                    // tambahkan 1 hari ke total harga.
                    if (currentDate.getDay() === 0 || currentDate.getDay() === 6) {
                        totalPrice += weekendRate;
                    } else {
                        totalPrice += weekdayRate;
                    }
                } else {
                    // Jika bukan hari pertama atau terakhir, tambahkan sesuai hari kerja atau akhir pekan.
                    if (currentDate.getDay() === 0 || currentDate.getDay() === 6) {
                        totalPrice += weekendRate;
                    } else {
                        totalPrice += weekdayRate;
                    }
                }
            }

            $("#idTotalBayar").html("Rp. " + totalPrice);
            $("#idTotalTagihan").val(totalPrice);

            
        })
        
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
            var maxSizeMB = 0.7;
            var fileSize = this.files[0].size / 1024 / 1024;

            var fileExt = file.name.split('.').pop().toLowerCase();

            if ($.inArray(fileExt, validExt) === -1) {
                invalidEkstensi();
                $("#idContentUpload").val("");
                return false;
            }
            else{
                if (fileSize > maxSizeMB) {
                    ukuranGambarError();
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
                
            }
        });

        
    });
</script>

<div class="container mt-3 mb-3">
        <div class="card">
            <div class="card-header text-center">
                Booking Online
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Isi data diri pemesan</h5>
                <form method="post" class="" id="idForm_BookingCustomer" autocomplete="off" enctype="multipart/form-data">

                <input type="text" readonly name="nameIdKamar" hidden value="<?php echo $fetch_arr['id_kamar']; ?>">

                <input type="text" id="idTipeKamar" readonly hidden value="<?php echo $fetchArrKamar['id_namaKamar']; ?>">

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
                            <label class="form-label">Check In</label>
                            <input type="text" name="nameTanggalCheckIn" class="form-control" id="datePickerCheckIn">
                            <div class="form-text">Isi tanggal check in.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Check Out</label>
                            <input type="text" name="nameTanggalCheckOut" class="form-control" id="datePickerCheckOut">
                            <div class="form-text">Isi tanggal check out.</div>
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

                        <input type="text" name="nameTotalTagihan" id="idTotalTagihan" readonly hidden>

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