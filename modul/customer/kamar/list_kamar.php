<?php 
include '../../koneksi/koneksi.php';
?>

<script>

    $(document).ready(function(){
        $("#idNameTipeKamar").change(function(){
                var id_namaKamar = $(this).val();
                $.ajax({
                url:"../koneksi/service_customer.php?aksi=fetchKamarTersedia",
                method:"POST",
                data:{
                    idNameTipeKamar:id_namaKamar
                },
                dataType:"text",
                success:function(data)
                {
                    $('#resultRow').html(data);
                }
                });
            });
    })
</script>
<div class="card text-center">

    <div class="card-header">

        <ul class="nav nav-tabs card-header-tabs">

            <li class="nav-item">
                <select name="nameTipeKamar" id="idNameTipeKamar" class="form-select">
                    <?php
                        $query = "SELECT * FROM tbl_nama_kamar ORDER BY namaKamar ASC";
                        $result = mysqli_query($koneksi,$query);
                        while ($jumlahData = mysqli_fetch_array($result)) {
                        // code...
                        echo "<option value = '".$jumlahData['id_namaKamar']."'>".$jumlahData['namaKamar']."</option>";
                        }
                        ?>
                </select>  
            </li>
        </ul>

    </div>

    <div class="card text-center">

        <div class="card-header">
            List Kamar
        </div>

        <div class="card-body">

            <!-- <h5 class="card-title" id="idJudulKamar">Melati</h5> -->

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Lantai</th>
                        <th scope="col">Nomor</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody id="resultRow">
                </tbody>

            </table>

        </div>
    </div>

</div>