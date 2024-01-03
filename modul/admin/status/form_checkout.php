<?php 
include '../../koneksi/koneksi.php';
$idBooking = $_GET['id_booking'];
$sql = "SELECT * FROM vw_checkout_belum WHERE id_booking LIKE '%".$idBooking."%'";
$runSql = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($runSql);
?>

<div class="card">
    <h5 class="card-header">Checkout Kamar</h5>
    <div class="card-body">

        <div class="container">
            <form method="post" id="idForm_verifikasiCheckout" autocomplete="off">

                    <div class="mb-3">
                        <label for="id_namaPemesan" class="form-label">ID booking</label>
                        <input type="text" name="name_idBooking" value="<?php echo $data['id_booking'] ?>" class="form-control" id="id_namaPemesan" readonly aria-describedby="emailHelp">
                    </div>

                    <input type="text" name="name_idKamar" value="<?php echo $data['id_kamar'] ?>" readonly hidden>

                    <div class="mb-3">
                        <label for="id_namaPemesan" class="form-label">Nama Pemesan</label>
                        <input type="text" name="name_namaPemesan" value="<?php echo $data['nama_customer'] ?>" class="form-control" id="id_namaPemesan" readonly aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <select name="name_verifCheckout" id="" class="form-select" required>
                            <option value="" disabled selected>- Pilih Konfirmasi -</option>
                            <option value="SC2">Checkout</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <textarea name="name_catatanCheckout" id="" class="form-control" cols="5" rows="3" placeholder="Catatan..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>

    </div>
</div>