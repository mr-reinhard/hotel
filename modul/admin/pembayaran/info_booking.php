
<?php 
include '../../koneksi/koneksi.php';
include '../../koneksi/fungsi.php';
$idBooking = $_GET['id_booking'];
$sql = "SELECT * FROM vw_menunggu WHERE id_booking LIKE '%".$idBooking."%'";
$runSql = mysqli_query($koneksi,$sql);
$hasil = mysqli_fetch_array($runSql);
?>

<script>
  $(document).ready(function(){

    var kodeBooking = $("#idKodeBooking").val();
    $.ajax({
      url:"../koneksi/service.php?aksi=loadGambar",
      type:"POST",
      data:{
        kB:kodeBooking
      },
      dataType:"text",
      success:function(data)
      {
        if (data === "gambartidakada") {
          $("#idCardsImagePreview").hide();
        }
        else{
          $("#idCardsImagePreview").show();
          $('#idImagePreview').html(`<img src="../../asset/upload/${data}" class="img-fluid rounded-start" alt="...">`);
        }
        
      }
    })

  })
</script>
<div class="container" id="idContentInfoBooing">

  <div class="card">
    <h5 class="card-header">Featured</h5>
    <div class="card-body">

    <div class="mb-3">
      <label for="idKodeBooking" class="form-label">ID Booking</label>
      <input type="text" class="form-control" value="<?php echo $hasil['id_booking']; ?>" id="idKodeBooking" aria-describedby="emailHelp">
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
    
    <div class="card mb-3" style="max-width: 540px;" id="idCardsImagePreview">
      <div class="row g-0">
        <div class="col-md-4">
          <div id="idImagePreview">

          </div>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Preview</h5>

            <p class="card-text">
              Bukti Transfer <?php echo $hasil['nama_customer']; ?>
            </p>
            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
          </div>
        </div>
      </div>
    </div>

    </div>
  </div>
</div>