<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hotel Danau Indah Utama</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="asset/image/logo_din.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="asset/css/animate.css">
    <link rel="stylesheet" href="asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="asset/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="asset/css/magnific-popup.css">
    <link rel="stylesheet" href="asset/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="asset/css/jquery.timepicker.css">
    <link rel="stylesheet" href="asset/css/flaticon.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/fontawesome.css">
    <script src="asset/jsp/notifikasi.js"></script>
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script
        nonce="fa6d9f5f-ced4-4efc-911f-25a69691776a">(function (w, d) { !function (j, k, l, m) { j[l] = j[l] || {}; j[l].executed = []; j.zaraz = { deferred: [], listeners: [] }; j.zaraz.q = []; j.zaraz._f = function (n) { return async function () { var o = Array.prototype.slice.call(arguments); j.zaraz.q.push({ m: n, a: o }) } }; for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p); j.zaraz.init = () => { var q = k.getElementsByTagName(m)[0], r = k.createElement(m), s = k.getElementsByTagName("title")[0]; s && (j[l].t = k.getElementsByTagName("title")[0].text); j[l].x = Math.random(); j[l].w = j.screen.width; j[l].h = j.screen.height; j[l].j = j.innerHeight; j[l].e = j.innerWidth; j[l].l = j.location.href; j[l].r = k.referrer; j[l].k = j.screen.colorDepth; j[l].n = k.characterSet; j[l].o = (new Date).getTimezoneOffset(); if (j.dataLayer) for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({ ...x[1], ...y[1] })), {}))) zaraz.set(w[0], w[1], { scope: "page" }); j[l].q = []; for (; j.zaraz.q.length;) { const z = j.zaraz.q.shift(); j[l].q.push(z) } r.defer = !0; for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C.startsWith("_zaraz_"))).forEach((B => { try { j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B)) } catch { j[l]["z_" + B.slice(7)] = A.getItem(B) } })); r.referrerPolicy = "origin"; r.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[l]))); q.parentNode.insertBefore(r, q) };["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener("DOMContentLoaded", zaraz.init) }(w, d, "zarazData", "script"); })(window, document);</script>

        <script>

            $(document).ready(function(){

                $("#idFormComment").submit( function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Kirim komentar ?',
                    text: "komentar anda akan ditampilkan",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Simpan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'modul/koneksi/service_customer.php?aksi=simpanComment',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function (data) {
                                $("#idIsiNama").val("");
                                $("#idIsiComment").val("");
                                komentarDiposting();
                            }
                        });
                    }
                })
            });

            })
        </script>
</head>

