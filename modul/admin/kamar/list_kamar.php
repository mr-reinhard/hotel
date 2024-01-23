<?php 
include '../../koneksi/koneksi.php';
?>
<script>
    $(document).ready(function(){
        $("#idPilihKamar").change(function(){
            var id_namaKamar = $(this).val();
                $.ajax({
                url:"../koneksi/service.php?aksi=loadListKamar",
                method:"POST",
                data:{
                    idPilihKamar:id_namaKamar
                },
                dataType:"text",
                success:function(data)
                {
                    $('#idListKamar').html(data);
                }
                });
        })
    })
</script>

<div class="card text-center">

    <div class="card-header">

        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <select name="" id="idPilihKamar" class="form-select">
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

            <h5 class="card-title">Melati</h5>

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kamar</th>
                        <th scope="col">Nomor</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody id="idListKamar">

                </tbody>

            </table>

        </div>
    </div>

</div>