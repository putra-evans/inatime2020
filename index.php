<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from patchwork.theme-summit.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Apr 2018 01:40:28 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Open Graph Information -->
    <meta property="og:title" content="INA TIME 2020">
    <meta property="og:description" content="INA TIME 2020">
    <meta property="og:site_name" content="INA TIME 2020">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://inatime2020.id">
    <meta property="og:image" content="img/assets/logo.png" />
    <!-- CSS links -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/aos.css">
    <link rel="stylesheet" type="text/css" href="css/style_tambahan.css">
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="slider/nivo-slider.css">
    <link rel="stylesheet" href="css/colors/blue.css">
    <!-- Font Family and Favicon-->

    <link rel="shortcut icon" href="img/assets/logo.png">
    <!-- JS -->
    <script src="hitungmundur/moment.js"></script>
    <script src="hitungmundur/moment-id.js"></script>
    <script src="hitungmundur/duration.js"></script>
    
    <!-- Title -->
    <title>INA TIME 2020</title>

    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '../www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-107833696-1', 'auto');
        ga('send', 'pageview');
    </script>

    <script type="text/javascript" src="qr_code/jquery.min.js"></script>
    <script type="text/javascript" src="qr_code/qrcode.js"></script>

    <style type="text/css">
        div.popup {
            position: fixed;
            top: 0px;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, .8);
            z-index: 1000;
        }

        div#box {
            background-color: transparent;
            background-position: center;
            padding-top: 43px;
            margin: 3% auto;
            width: 80%;
            min-height: ;


        }

        a.close {
            background-color: white;
            margin: 0 0 0 0;
            font-size: 30px;
        }


        < !-- .style1 {
            color: #FFFFFF;
            font-weight: bold;
        }

        .style2 {
            color: #CCCCCC
        }

        -->
    </style>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('a.close').click(function(eve) {

                eve.preventDefault();
                $(this).parents('div.popup').fadeOut('slow');
            });
        });
    </script>
</head>

