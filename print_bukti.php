<?php
 include "koneksi.php";
 $id = @$_GET["id"];

 $sqll = "
	SELECT tb_simposium.*, tb_daftar.*
	FROM tb_simposium, tb_daftar
	WHERE
        tb_daftar.id_simposium = tb_simposium.id_simposium AND
        tb_daftar.id_daftar = '$id'
		ORDER BY tb_daftar.id_daftar ASC
";
$qry_skck = mysql_query($sqll);
$data = mysql_fetch_assoc($qry_skck);
$tgl_daftar = $data["tgl_daftar"];

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
        <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title>Print</title>
            <style>
                .center {text-align: center;}
                .left{text-align: left;}
                .right{text-align: right;}
                .halaman {
                    width: 80%;
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
                    .tabel th {padding: 10px; border: 1px solid grey;}
                    .tabel td {padding: 8px; border: 1px solid grey;}
                .print {
                    margin:20px;
                }
                
                .va {
                    /* border: 1px solid black; */
                    margin: 10px;
                  }
                    .bank {
                      /* border: 1px solid black; */
                      width: 100%;
                      border-collapse: collapse;
                    }

            </style>
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

            <script type="text/javascript" src="qr_code/jquery.min.js"></script>
            <script type="text/javascript" src="qr_code/qrcode.js"></script>
        </head>
        <body>
            <div class="halaman">
                <div class="judul">
                    <img src="img/kop.jpg" width=100%>
                  <!-- <h4 class="center">2nd INATIME 2020</h4>
                    <h4 class="center">Indonesia-Tuberculosis International Meeting</h4>-->
                    <hr>
                    <h4 class="center"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Detail Pembayaran</h4>
                    <table style="margin-left:3.5%; width: 93.5%;">
                        <tr>
                            <td>
                              <table style="margin-left:3.5%;">
                                  <tr>
                                      <td>No. Register</td>
                                      <td>:</td>
                                      <td>
                                          <?= $data["id_daftar"]; ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Nama</td>
                                      <td>:</td>
                                      <td>
                                          <?= $data["nama_lengkap"]; ?>
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
                <div class="isi" style="padding-left:25px;">
                    <div class="tabel1">
                        <table class=" tabel table table-bordered table-striped">
                            <tr>
                                <th>No.</th>
                                <th>Workshop</th>
                                <th colspan="2">Harga</th>
                            </tr>
                                <?php
									$sql = "
										SELECT tb_detail_workshop.*, tb_workshop.*
										FROM tb_detail_workshop, tb_workshop
										WHERE tb_detail_workshop.id_workshop = tb_workshop.id_workshop AND
										tb_detail_workshop.id_daftar = '$id'
									";
									$subtotal_workshop = 0;
									$n = 1;
									$query = mysql_query($sql) or die(mysql_error());
									while($dt = mysql_fetch_assoc($query)) {
								?>
                            <tr>
                                <td><?= $n++; ?></td>
                                <td style="width: 60%;"><?= $dt["workshop"]; ?></td>
                                <td style="width: 0.3%;">Rp.</td>
                                <td style="text-align:right;"><?= number_format($dt['hargasebelum'],0,',','.'); ?></td>
                            </tr>
                                <?php
                                    $subtotal_workshop = $subtotal_workshop + $dt["hargasebelum"];
                                    }
                                ?>

                    </div>
                    <div class="tabel2">

                            <tr>
                                <th>No.</th>
                                <th>Profesi</th>
                                <th colspan="2"></th>
                            </tr>
                              <?php
                                    $hrg_profesi = 0;
									$sql_p = "
                                    SELECT tb_daftar.*, tb_simposium.*
                                    FROM tb_daftar, tb_simposium
                                    WHERE
                                        tb_daftar.id_simposium = tb_simposium.id_simposium AND
                                        tb_daftar.id_daftar = '$id'
									";
									$query_p = mysql_query($sql_p) or die(mysql_error());
                                    while ($data_p = mysql_fetch_assoc($query_p)) {
                                        if ($data_p['joint_symposium'] == "Y") {
                                         $hargasesudah = $data_p["hargasebelum"];
                              ?>
                                        <tr>
                                            <td><?= $n++; ?></td>
                                            <td><?= $data_p["profesi"]; ?></td>
                                            <td style="width: 0.3%;">Rp.</td>
                                            <td style="text-align:right;"><?= number_format($hargasesudah,0,',','.'); ?></td>
                                        </tr>
                              <?php
                                        $hrg_profesi = $hrg_profesi + $hargasesudah;

                                      } elseif($data_p['joint_symposium'] == "T"){
                                        $hargasesudah = $data_p["hargasebelum"];
                                        $hargasesudah = 0;
                              ?>
                                        <tr>
                                            <td><?= $n++; ?></td>
                                            <td><?= $data_p["profesi"]; ?></td>
                                            <td style="width: 0.3%;">Rp.</td>
                                            <td style="text-align:right;"><?= number_format($hargasesudah,0,',','.'); ?></td>
                                        </tr>
                              <?php
                                        $hrg_profesi = $hrg_profesi + $hargasesudah;
                                      }
                                    }
                                    $total_sementara = $hrg_profesi + $subtotal_workshop;
                                    $adm = 3000;
                                    $total = $total_sementara + $adm;
                                ?>

                    </div>
                    <div class="tabel3">
                        <tr>
                            <th class="left" colspan="2">Subtotal</th>
                            <td style="width: 0.3%;">Rp.</td>
                            <td style="text-align:right;"><b><?= number_format($total_sementara,0,',','.'); ?></b></td>
                        </tr>
                        <tr>
                            <th class="left" colspan="2">Administrasi Bank</th>
                            <td style="width: 0.3%;">Rp.</td>
                            <td style="text-align:right;"><b><?= number_format($adm,0,',','.'); ?></b></td>
                        </tr>
                        <tr>
                            <th class="left" colspan="2">Total</th>
                            <td style="width: 0.3%;">Rp.</td>
                            <td style="text-align:right;"><b><?= number_format($total,0,',','.'); ?></b></td>
                        </tr>
                        </table>

                        <div class="va">
                            <table class="bank">
                                <tr>
                                  <td style="width:5%;">
                                    <img src="img/bni.png" width="23">
                                  </td>
                                  <td style="border-bottom: 1px dashed grey;">
                                    <p style="font-size:14px;">Bank BNI (Dicek Otomatis)</p>
                                  </td>
                                </tr>
                                <tr>
                                  <td style="width:5%;">
                                  </td>
                                  <td style="border-bottom: 1px dashed grey;">
                                    <p style="font-size: 12px;">No. Virtual Account</p>
                                    <p style="font-size: 20px; color: orange;"><?= $data['va']; ?></p>
                                  </td>
                                </tr>
                            </table>

                        <p style="font-size: 11px; color: #0099ff;">Note : Batas Terakhir Pembayaran pada tanggal <?= $batas_tgl; ?></p>
                        <span style="font-size: 11px;">
                            Menerima transfer dari semua bank termasuk Syariah
                        </span><br>
                        <span style="font-size: 11px;">
                            Dapat dikenakan biaya transfer antar-bank dan limitasi transfer jika anda transfer dari bank lain selain BNI
                        </span>
                      </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                var qrcode = new QRCode(document.getElementById("qrcode"), {
                    width : 100,
                    height : 100
                });

                function makeCode () {

                    qrcode.makeCode("<?= $data["id_daftar"]; ?>");
                }
                makeCode();
            </script>

            <script>
                window.print();
            </script>
        </body>
    </html>
