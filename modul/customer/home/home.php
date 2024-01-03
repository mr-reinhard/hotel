<style>
    .order-card {
        color: #fff;
    }

    .bg-c-blue {
        background: linear-gradient(45deg, #4099ff, #73b4ff);
    }

    .bg-c-green {
        background: linear-gradient(45deg, #2ed8b6, #59e0c5);
    }

    /* .bg-c-yellow {
        background: linear-gradient(45deg, #FFB64D, #ffcb80);
    } */

    .bg-c-pink {
        background: linear-gradient(45deg, #FF5370, #ff869a);
    }


    .card {
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
        box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
        border: none;
        margin-bottom: 30px;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .card .card-block {
        padding: 25px;
    }

    .order-card i {
        font-size: 26px;
    }

    .f-left {
        float: left;
    }

    .f-right {
        float: right;
    }
</style>

<?php 
include '../../koneksi/koneksi.php';

$sqlKamar = "SELECT COUNT(*) AS semua FROM vw_kamar";
$sqlTersedia = "SELECT COUNT(*) AS tersedia  FROM vw_kamar_tersedia";
$sqlPenuh = "SELECT COUNT(*) AS penuh FROM vw_kamar_penuh";

$runKamar = mysqli_query($koneksi, $sqlKamar);
$runTersedia = mysqli_query($koneksi, $sqlTersedia);
$runPenuh = mysqli_query($koneksi, $sqlPenuh);

$assocKamar = mysqli_fetch_assoc($runKamar);
$rowKamar = $assocKamar['semua'];

$assocTersedia = mysqli_fetch_assoc($runTersedia);
$rowTersedia = $assocTersedia['tersedia'];

$assocPenuh = mysqli_fetch_assoc($runPenuh);
$rowPenuh = $assocPenuh['penuh'];
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Kamar</h6>
                    <h2 class="text-right"><i class="fa-solid fa-bed"></i><span class="ms-5"><?php echo $rowKamar; ?></span></h2>
                    <!-- <p class="m-b-0">tot<span class="f-right">351</span></p> -->
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Tersedia</h6>
                    <h2 class="text-right"><i class="fa-solid fa-door-open"></i><span class="ms-5"><?php echo $rowTersedia; ?></span></h2>
                    <!-- <p class="m-b-0">Completed Orders<span class="f-right">351</span></p> -->
                </div>
            </div>
        </div>

        <!-- <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Orders Received</h6>
                    <h2 class="text-right"><i class="fa fa-refresh f-left"></i><span>486</span></h2>
                    <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                </div>
            </div>
        </div> -->

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Penuh</h6>
                    <h2 class="text-right"><i class="fa-solid fa-door-closed"></i><span class="ms-5"><?php echo $rowPenuh; ?></span></h2>
                    <!-- <p class="m-b-0">Completed Orders<span class="f-right">351</span></p> -->
                </div>
            </div>
        </div>
    </div>
</div>