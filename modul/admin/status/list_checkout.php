<div class="card text-center">

  <div class="card-header">
    Checkout List
  </div>

  <div class="card-body">

    <h5 class="card-title">Verifikasi Checkout</h5>

    <table class="table table-hover">

      <thead>
        <tr>
          <th scope="col">Kamar</th>
          <th scope="col">Lantai</th>
          <th scope="col">No</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php 
      include '../../koneksi/koneksi.php';

      $no = 1;
      $query = "SELECT * FROM vw_checkout_belum ORDER BY tanggal_booking ASC";
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
              <button type="button" id="" class="btn btn-primary" value="<?php echo $hasil['id_booking']; ?>"
                title="Edit" name="button">
                <i class="fa-solid fa-eye"></i>
              </button>

              <button type="button" id="idBtn_bukaFormCheckout" class="btn btn-warning"
                value="<?php echo $hasil['id_booking']; ?>" title="Edit" name="button">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
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