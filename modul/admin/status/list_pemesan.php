<div class="card">
    <h5 class="card-header">List Pemesan</h5>
    <div class="card-body">

        <table class="table table-hover text-center">

            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Telfon</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php 
        include '../../koneksi/koneksi.php';

        $no = 1;
        $query = "SELECT * FROM vw_customer ORDER BY nama_customer ASC";
        $execQuery = mysqli_query($koneksi, $query);
        while ($hasil = mysqli_fetch_array($execQuery)) {
            # code...
            ?>
                <div id="result">
                    <tr>
                        <th scope="row">
                            <?php echo $hasil['nama_customer']; ?>
                        </th>
    
                        <td>
                            <?php echo $hasil['telp']; ?>
                        </td>

                        <td>
                            <?php echo $hasil['email']; ?>
                        </td>
    
                        <td>
                            <button type="button" id="" class="btn btn-primary" value="<?php echo $hasil['id_customer']; ?>" title="Edit" name="button">
                                <i class="fa-solid fa-eye"></i>
                            </button>

                            <button type="button" id="" class="btn btn-warning" value="<?php echo $hasil['id_customer']; ?>" title="Edit" name="button">
                                <i class="fa-solid fa-pen-to-square"></i>
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