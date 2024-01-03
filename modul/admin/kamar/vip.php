<div class="card text-center">

    <div class="card-header">

        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link" aria-current="true" href="#" id="id_kamarMelati">Melati</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" aria-current="true" href="#" id="id_kamarAnggrek">Anggrek</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" aria-current="true" href="#" id="id_kamarVip">VIP</a>
            </li>
        </ul>

    </div>

    <div class="card text-center">

        <div class="card-header">
            List Kamar
        </div>

        <div class="card-body">

            <h5 class="card-title">VIP</h5>

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Lantai</th>
                        <th scope="col">Nomor</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
        include '../../koneksi/koneksi.php';

        $no = 1;
        $query = "SELECT * FROM vw_kamar_vip ORDER BY nomorLantai ASC";
        $execQuery = mysqli_query($koneksi, $query);
        while ($hasil = mysqli_fetch_array($execQuery)) {
            # code...
            ?>
                <div id="result">
                    <tr>
                        <th scope="row">
                            <?php echo $hasil['namaKamar']; ?>
                        </th>
    
                        <td>
                            <?php echo $hasil['nomorLantai']; ?>
                        </td>

                        <td>
                            <?php echo $hasil['nomor_kamar']; ?>
                        </td>
    
                        <td>
                            <button type="button" id="" class="btn btn-warning" value="<?php echo $hasil['id_kamar']; ?>" title="Edit" name="button">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            <button type="button" id="idBtn_delVip" class="btn btn-danger" value="<?php echo $hasil['id_kamar']; ?>" title="Edit" name="button">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                </div>
            <?php
        }
        ?>
                </tbody>

            </table>

        </div>
    </div>

</div>