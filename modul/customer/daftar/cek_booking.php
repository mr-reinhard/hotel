
<script>
    $(document).ready(function(){
        $("#id_cekBooking_customer").keyup(function(){
            $("#contentBooking").empty();
            var inputBooking = $(this).val();

            if (inputBooking.length >= 6) {
                var nilaiBooking = $("#id_cekBooking_customer").val();
                $.ajax({
                    url:"../koneksi/service_customer.php?aksi=cariKodeBooking",
                    method:"POST",
                    data:{
                        id_cekBooking_customer:nilaiBooking
                    },
                    dataType:"text",
                    success:function(data){
                        $("#contentBooking").html(data);
                        $("#id_cekBooking_customer").val("");
                    }

                })
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
                <p class="card-text">Masukkan kode booking anda</p>
                <div id="idKeterangan"></div>
                <input type="text" name="" id="id_cekBooking_customer" class="form-control text-center" maxlength="6">
            </div>
    
            <div class="card-footer text-muted">
                Danau Indah Utama
            </div>

    
        </div>

        <div id="contentBooking"></div>

    </div>



