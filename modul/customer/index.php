<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../asset/jsp/callform_customer.js"></script>
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

        $("#menuNavbar").on("click", "#id_HomeCustomer", function () {
            load_home();
        });

        $("#menuNavbar").on("click", "#id_menuBookingCustomer", function () {
            load_melati();
        });

        $("#menuNavbar").on("click", "#id_menuCekKode_customer", function () {
            load_cekBooking();
        });

        $("#contentCustomer").on("click","#id_kamarMelati",function(){
            load_melati();
        });

        $("#contentCustomer").on("click","#id_kamarAnggrek",function(){
            load_anggrek();
        });

        $("#contentCustomer").on("click","#id_kamarVip",function(){
            load_vip();
        });

        //Truncate Mode (tbl_kamar)
            $("#menuNavbar").on("click", "#id_semuaTable", function () {
                $.ajax({
                    url: '../koneksi/service_customer.php?aksi=truncateTable',
                    type: 'GET',
                    success: function (data) {
                        console.log("Data berhasil dihapus");
                    }
                });
            });

            // $("#menuNavbar").on("click", "#testing", function () {
            //     $.ajax({
            //         url: '../koneksi/service_customer.php?aksi=testValue',
            //         type: 'GET',
            //         success: function (data) {
            //             //console.log(data);
            //             $("#contentCustomer").html(data);
            //         }
            //     });
            // });

        // Buka form Melati
        $("#contentCustomer").on("click", "#idBtn_orderMelati", function () {
                var kodeKamar = $(this).attr("value");
                $.ajax({
                    url: "daftar/booking.php",
                    method: "GET",
                    data: {
                        id_kamar: kodeKamar
                    },
                    dataType: "text",
                    success: function (data) {
                        $('#contentCustomer').html(data);
                    }
                });
            });

            // buka form Anggrek
        $("#contentCustomer").on("click", "#idBtn_orderAnggrek", function () {
                var kodeKamar = $(this).attr("value");
                $.ajax({
                    url: "daftar/booking.php",
                    method: "GET",
                    data: {
                        id_kamar: kodeKamar
                    },
                    dataType: "text",
                    success: function (data) {
                        $('#contentCustomer').html(data);
                    }
                });
            });

            // Buka form VIP
        $("#contentCustomer").on("click", "#idBtn_orderVip", function () {
                var kodeKamar = $(this).attr("value");
                $.ajax({
                    url: "daftar/booking.php",
                    method: "GET",
                    data: {
                        id_kamar: kodeKamar
                    },
                    dataType: "text",
                    success: function (data) {
                        $('#contentCustomer').html(data);
                    }
                });
            });

            // Simpan data booking khushus form enctype
            $("#contentCustomer").on("submit", "#idForm_BookingCustomer", function (e) {
                e.preventDefault();
                var formData = new FormData($("#idForm_BookingCustomer")[0]);
                var pilihPembayaran = $("#idJenisPembayaran").val();
                var nilaiUpload = $("#idContentUpload").val();

                if (pilihPembayaran === "JP2" && nilaiUpload === "") {
                    UploadError();
                }
                else{
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
                            url: '../koneksi/service_customer.php?aksi=simpan_daftar_booking',
                            type: 'post',
                            contentType:false,
                            processData:false,
                            data: formData,
                            success: function (data) {
                                bookingBerhasil();
                                // console.log(data);
                            }
                        });
                    }
                })
                }

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
                        <a class="nav-link active" aria-current="page" href="#" id="id_HomeCustomer">Home</a>
                    </li>
    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kamar
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#" id="id_menuBookingCustomer">Booking</a></li>
                            <!-- <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                    </li>
    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Status
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#" id="id_menuCekKode_customer">Cek kode</a></li>
                            <!-- <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Truncate
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#" id="id_semuaTable">Hapus Semua</a></li>
                            <li><a class="dropdown-item" href="#" id="testing">test</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
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

    <div id="contentCustomer">

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>