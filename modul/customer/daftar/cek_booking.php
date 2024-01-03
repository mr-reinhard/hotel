
<script>
    $(document).ready(function(){
        $("#id_cekBooking_customer").keyup(function(){
            $("h1").remove();
            var inputBooking = $(this).val();

            if (inputBooking.length >= 6) {
                $("#idKeterangan").append("<h1>Kode sudah terdaftar</h1>");
            }
        });
    });
</script>
    <div class="container">

        <div class="card text-center">

            <div class="card-header">
                Danau Indah Utama
            </div>
    
            <div class="card-body">
                <h5 class="card-title">Cek kode booking</h5>
                <p class="card-text">Cari kode booking anda</p>
                <div id="idKeterangan"></div>
                <input type="text" name="" id="id_cekBooking_customer" class="form-control" maxlength="6">
            </div>
    
            <div class="card-footer text-muted">
                Danau Indah Utama
            </div>
    
        </div>



