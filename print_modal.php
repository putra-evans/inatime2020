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
            
            /* For desktop: */
            .col-8 {width: 8.33%;}
            .col-16 {width: 16.66%;}
            .col-25 {width: 25%;}
            .col-33 {width: 33.33%;}
            .col-41 {width: 41.66%;}
            .col-50 {width: 50%;}
            .col-58 {width: 58.33%;}
            .col-66 {width: 66.66%;}
            .col-75 {width: 75%;}
            .col-83 {width: 83.33%;}
            .col-91 {width: 91.66%;}
            .col-100 {width: 100%;}
            
            @media only screen and (max-width: 768px) {
            		/* For mobile phones: */
            		[class*="col-"] {
            				width: 100%;
            		}
            		
            		
            }
            
                .center {text-align: center;}
                .left{text-align: left;}
                .right{text-align: right;}
                
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
                    .tabel th {padding: 10px; border: 1px solid grey;}
                    .tabel td {padding: 8px; border: 1px solid grey;}
                .print {
                    margin:20px;
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
                    <h4 class="center"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Detail Pembayaran</h4>
                    <table style="margin-left:3.5%; width: 93.5%;" >
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
                <div class="isi">
                    <div class="tabel1">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th >No.</th>
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
                                <td><?= $dt["workshop"]; ?></td>
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
                                <th colspan="3">Profesi</th>

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
                <div class="print">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-success" href="index.php">Kembali</a>
                        <a class="btn btn-success" href="print_bukti.php?id=<?= $data['id_daftar']; ?>" target="new">Print</a>
                    </div>
                </div>
            </div>
        </body>
    </html>
