<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Danau Indah Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../asset/jsp/callform.js"></script>
    <script src="../../asset/jsp/notifikasi.js"></script>
    <link rel="stylesheet" href="../../asset/css/fontawesome.css">
    <link rel="icon" href="../../asset/image/logo_din.png">
    <script>

// Melati Lt 1: 101-127B, 
// Lt 2: 201-204

// Anggrek 128-138
// Lt 2: 205,206,207,208,210,211

// VIP 1-6
// Family Room

        
        $(document).ready(function(){
            load_home();
            

            // Truncate Mode (tbl_kamar)
            // $("#menuNavbar").on("click", "#id_tabelKamar", function () {
            //     $.ajax({
            //         url: '../koneksi/service.php?aksi=truncate_tblKamar',
            //         type: 'GET',
            //         success: function (data) {
            //             console.log("Data berhasil dihapus");
            //         }
            //     });
            // });

        $("#menuNavbar").on("click", "#id_HomeAdmin", function () {
            load_home();
        });

        $("#menuNavbar").on("click", "#menuKamar_tambah", function () {
            load_tambahKamar();
        });

        $("#menuNavbar").on("click", "#menuKamar_daftar", function () {
            load_listKamar();
        });

        $("#menuNavbar").on("click", "#id_menuListCheckout", function () {
            load_listCheckout();
        });

        $("#menuNavbar").on("click", "#id_menuListVerifikasi", function () {
            load_verif();
        });

        // riwayat pembayaran
        $("#menuNavbar").on("click", "#idBtn_riwayatPembayaran", function () {
            load_riwayatPembayaran();
        });

        // riwayat checkout
        $("#menuNavbar").on("click", "#idBtn_riwayatCheckout", function () {
            load_riwayatCheckout();
        });

        $("#menuNavbar").on("click", "#id_menuStatusPemesan", function () {
            $.ajax({
                url:'../koneksi/service.php?aksi=load_pemesan',
                type:'GET',
                success:function(data){
                    if (data == "data_ada") {
                        load_listPemesan();
                    }
                    else{
                        load_customerTidakAda();
                    }
                }
            });
        });

        $("#contentAdmin").on("click","#id_statusKamarMelati",function(){
            load_statusMelati();
        });

        $("#contentAdmin").on("click","#id_statusKamarAnggrek",function(){
            load_statusAnggrek();
        });

        $("#contentAdmin").on("click","#id_statusKamarVip",function(){
            load_statusVip();
        });

        // direktori kamar kamar -> tambah nama kamar
        $("#contentAdmin").on("click","#idButton_tambahNamaKamar",function(){
            load_tambahTipe();
        });

        // modul kamar
        $("#contentAdmin").on("click","#id_kamarMelati",function(){
            load_listKamar();
        });

        $("#contentAdmin").on("click","#id_tambahLantai",function(){
            load_tambahLantai();
        });

        // simpan data kamar
            $("#contentAdmin").on("submit", "#idForm_tambahKamar", function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Data kamar sudah benar?',
                    text: "Mohon di check ulang sebelum menyimpan data!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Simpan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '../koneksi/service.php?aksi=simpan_data_kamar',
                            type: 'post',
                            data: $(this).serialize(),
                            success: function (data) {
                                load_tambahKamar();
                                dataBerhasilDisimpan();
                            }
                        });
                    }
                })
            });

            // Simpan Tipe Kamar
            $("#contentAdmin").on("submit", "#idForm_tambahTipeKamar", function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Data Tipe sudah benar?',
                    text: "Mohon di check ulang sebelum menyimpan data!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Simpan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '../koneksi/service.php?aksi=simpan_tipe_kamar',
                            type: 'post',
                            data: $(this).serialize(),
                            success: function (data) {
                                load_tambahKamar();
                                dataBerhasilDisimpan();
                            }
                        });
                    }
                })
            });

            // Simpan nomor lantai
            $("#contentAdmin").on("submit", "#idForm_tambahLantai", function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Data Lantai sudah benar?',
                    text: "Mohon di check ulang sebelum menyimpan data!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Simpan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '../koneksi/service.php?aksi=simpan_nomor_lantai',
                            type: 'post',
                            data: $(this).serialize(),
                            success: function (data) {
                                load_tambahLantai();
                                dataBerhasilDisimpan();
                            }
                        });
                    }
                })
            });

            // simpan verifikasiupdate pembayaran
            $("#contentAdmin").on("submit", "#idForm_verifikasiPembayaran", function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Data verifikasi sudah benar?',
                    text: "Mohon di check ulang sebelum menyimpan data!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Simpan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '../koneksi/service.php?aksi=simpan_verifikasi',
                            type: 'post',
                            data: $(this).serialize(),
                            success: function (data) {
                                load_verif();
                                verifikasiBerhasil();
                            }
                        });
                    }
                })
            });

            // simpan data checkout
            $("#contentAdmin").on("submit", "#idForm_verifikasiCheckout", function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Data checkout sudah benar?',
                    text: "Mohon di check ulang sebelum menyimpan data!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Simpan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '../koneksi/service.php?aksi=simpan_data_checkout',
                            type: 'post',
                            data: $(this).serialize(),
                            success: function (data) {
                                load_listCheckout();
                                checkoutBerhasil();
                            }
                        });
                    }
                })
            });

            // buka form approve verif
            $("#contentAdmin").on("click", "#idBtn_formVerif", function () {
                var idBooking = $(this).attr("value");
                $.ajax({
                    url: "pembayaran/form_verifikasi.php",
                    method: "GET",
                    data: {
                        id_booking: idBooking
                    },
                    dataType: "text",
                    success: function (data) {
                        $('#contentAdmin').html(data);
                    }
                });
            });

            // buka detil form booking
            $("#contentAdmin").on("click", "#idBtn_lihatDetailVerif", function () {
                var idBooking = $(this).attr("value");
                $.ajax({
                    url: "pembayaran/info_booking.php",
                    method: "GET",
                    data: {
                        id_booking: idBooking
                    },
                    dataType: "text",
                    success: function (data) {
                        $('#contentAdmin').html(data);
                    }
                });
            });

            // buka form checkout
            $("#contentAdmin").on("click", "#idBtn_bukaFormCheckout", function () {
                var idBooking = $(this).attr("value");
                $.ajax({
                    url: "status/form_checkout.php",
                    method: "GET",
                    data: {
                        id_booking: idBooking
                    },
                    dataType: "text",
                    success: function (data) {
                        $('#contentAdmin').html(data);
                    }
                });
            });
            
            // fetch Dropdown Lantai
            $("#contentAdmin").on("change","#id_inputNamaKamar",function(){
                var id_namaKamar = $(this).val();
                $.ajax({
                url:"../koneksi/service.php?aksi=fetch_lantai",
                method:"POST",
                data:{
                    id_inputNamaKamar:id_namaKamar
                },
                dataType:"text",
                success:function(data)
                {
                    $('#idPilih_lantaiKamar').html(data);
                }
                });
            });

            // Hapus kamar
            $("#contentAdmin").on("click", "#idBtn_delKamar", function () {
                var idKamar = $(this).attr("value");

                Swal.fire({
                    title: 'Hapus data kamar?',
                    text: "Mohon periksa kembali",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Hapus'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '../koneksi/service.php?aksi=hapus_data_kamar',
                            type: 'post',
                            data: {
                                id_kamar: idKamar
                            },
                            success: function (data) {
                                load_listKamar();
                                kamarBerhasilDihapus();
                            }
                        });
                    }
                });
            });

        })// End Jquery
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="menuNavbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Danau Indah Utama</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" id="id_HomeAdmin">Home</a>
                    </li>
    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Status
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#" id="id_menuListCheckout">Checkout</a></li>
                            <li><a class="dropdown-item" href="#" id="id_menuStatusPemesan">Pemesan</a></li>
                            <li><a class="dropdown-item" href="#">Pembayaran</a></li>
                            <li><a class="dropdown-item" href="#" id="id_menuListVerifikasi">Verifikasi</a></li>
                            <!-- <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                    </li>
    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kamar
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#" id="menuKamar_tambah">Tambah</a></li>
                            <li><a class="dropdown-item" href="#" id="menuKamar_daftar">Daftar</a></li>
                            <li><a class="dropdown-item" href="#" id="menuKamar_booking">Booking</a></li>
                            <!-- <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                    </li>

                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Truncate
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#" id="id_tabelKamar">tbl_kamar</a></li>
                            <li><a class="dropdown-item" href="#" id="menuKamar_daftar">tbl_nama_kamar</a></li>
                            <li><a class="dropdown-item" href="#" id="menuKamar_booking">tbl_lantai</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> -->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Riwayat
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#" id="idBtn_riwayatPembayaran">Pembayaran</a></li>
                            <li><a class="dropdown-item" href="#" id="idBtn_riwayatCheckout">Checkout</a></li>
                            <li><a class="dropdown-item" href="#" id="">Booking</a></li>
                            <!-- <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                    </li>
    
                </ul>
    
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
    
            </div>

        </div>
    </nav>

    <div id="contentAdmin">

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>