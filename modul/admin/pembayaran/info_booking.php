
<?php 
include '../../koneksi/koneksi.php';
include '../../koneksi/fungsi.php';
$idBooking = $_GET['id_booking'];
$sql = "SELECT * FROM vw_menunggu WHERE id_booking LIKE '%".$idBooking."%'";
$runSql = mysqli_query($koneksi,$sql);
$hasil = mysqli_fetch_array($runSql);
?>
<div class="card">
  <h5 class="card-header">Featured</h5>
  <div class="card-body">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ID Booking</label>
    <input type="text" class="form-control" value="<?php echo $hasil['id_booking']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Kamar</label>
    <input type="text" class="form-control" value="<?php echo $hasil['namaKamar']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Lantai</label>
    <input type="text" class="form-control" value="<?php echo $hasil['nomorLantai']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">No Kamar</label>
    <input type="text" class="form-control" value="<?php echo $hasil['nomor_kamar']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tanggal Booking</label>
    <input type="text" class="form-control" value="<?php echo separatorTanggal($hasil['tanggal_booking']); ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tanggal Checkin</label>
    <input type="text" class="form-control" value="<?php echo separatorTanggal($hasil['tanggal_checkin']); ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tanggal Checkout</label>
    <input type="text" class="form-control" value="<?php echo separatorTanggal($hasil['tanggal_checkout']); ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Pembayaran</label>
    <input type="text" class="form-control" value="<?php echo $hasil['jenis_bayar']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Total</label>
    <input type="text" class="form-control" value="Rp. <?php echo format_rupiah($hasil['total_bayar']); ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Status</label>
    <input type="text" class="form-control" value="<?php echo $hasil['status_bayar']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  </div>
</div>
  