<body>
    <!-- Preloader -->
    <div id="loader">
        <div class="laoder-frame">
            <img class="svg-loader" src="img/assets/loader.svg" alt="circle-loader">
        </div>
    </div>
    <div class="homepage">
        <nav class="navbar navbar-head navbar-fixed-top">
            <div class="container" style="background-color: #00882c;">
                <div class="navbar-header" style="background-color:  #00882c;;">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>

                </div>
                <div class="container">
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right" style="background-color: #00882c;">
                            <li><a class="" href="?p=home" style="color: yellow;">HOME</a></li>
                            <!--   <li><a class="" href="?p=daftar&page=simposium" style="color: white;">REGISTER</a></li>-->
                            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle" style="color: yellow;">INFORMATION<b class="caret"></b></a>
                                <ul class="dropdown-menu" style="background-color: #026020;">
                                    <li>
                                        <div>
                                            <div class="row elements-row">
                                                <ul class="megamenu-lists">
                                                    <li style="margin-bottom: 10px; color: yellow;"><a href="?p=commitee" class="style2">COMMITEE</a></li>
                                                    <!--<li style="margin-bottom: 10px;"><a href="?p=acomodation" class="style2">ACCOMODATION</a></li>-->
                                                    <!--<li style="margin-bottom: 10px;"><a href="img/pdfann.pdf" target="_blank"  class="style2">DOWNLOAD FLYER</a></li>-->
                                                    <!--<li style="margin-bottom: 10px;"><a href="img/200203_ INA TIME_Rundown_EXCEL_ws_FINAL.pdf" target="_blank"  class="style2">DOWNLOAD RUNDOWN WORKSHOP</a></li>-->
                                                    <!--<li style="margin-bottom: 10px;"><a href="img/200203_ INA TIME_Rundown_EXCEL_simpo_FINAL.pdf" target="_blank"  class="style2">DOWNLOAD RUNDOWN SYMPOSIUM</a></li>-->

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle" style="color: yellow;">EVENT<b class="caret"></b></a>
                                <ul class="dropdown-menu" style="background-color: #026020;">
                                    <li>
                                        <div>
                                            <div class="row elements-row">
                                                <ul class="megamenu-lists">
                                                    <li style="margin-bottom: 10px; color: yellow;"><a href="?p=symposium" class="style2">SYMPOSIUM</a></li>
                                                    <!--<li style="margin-bottom: 10px;"><a href="?p=workshop"  class="style2">WORKSHOP</a></li>-->
                                                    <li style="margin-bottom: 10px;"><a href="?p=inovation" class="style2">TB INNOVATION COMPETITION</a></li>

                                                    <!--<li style="margin-bottom: 10px;"><a href="?p=quiz"  class="style2">TB AWARENESS COMPETITION</a></li>-->
                                                    <li style="margin-bottom: 10px;"><a href="?p=video" class="style2">TB VIDEO COMPETITION</a></li>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle" style="color: yellow;">CALL FOR PAPER<b class="caret"></b></a>
                                <ul class="dropdown-menu" style="background-color: #026020;">
                                    <li>
                                        <div>
                                            <div class="row elements-row">
                                                <ul class="megamenu-lists">
                                                    <li style="margin-bottom: 10px; color: yellow;"><a href="?p=abstract1" class="style2">ABSTRACT GUIDELINES</a></li>
                                                    <li style="margin-bottom: 10px;"><a href="?p=abstract2" class="style2">ABSTRACT SUBMISSION</a></li>
                                                    <li style="margin-bottom: 10px;"><a href="?p=manuscript-book" class="style2">MANUSCRIPT FOR PROCEEDING BOOK</a></li>
                                                    <li style="margin-bottom: 10px;"><a href="?p=manuscript-journal" class="style2">MANUSCRIPT FOR JOURNAL</a></li>

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <!--<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle" style="color: yellow;">WEST SUMATERA<b class="caret"></b></a>-->
                            <!--                     <ul class="dropdown-menu" style="background-color: #026020;">-->
                            <!--                         <li>-->
                            <!--                             <div>-->
                            <!--                                 <div class="row elements-row">-->
                            <!--                                     <ul class="megamenu-lists">-->
                            <!--                                         <li style="margin-bottom: 10px; color: yellow;" class="style2"><a href="?p=tourism"  class="style2">TOURISM</a></li>-->
                            <!--                                         <li style="margin-bottom: 10px;" class="style2"><a href="?p=culinary"  class="style2">CULINARY</a></li>-->

                            <!--                                 </div>-->
                            <!--                             </div>-->
                            <!--                         </li>-->
                            <!--                     </ul>-->
                            <!--                 </li>-->
                            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle" style="color: yellow;">EXHIBITION HALL<b class="caret"></b></a>
                                <ul class="dropdown-menu" style="background-color: #026020;">
                                    <li>
                                        <div>
                                            <div class="row elements-row">
                                                <ul class="megamenu-lists">
                                                    <li style="margin-bottom: 10px; color: yellow;" class="style2"><a href="?p=virtual_ex" class="style2">VIRTUAL EXHIBITION INFORMATION</a></li>
                                                    <li style="margin-bottom: 10px;" class="style2"><a href="?p=sponsorship" class="style2">OUR SPONSORSHIP</a></li>
                                                    <li style="margin-bottom: 10px;" class="style2"><a href="?p=competition_hall" class="style2">COMPETITION HALL</a></li>

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <!--<li><a class="" href="?p=cararegis" style="color: yellow;">PAYMENT METHOD</a></li>-->
                            <?php if (@$_SESSION['email'] == "") { ?>
                                <li><a class="" href="?p=login_peserta" style="color: yellow;">LOGIN</a></li>
                                <li><a class="" href="?p=daftar-peserta-lama" style="color: yellow;">REGISTRASI LAMA</a></li>
                                <li><a class="" href="?p=daftar-konfirmasi" style="color: yellow;">KONFIRMASI</a></li>
                            <?php
                            } else {
                            ?>
                                <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle" style="color: yellow;">ENTRY ABSTRACT<b class="caret"></b></a>
                                    <ul class="dropdown-menu" style="background-color: #026020;">
                                        <li>
                                            <div>
                                                <div class="row elements-row">
                                                    <ul class="megamenu-lists">
                                                        <li style="margin-bottom: 10px; color: yellow;" class="style2"><a href="?p=entry_abstract" class="style2">ABSTRACT</a></li>

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="" href="?p=logout" style="color: yellow;">LOGOUT</a></li>
                            <?php
                            }
                            ?>

                            <!--  <li><a class="" href="?p=tutor_pemb" style="color: yellow;">CARA PEMBAYARAN</a></li>
						  
                           <li><a class="" href="?p=syarat" style="color: white;">SYARAT KETENTUAN ORAL DAN POSTER</a></li>
                             <li><a class="local-scroll" href="#services" style="color: white;">KONTAK</a></li> -->
                        </ul>
                    </div>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>

        <!-- About Our Skills -->

        <?php include "content.php"; ?>

        <!-- Clients #F0FBFF -->



        <!-- Map -->


        <footer style="z-index:1;">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-md-4 col-sm-6 col-xs-12" data-aos="fade-up">
                <img src="<?= $base_url ?>img/logo/<?= $logoputih['img_logo'] ?>" width="500">
                <br>
                <?php
                $sql = mysqli_query($kon, "SELECT * FROM alamat");
                while ($alamat = mysqli_fetch_assoc($sql)) {
                ?>
                <p class="text-light">
                  <i class="fa fa-home"></i> &nbsp; <?= $alamat['alamat'] ?>
                </p>
                <?php } ?>

                <?php
                $sql = mysqli_query($kon, "SELECT * FROM fb");
                while ($face = mysqli_fetch_assoc($sql)) {
                ?>
                <p class="text-light">
                  <i class="ion-social-facebook"></i> &nbsp;&nbsp;&nbsp; <?= $face['fb'] ?>
                </p>
                <?php } ?>


                <?php
                $sql = mysqli_query($kon, "SELECT * FROM ig");
                while ($ins = mysqli_fetch_assoc($sql)) {
                ?>
                <p class="text-light">
                  <i class="ion-social-instagram"></i> &nbsp;&nbsp; <?= $ins['ig'] ?>
                </p>
                <?php } ?>
            </div> -->
                    <div class="col-md-9 col-sm-6 col-xs-12" data-aos="flip-down">
                        <h4 class="emphasis text-light">Contact Person</h4>
                        <hr>
                        <p style="color:white;">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Pediatric Department of Medical Faculty of Andalas University<br>
                            3rd floor Obstetric, Gynecology, and Pediatric Unit of M. Djamil Hospital Perintis Kemerdekaan Street, Jati, Padang, West Sumatra 25171
                        </p>
                        <p style="color:white;">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            inatime2020@gmail.com
                        </p>


                        <p style="color:white;">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            (+62) 821-6977-2110 <br>

                        </p>
                    </div>

                    <!--<div class="col-md-3 col-sm-6 col-xs-12" data-aos="flip-down">-->
                    <!--    <h4 class="emphasis text-light">Information</h4>-->
                    <!--    <hr>-->
                    <!--    <div class="left">-->

                    <!--    </div>-->
                    <!--    <div class="right">-->

                    <!--    </div>-->

                    <!--    <p class="text-light-gray">-->
                    <!--        <a href="">COMMITEE</a>-->
                    <!--        <br>-->

                    <!--  <a href="?p=daftar&page=simposium">Register</a>
                    <br>-->
                    <!--               <a href="">ACCOMODATION</a>-->
                    <!--               <br>-->
                    <!--<a href="">DOWNLOAD</a>-->
                    <!--               <br>-->

                    <!--           </p>-->
                    <!--       </div>-->


                    <!-- <div class="col-md-4 col-sm-6 col-xs-12" data-aos="fade-up">
                <h4 class="emphasis text-light">Latest Post</h4>
                <hr>
                <p class="text-light-gray">
                  <?php
                    $sql = mysqli_query($kon, "SELECT * FROM tb_berita ORDER BY tgl_posting DESC LIMIT 2");
                    while ($ber = mysqli_fetch_assoc($sql)) {
                    ?>
                  <a href="<?= $base_url ?>berita/<?= $ber['judul_seo'] ?>" class="text-light"><?= $ber['judul'] ?></a>
                  <br><br>
                  <?php } ?>
                </p>
            </div> -->
                    <div class="col-md-3 col-sm-6 col-xs-12" data-aos="fade-up">
                        <h4 class="emphasis text-light">Social Media</h4>
                        <hr>
                        <p style="color:white;"><a href="#"><span class="ion-social-twitter"></span> inatime2020 </a></p>
                        <p style="color:white;"><a href="https://www.facebook.com/inatime2020" target="_blank"><span class="ion-social-facebook"> inatime2020</span></a></p>

                        <p style="color:white;"><a href="https://www.instagram.com/inatime_2020/" target="_blank"><span class="ion-social-instagram"> @inatime_2020</span></a></p>
                        <!-- <hr> 
                 
				
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15957.091398729373!2d100.366954!3d-0.9474400000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1230c06e21cb064a!2sRSUP%20Dr.%20M.%20Djamil%2C%20Sawahan%20Timur%2C%20Padang%20Timur%2C%20Padang!5e0!3m2!1sid!2sus!4v1578668242182!5m2!1sid!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>-->
                    </div>
                </div>
                <div id="copyright" data-aos="fade" data-aos-delay="0">
                    <div class="container">
                        <div class="row text-center">
                            <p>© 2020 Copyright <a href="http://www.mediatamaweb.co.id" target="_blank">CV MEDIATAMA WEB INDONESIA</a></p>
                        </div>
                    </div>
                </div>
        </footer>

        <?php
        if (!isset($_GET['p']) || $_GET['p'] == "home") {
        ?>
            <!--<div class="popup">-->
            <!--    <div id="box">-->
            <!--        <a class="close" href="?p=daftar-peserta">X</a>-->
            <!--<iframe width="100%" height="100%" src="https://www.youtube.com/embed/lJ0Zm2wiWPY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->

            <!--                    <a href="?p=daftar-peserta">-->
            <!--                    <div align="center">-->

            <!--                            <img src="img/popup5.jpg">-->



            <!--                    </div>-->
            <!--                    </a>-->

            <!--    </div>-->
        <?php
        }
        ?>


    </div>
    <script src="js/plugins.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;key=AIzaSyAC0h0f0HXUzD3JGdO0SOEyJl22aNxAm1g"></script>
    <script src="js/main1f63.js?_=jdu878d7"></script>
    <script src="slider/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#slider').nivoSlider();
        });
    </script>

    <!-- SCRIPT JS UNTUK PROSES HITUNG MUNDUR WAKTU -->
    <script>
        function hitungMundur(element = document.getElementById("waktu"), waktu_sekarang = new Date(), waktu_kedatangan = '2020-08-27 00:00', format = "D [Hari], H [Jam] m [Menit] s [Detik]") {
            var now = moment(waktu_sekarang);
            var end = moment(waktu_kedatangan);
            var duration = moment.duration(end.diff(now));
            var days = duration.asDays();
            element.innerHTML = duration.format(format);
        }

        setInterval(function() {
            // jalankan fungsi hitungMundur
            hitungMundur(document.getElementById("waktu"), new Date(), new Date('2020-08-27 23:59'))
        }, 1000);
    </script>
    <!-- <script type='text/javascript' src='http://code.jquery.com/jquery-1.10.2.min.js'></script> -->

    <script type="text/javascript">
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            width: 100,
            height: 100
        });

        function makeCode() {

            qrcode.makeCode("<?= $data["id_daftar"]; ?>");
        }
        makeCode();
    </script>
</body>


<!-- Mirrored from patchwork.theme-summit.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Apr 2018 01:40:39 GMT -->

</html>