<body>
    <div class="wrap">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col d-flex align-items-center">
                    <p class="mb-0 phone"><span class="mailus">Phone no:</span> <a href="#">+62 8521 913 5630</a> or <span
                            class="mailus">email us:</span> <a href="#"><span class="__cf_email__"
                                data-cfemail="87e2eae6eeebf4e6eaf7ebe2c7e2eae6eeeba9e4e8ea">danauindahutama@gmail.com</span></a>
                    </p>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="social-media">
                        <p class="mb-0 d-flex">
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span
                                    class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">Danau Indah Utama<span> Hotel</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Pesan</a></li>
                    <li class="nav-item"><a href="modul/page/room.html" class="nav-link">Kamar</a></li>
                    <li class="nav-item"><a href="modul/page/contact_us.html" class="nav-link">Contact</a></li>
                </ul>
            </div>

        </div>
    </nav>
    <!-- End of Navbar -->

    <div class="hero-wrap js-fullheight" style="background-image: url('asset/image/cover.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">
                    <!-- <h2 class="subheading">Welcome to Hotel Danau Indah Utama</h2> -->
                    <!-- <h1 class="mb-4">Danau Indah Utama</h1> -->
                    <p>
                        <a href="#idRoomList" class="btn btn-primary">Booking</a>
                        <a href="https://api.whatsapp.com/send?phone=6285219135630" class="btn btn-white">Hubungi Kami</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Pesan sekarang -->
    <!-- <section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-4">
                    <form action="#" class="appointment-form">
                        <h3 class="mb-3">Pesan sekarang</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-calendar"></span></div>
                                        <input type="text" class="form-control appointment_date-check-in"
                                            placeholder="Check-In">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-md-calendar"></span></div>
                                        <input type="text" class="form-control appointment_date-check-out"
                                            placeholder="Check-Out">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                            <select name id class="form-control">
                                                <option value>Dewasa</option>
                                                <option value>1</option>
                                                <option value>2</option>
                                                <option value>3</option>
                                                <option value>4</option>
                                                <option value>5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                            <select name id class="form-control">
                                                <option value>Anak</option>
                                                <option value>1</option>
                                                <option value>2</option>
                                                <option value>3</option>
                                                <option value>4</option>
                                                <option value>5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-wrap">
                                        <div class="icon"><span class="ion-ios-clock"></span></div>
                                        <input type="text" class="form-control appointment_time" placeholder="Time">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Pesan" class="btn btn-primary py-3 px-4">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> -->

    <section class="ftco-section ftco-services">
        <div class="container">
            <div class="row justify-content-center">
                
                <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                    <div class="d-block services-wrap text-center">
                        <div class="img" style="background-image: url(asset/image/livemusic.jpg);"></div>
                        <div class="media-body py-4 px-3">
                            <h3 class="heading">Live Music</h3>
                            <p>
                                Kami mempunyai hiburan live music berkualitas untuk menghibur anda
                            </p>
                            <!-- <p><a href="#" class="btn btn-primary">Lihat</a></p> -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                    <div class="d-block services-wrap text-center">
                        <div class="img" style="background-image: url(asset/image/minibar.jpg);"></div>
                        <div class="media-body py-4 px-3">
                            <h3 class="heading">Mini Bar</h3>
                            <p>
                                Fasilitas minibar siap menemani anda yang sedang menikmati live music
                            </p>
                            <!-- <p><a href="#" class="btn btn-primary">Lihat</a></p> -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                    <div class="d-block services-wrap text-center">
                        <div class="img" style="background-image: url(asset/image/karoke.jpg);"></div>
                        <div class="media-body py-4 px-3">
                            <h3 class="heading">Karoke</h3>
                            <p>
                                Kami memiliki ruang karoke untuk menghibur anda bersama keluarga
                            </p>
                            <!-- <p><a href="#" class="btn btn-primary">Lihat</a></p> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Room List -->
    <section class="ftco-section bg-light ftco-no-pt ftco-no-pb" id="idRoomList">
        <div class="container-fluid px-md-0">
            <div class="row no-gutters">

                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex">
                        <a href="#" class="img" style="background-image: url(asset/image/melati_1.jpeg);"></a>
                        <div class="half left-arrow d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center">
                                <p class="star mb-0"><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span><span class="fa fa-star"></span></p>
                                <p class="mb-0">
                                    <span class="price mr-1">Rp. 210.000</span>
                                    <span class="per">Weekday</span>
                                </p>
                                <p class="mb-0">
                                    <span class="price mr-1">Rp. 250.000</span>
                                    <span class="per">Weekend</span>
                                </p>

                                <h3 class="mb-3"><a href="#">Standard</a></h3>

                                <ul class="list-accomodation">
                                    <li><span>Max:</span> 2 Persons</li>
                                    <!-- <li><span>Size:</span> 45 m2</li>
                                    <li><span>View:</span> Sea View</li> -->
                                    <li><span>Bed:</span> 1</li>
                                </ul>

                                <p class="pt-1">
                                    <a href="modul/page/bk_standard.html" class="btn-custom px-3 py-2">Booking
                                        <span class="icon-long-arrow-right"></span>
                                    </a>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex">
                        <a href="#" class="img" style="background-image: url(asset/image/anggrek_1.jpeg);"></a>
                        <div class="half left-arrow d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center">
                                <p class="star mb-0"><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span><span class="fa fa-star"></span></p>
                                <p class="mb-0">
                                    <span class="price mr-1">Rp. 230.000</span>
                                    <span class="per">Weekday</span>
                                </p>
                                <p class="mb-0">
                                    <span class="price mr-1">Rp. 270.000</span>
                                    <span class="per">Weekend</span>
                                </p>
                                <h3 class="mb-3"><a href="#">Deluxe</a></h3>
                                <ul class="list-accomodation">
                                    <li><span>Max:</span> 2 Persons</li>
                                    <!-- <li><span>Size:</span> 45 m2</li>
                                    <li><span>View:</span> Sea View</li> -->
                                    <li><span>Bed:</span> 1</li>
                                </ul>

                                <p class="pt-1">
                                    <a href="modul/page/bk_deluxe.html" class="btn-custom px-3 py-2">Booking
                                        <span class="icon-long-arrow-right"></span>
                                    </a>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex">
                        <a href="#" class="img order-md-last" style="background-image: url(asset/image/vip_2.jpeg);"></a>
                        <div class="half right-arrow d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center">
                                <p class="star mb-0"><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span><span class="fa fa-star"></span></p>
                                <p class="mb-0">
                                    <span class="price mr-1">Rp. 260.000</span>
                                    <span class="per">Weekday</span>
                                </p>
                                <p class="mb-0">
                                    <span class="price mr-1">Rp. 320.000</span>
                                    <span class="per">Weekend</span>
                                </p>
                                <h3 class="mb-3"><a href="#">Superior</a></h3>
                                <ul class="list-accomodation">
                                    <li><span>Max:</span> 2 Persons</li>
                                    <!-- <li><span>Size:</span> 45 m2</li>
                                    <li><span>View:</span> Sea View</li> -->
                                    <li><span>Bed:</span> 1</li>
                                </ul>

                                <p class="pt-1">
                                    <a href="modul/page/bk_superior.html" class="btn-custom px-3 py-2">Booking
                                        <span class="icon-long-arrow-right"></span>
                                    </a>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex">
                        <a href="#" class="img order-md-last" style="background-image: url(asset/image/vip_lantai_2.jpeg);"></a>
                        <div class="half right-arrow d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center">
                                <p class="star mb-0"><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span><span class="fa fa-star"></span></p>
                                <p class="mb-0">
                                    <span class="price mr-1">Rp. 260.000</span>
                                    <span class="per">Weekday</span>
                                </p>
                                <p class="mb-0">
                                    <span class="price mr-1">Rp. 320.000</span>
                                    <span class="per">Weekend</span>
                                </p>
                                <h3 class="mb-3"><a href="#">Family Room</a></h3>
                                <ul class="list-accomodation">
                                    <li><span>Max:</span> 2 Persons</li>
                                    <!-- <li><span>Size:</span> 45 m2</li>
                                    <li><span>View:</span> Sea View</li> -->
                                    <li><span>Bed:</span> 1</li>
                                </ul>

                                <p class="pt-1">
                                    <a href="modul/page/bk_family.html" class="btn-custom px-3 py-2">Booking
                                        <span class="icon-long-arrow-right"></span>
                                    </a>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>  

            </div>
        </div>
    </section>
    <!-- End of Room List -->

    <!-- Comment Area -->
    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2>Comment &amp; Feedbacks</h2>
                </div>
            </div>

            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">

                    <?php 
                    include 'modul/koneksi/koneksi.php';

                    function tglSeparator($tanggal){
                        $separator = date("d-m-Y", strtotime($tanggal));
                        return $separator;
                    }

                    $query = "SELECT * FROM vw_comment ORDER BY tgl_comment ASC";
                    $run = mysqli_query($koneksi, $query);

                    while ($hasil = mysqli_fetch_array($run)){
                        ?>

                    <div class="item">
                        <div class="testimony-wrap d-flex">
                            <div class="user-img" style="background-image: url(asset/image/userlogo.png)">
                            </div>
                            <div class="text pl-4">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="fa fa-quote-left"></i>
                                </span>
                                <p>
                                    <?php echo $hasil['comment']; ?>
                                </p>
                                <p class="name"><?php echo $hasil['nama_user']; ?></p>
                                <span class="position"><?php echo tglSeparator($hasil['tgl_comment']); ?></span>
                            </div>
                        </div>
                    </div>

                        <?php
                    }
                    ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of comment area -->

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 wrap-about">
                    <div class="img img-2 mb-4" style="background-image: url(asset/image/cover_2.jpg);">
                    </div>
                    <h2>Keunggulan Kami</h2>
                    <p>
                        Hotel kami memiliki beberapa fasilitas dan layanan menarik untuk anda dan keluarga.
                        kami selalu menjaga kebersihan fasilitas kami dan selalu mengutamakan kepuasan pengunjung hotel kami. 
                    </p>
                </div>
                <div class="col-md-6 wrap-about ftco-animate">
                    <div class="heading-section">
                        <div class="pl-md-5">
                            <h2 class="mb-2">Fasilitas</h2>
                        </div>
                    </div>
                    <div class="pl-md-5">
                        <p>
                            Beberapa fasilitas yang dapat anda dan keluarga nikmati selama di tempat kami.
                            Berikut ini ada beberapa fasilitas menarik yang kami punya untuk memuaskan pelanggan kami,
                        </p>
                        <div class="row">

                            <div class="services-2 col-lg-6 d-flex w-100">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span><i class="fa-solid fa-mug-hot"></i></span>
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="heading">Tea Coffee</h3>
                                    <p>
                                        Sedikit relax saat menikmati liburan dengan tea dan coffee yang kami sediakan.
                                    </p>
                                </div>
                            </div>

                            <div class="services-2 col-lg-6 d-flex w-100">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span><i class="fa-solid fa-shower"></i></span>
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="heading">Air Hangat</h3>
                                    <p>
                                        Untuk menemani relax anda kami menyediakan fasilitas air hangat.
                                    </p>
                                </div>
                            </div>

                            <div class="services-2 col-lg-6 d-flex w-100">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span><i class="fa-solid fa-shirt"></i></span>
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="heading">Laundry</h3>
                                    <p>
                                        Fasilitas laundry kami merupakan solosi pakaian anda disaat liburan.
                                    </p>
                                </div>
                            </div>

                            <div class="services-2 col-lg-6 d-flex w-100">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span><i class="fa-solid fa-guitar"></i></span>
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="heading">Live Music</h3>
                                    <p>
                                        Live music kamii siap menemani setiap liburan anda di tempat kami.
                                    </p>
                                </div>
                            </div>

                            <div class="services-2 col-lg-6 d-flex w-100">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span><i class="fa-solid fa-wifi"></i></span>
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="heading">Free Wifi</h3>
                                    <p>
                                        Wifi berkecepatan tinggi kami siap menemani streaming anda saat liburan.
                                    </p>
                                </div>
                            </div>

                            <div class="services-2 col-lg-6 d-flex w-100">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span><i class="fa-solid fa-utensils"></i></span>
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="heading">Sarapan</h3>
                                    <p>
                                        Sarapan pagi kami siap menemani liburan anda di tempat kami
                                    </p>
                                </div>
                            </div>

                            <div class="services-2 col-lg-6 d-flex w-100">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span><i class="fa-solid fa-music"></i></span>
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="heading">Karoke</h3>
                                    <p>
                                        Ruang karoke kami siap menemani anda bernyanyi bersama keluarga.
                                    </p>
                                </div>
                            </div>

                            <div class="services-2 col-lg-6 d-flex w-100">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span><i class="fa-solid fa-martini-glass"></i></span>
                                </div>
                                <div class="media-body pl-3">
                                    <h3 class="heading">Mini Bar</h3>
                                    <p>
                                        Menikmati live music dan bersantai, minibar kami siap menemani anda.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-intro" style="background-image: url(asset/image/cover_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 text-center">
                    <h2>Siap untuk pesan ?</h2>
                    <p class="mb-4">
                        Sangan aman untuk melakukan booking online, silahkan order sekarang
                    </p>
                    <p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Booking</a>
                        <a href="https://api.whatsapp.com/send?phone=6285219135630" class="btn btn-white px-4 py-3">Hubungi Kami</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog -->
    <!-- <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2>Latest news from our blog</h2>
                    <span class="subheading">News &amp; Blog</span>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20 rounded"
                            style="background-image: url('images/image_1.jpg');">
                        </a>
                        <div class="text p-4 text-center">
                            <h3 class="heading"><a href="#">Work Hard, Party Hard in a Luxury Chalet in the Alps</a>
                            </h3>
                            <div class="meta mb-2">
                                <div><a href="#">January 30, 2020</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                            </div>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20 rounded"
                            style="background-image: url('images/image_2.jpg');">
                        </a>
                        <div class="text p-4 text-center">
                            <h3 class="heading"><a href="#">Work Hard, Party Hard in a Luxury Chalet in the Alps</a>
                            </h3>
                            <div class="meta mb-2">
                                <div><a href="#">January 30, 2020</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                            </div>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20 rounded"
                            style="background-image: url('images/image_3.jpg');">
                        </a>
                        <div class="text p-4 text-center">
                            <h3 class="heading"><a href="#">Work Hard, Party Hard in a Luxury Chalet in the Alps</a>
                            </h3>
                            <div class="meta mb-2">
                                <div><a href="#">January 30, 2020</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="fa fa-comment"></span> 3</a></div>
                            </div>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Testimonial Section -->
    <div id="testimonial">
        
    </div>

    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2>Testimonial &amp; Comment</h2>
                </div>
            </div>
            
                <form method="post" class="appointment-form" id="idFormComment" autocomplete="off">
                    <h3 class="mb-3">Testimoni anda</h3>
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="nameNamaUser" class="form-control" id="idIsiNama" placeholder="Nama Anda" require>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="nameCommentUser" class="form-control" id="idIsiComment" placeholder="Testimonial anda..." cols="5" rows="3" require></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>

                    </div>
                </form>
        </div>
    </section>
    <!-- End of testimonial comment -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                    <h2 class="footer-heading"><a href="#" class="logo">Danau Indah Utama</a></h2>
                    <p>
                        Hotel yang memiliki harga terjangkau dan memiliki fasilitas mewah cocok untuk liburan keluarga.
                    </p>
                    <a href="#">Read more <span class="fa fa-chevron-right" style="font-size: 11px;"></span></a>
                </div>
                <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                    <h2 class="footer-heading">Services</h2>
                    <ul class="list-unstyled">
                        <li><a href="https://maps.app.goo.gl/uGLdT5mTkQXHnxSK8" class="py-1 d-block">Rute Map</a></li>
                        <li><a href="#" class="py-1 d-block">Breakfast</a></li>
                        <li><a href="#" class="py-1 d-block">Minibar</a></li>
                        <li><a href="#" class="py-1 d-block">Karoke</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                    <h2 class="footer-heading">Tag cloud</h2>
                    <div class="tagcloud">
                        <a href="#" class="tag-cloud-link">Hotel</a>
                        <a href="#" class="tag-cloud-link">DanauIndahUtama</a>
                        <a href="#" class="tag-cloud-link">HotelTambun</a>
                        <a href="#" class="tag-cloud-link">SewaHotelMurah</a>
                        <a href="#" class="tag-cloud-link">LiveMusic</a>
                        <a href="#" class="tag-cloud-link">MiniBar</a>
                        <a href="#" class="tag-cloud-link">Karoke</a>
                        <a href="#" class="tag-cloud-link">HappyFamily</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-md-0 mb-4">
                    <h2 class="footer-heading">Subcribe</h2>
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control rounded-left" placeholder="Enter email address">
                            <button type="submit" class="form-control submit rounded-right"><span
                                    class="sr-only">Submit</span><i class="fa fa-paper-plane"></i></button>
                        </div>
                    </form>
                    <h2 class="footer-heading mt-5">Follow us</h2>
                    <ul class="ftco-footer-social p-0">
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top"
                                title="Twitter"><span class="fa fa-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top"
                                title="Facebook"><span class="fa fa-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top"
                                title="Instagram"><span class="fa fa-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="w-100 mt-5 border-top py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-8">
                        <p class="copyright mb-0">
                            Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script> All rights reserved
                            <a href="#">Danau Indah Utama</a>
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-4 text-md-right">
                        <p class="mb-0 list-unstyled">
                            <a class="mr-md-3" href="#">Terms</a>
                            <a class="mr-md-3" href="#">Privacy</a>
                            <a class="mr-md-3" href="#">Compliances</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/jquery.easing.1.3.js"></script>
    <script src="asset/js/jquery.waypoints.min.js"></script>
    <script src="asset/js/jquery.stellar.min.js"></script>
    <script src="asset/js/jquery.animateNumber.min.js"></script>
    <script src="asset/js/bootstrap-datepicker.js"></script>
    <script src="asset/js/jquery.timepicker.min.js"></script>
    <script src="asset/js/owl.carousel.min.js"></script>
    <script src="asset/js/jquery.magnific-popup.min.js"></script>
    <script src="asset/js/scrollax.min.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="asset/js/google-map.js"></script>
    <script src="asset/js/main.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"82e0946feed20ed4","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
        crossorigin="anonymous"></script>
</body>

</html>