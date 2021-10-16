<?php
include "koneksi.php";
$id = @$_GET["id"];

$sqll = "
	SELECT *
	FROM tb_regis_lama
	WHERE
        lama_id = '$id'
		ORDER BY lama_id ASC
";
$qry_skck = mysql_query($sqll);
$data = mysql_fetch_assoc($qry_skck);
$tgl_daftar = $data["tgl_regis"];

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
            <h4 class="center">2nd INATIME 2020</h4>
            <h4 class="center">Indonesia-Tuberculosis International Meeting</h4>
            <hr>
            <h4 class="center"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Detail Pembayaran</h4>
            <table style="margin-left:3.5%; width: 93.5%;">
                <tr>
                    <td>
                        <table style="margin-left:3.5%;">
                            <tr>
                                <td>No. Register</td>
                                <td>:</td>
                                <td>
                                    <?= $data["lama_id"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>
                                    <?= $data["lama_nama"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Register</td>
                                <td>:</td>
                                <td>
                                    <?php echo date('d F Y', strtotime("$tgl_daftar"));  ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <div class="qr_code">
                                        <div id="qrcode" style=""></div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div class="isi">
            <div class="tabel1">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No.</th>
                        <th>Workshop</th>
                        <th colspan="2">Harga</th>
                    </tr>
                    <?php
                    // 	$sql = "
                    // 		SELECT tb_detail_workshop.*, tb_workshop.*
                    // 		FROM tb_detail_workshop, tb_workshop
                    // 		WHERE tb_detail_workshop.id_workshop = tb_workshop.id_workshop AND
                    // 		tb_detail_workshop.id_daftar = '$id'
                    // 	";
                    $sql = "
								SELECT tb_daftar.id_simposium,tb_simposium.profesi, tb_simposium.hargasebelum 
                            FROM tb_daftar 
                            JOIN tb_simposium ON tb_daftar.id_simposium = tb_simposium.id_simposium 
                            WHERE tb_daftar.id_daftar = '$data[id_daftar]'";

                    // echo "SELECT tb_daftar.id_simposium, tb_simposium.hargasebelum 
                    // FROM tb_daftar 
                    // JOIN tb_simposium ON tb_daftar.id_simposium = tb_simposium.id_simposium 
                    // WHERE tb_daftar.id_daftar = '$data[id_daftar]'";

                    $subtotal_workshop = 0;
                    $n = 1;
                    $query = mysql_query($sql) or die(mysql_error());
                    while ($dt = mysql_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td><?= $n++; ?></td>
                            <td><?= $dt["profesi"]; ?></td>
                            <td style="width: 0.3%;">Rp.</td>
                            <td style="text-align:right;"><?= number_format($dt['hargasebelum'], 0, ',', '.'); ?></td>
                        </tr>
                    <?php
                        $subtotal_workshop = $subtotal_workshop + $dt["hargasebelum"];
                    }
                    ?>

            </div>

            <div class="tabel3">

                <tr>
                    <th class="left" colspan="2">Total</th>
                    <td style="width: 0.3%;">Rp.</td>
                    <td style="text-align:right;"><b><?= number_format($subtotal_workshop, 0, ',', '.'); ?></b></td>
                </tr>

                </table>

                <div class="va">
                    <table class="bank">
                        <tr>
                            <td style="width:5%;">
                                <img src="img/bni.png" width="23">
                            </td>
                            <td style="border-bottom: 1px dashed grey;">
                                <!--<p style="font-size:14px;">Bank BNI (Dicek Otomatis)</p>-->
                                <p style="font-size:14px;">Bank BNI</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:5%;">
                            </td>
                            <td style="border-bottom: 1px dashed grey;">
                                <!--<p style="font-size: 12px;">No. Virtual Account</p>-->
                                <p style="font-size: 12px;">No. Rekening</p>
                                <!--<p style="font-size: 20px; color: orange;"><?= $data['va']; ?></p>-->
                                <p style="font-size: 20px; color: orange;">879797572</p>
                            </td>
                        </tr>
                    </table>

                    <!--<p style="font-size: 11px; color: #0099ff;">Note : Batas Terakhir Pembayaran pada tanggal <?= $batas_tgl; ?></p>-->
                    <span style="font-size: 11px;">
                        Menerima transfer dari semua bank termasuk Syariah
                    </span><br>
                    <span style="font-size: 11px;">
                        Dapat dikenakan biaya transfer antar-bank dan limitasi transfer jika anda transfer dari bank lain selain BNI
                    </span>
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