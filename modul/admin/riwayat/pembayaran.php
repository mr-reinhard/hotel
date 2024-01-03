<div class="card text-center">

  <div class="card-header">
    Riwayat
  </div>

  <div class="card-body">

    <h5 class="card-title">Riwayat Pembayaran</h5>

    <table class="table table-hover">

      <thead>
        <tr>
          <th scope="col">Nama</th>
          <th scope="col">Total</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php 
        include '../../koneksi/koneksi.php';
        include '../../koneksi/fungsi.php';

        $no = 1;
        $query = "SELECT * FROM vw_lunas ORDER BY tanggal_booking ASC";
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
              Rp. <?php echo format_rupiah($hasil['total_bayar']); ?>
            </td>

            <td>
                <button type="button" class="btn btn-success"><?php echo $hasil['status_bayar']; ?></button>
            </td>

            <td>
              <button type="button" id="i" class="btn btn-primary"
                value="<?php echo $hasil['id_booking']; ?>" title="Edit" name="button">
                <i class="fa-solid fa-eye"></i>
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