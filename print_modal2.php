<?php
include "koneksi.php";
$id = @$_GET["id"];

$sqll = "
	SELECT *
	FROM tb_daftar
	WHERE
        id_daftar = '$id'
		ORDER BY id_daftar ASC
";
$qry_skck = mysql_query($sqll);
$data = mysql_fetch_assoc($qry_skck);
$tgl_daftar = $data["tgl_daftar"];
$id_daftar = $data["id_daftar"];

// MENENTUKAN TANGGAL TERAKHIR PEMBAYARAN
// $tgl_awal_early = strtotime('2019-05-02');
// $tgl_akhir_early = strtotime('2019-07-31');
// $tgl_awal_late = strtotime('2019-08-01');
// $tgl_akhir_late = strtotime('2019-09-27');
// $tgl_target = date('Y-m-d');
// $tgl_target = strtotime('2019-09-02');

// KONDISI IF UNTUK MENAMPILKAN HARGA SEBELUM DAN HARGA SESUDAH
// if ($tgl_awal_early <= $tgl_target && $tgl_akhir_early >= $tgl_target){
//   $batas_tgl = "31 Juli 2019";
// }else if ($tgl_awal_late <= $tgl_target && $tgl_akhir_late >= $tgl_target){
$batas_tgl = "15 Juli 2020";
// }else if ($tgl_target < $tgl_awal_early) {
//   $batas_tgl = "31 Juli 2019";
// }
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Print</title>
    <style>
        /* For desktop: */
        .col-8 {
            width: 8.33%;
        }

        .col-16 {
            width: 16.66%;
        }

        .col-25 {
            width: 25%;
        }

        .col-33 {
            width: 33.33%;
        }

        .col-41 {
            width: 41.66%;
        }

        .col-50 {
            width: 50%;
        }

        .col-58 {
            width: 58.33%;
        }

        .col-66 {
            width: 66.66%;
        }

        .col-75 {
            width: 75%;
        }

        .col-83 {
            width: 83.33%;
        }

        .col-91 {
            width: 91.66%;
        }

        .col-100 {
            width: 100%;
        }

        @media only screen and (max-width: 768px) {

            /* For mobile phones: */
            [class*="col-"] {
                width: 100%;
            }


        }

        .center {
            text-align: center;
        }

        .left {
            text-align: left;
        }

        .right {
            text-align: right;
        }

        .halaman {
            min-height: 50%;
            box-shadow: 0 0 4px grey;
            border-radius: 10px;
            margin: 10% auto;
        }

        .judul td {
            padding: 10px;
        }

        .isi {
            padding: 3%;
        }

        .tabel {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid grey;
        }

        .tabel th {
            padding: 10px;
            border: 1px solid grey;
        }

        .tabel td {
            padding: 8px;
            border: 1px solid grey;
        }

        .print {
            margin: 20px;
            padding: 20px;
        }

        .va {
            /* border: 1px solid black; */
            margin: 10px;
        }

        .dpt {
            font-size: 11px;

        }

        .bank {
            /* border: 1px solid black; */
            width: 100%;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <section class="portfolio-header parallax parallax1" style="background:#000 url('img/backgrounds/bg-dark3.jpg') 50% 0 no-repeat fixed;">
        <div class="dark-overlay p-t-b-80" data-overlay-opacity="0.8">
            <div class="container">
                <div class="row">
                    <h2 class="text-light text-center emphasis" data-in-effect="fadeInUp">Check Out</h2>
                </div>
            </div>
        </div>
    </section>


    <div class="halaman col-66">
        <div class="judul">
            <img src="img/atas-email1.jpg" alt="">
            <h4 class="left">&emsp;&emsp;&emsp; Hi &nbsp;<?= $data["nama_lengkap"]; ?></h4>
            <h4 class="left">&emsp;&emsp;&emsp;Thank you for registering to <b>“2nd INA-TIME Virtual Conference”</b> </h4>
            <hr>
            <h4 class="">&emsp;&emsp;&emsp;Bapak dan Ibu yang kami hormati,</h4>
        </div>
        <div class="isi">
            <h4>Terima kasih telah mendaftar sebagai peserta dalam acara <b>2nd INA-TIME Virtual Conference : Join and Play Our Role to Fight TB & COVID-19</b> yang diselenggarakan oleh Sub Direktorat Tuberkulosis Kementerian Kesehatan RI dan Universitas Andalas pada tanggal 28-29 Agustus 2020.</h4>

            <h4>Biaya investasi dalam acara ini sebesar <b> Rp 100.000,-</b> silahkan membayar via transfer ke rekening berikut.</h4>
            <center>
                <img class"mx-auto" src="img/bni2.png" alt="">
            </center>
            <h4 class="text-center"> <b>No. Rekening 879797572 <br>
                    a.n INA TIME PADANG 2020</b>
            </h4>
            <br>
            <h4 class="text-left">Untuk konfirmasi pembayaran, silahkan klik link <u> <i><b><a href="?k=konfirmasi&id=<?= $id_daftar ?>">"konfirmasi pembayaran"</a></b> </i> </u> berikut. </h4>
            <br>
            <h5>Terima kasih atas kerjasamanya. <br>
                Selamat mengikuti acara kami.<br>
                It’s time to fight TB & COVID-19!
                .</h5>
            <br>
            <h5>Please submit any questions to : <u> inatime2020@gmail.com</u> or (+62) 823 8752 4184</h5>






            <!--<p style="font-size: 11px; color: #0099ff;">Note : Batas Terakhir Pembayaran pada tanggal <?= $batas_tgl; ?></p>-->
            <!--<span style="font-size: 11px;">-->
            <!--    Menerima transfer dari semua bank termasuk Syariah-->
            <!--</span><br>-->
            <!--<span style="font-size: 11px;">-->
            <!--    Dapat dikenakan biaya transfer antar-bank dan limitasi transfer jika anda transfer dari bank lain selain BNI-->
            <!--</span>-->
        </div>
    </div>
    </div>
    <div class="print">
        <!--<div class="btn-group" role="group" aria-label="Basic example">-->
        <!--    <a class="btn btn-success" href="index.php">Kembali</a>-->
        <!--    <a class="btn btn-success" href="print_bukti.php?id=<?= $data['id_daftar']; ?>" target="new">Print</a>-->
        <!--</div>-->
    </div>
    </div>


</body>

</html>