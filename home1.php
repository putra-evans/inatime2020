<?php
    // require_once "koneksi.php";
    include "slider/slider.php";
?>
<style type="text/css">

.style1 {color: #FFFFFF}
.style2 {font-family: Georgia, "Times New Roman", Times, serif}
.style3 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style5 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000000;
	font-weight: bold;
}
.style7 {font-family: Verdana, Arial, Helvetica, sans-serif; color: #000000; }
.style8 {color: #000000}

</style>

<section  class="call-action p-t-b-80 bg-colored">
                <div class="container">
                    <div>
                        <h1 class="text-dark text-center style1 style2">Selamat Datang</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6" data-aos="fade">
                            <div class="p-t-20">
                                <h3 class="p-b-20 text-dark style1 style3">Kata Sambutan</h3>
                                <p class="text-dark style1 style3" style="text-align: justify;">Kongres Nasional (KONAS) Perhimpunan Dokter Spesialis Patologi Klinik dan Kedokteran Laboratorium (PDS PatKLin) merupakan kegiatan rutin yang diselenggarakan oleh PDS PatKLin setiap tiga tahun sekali dan Pertemuan Ilmuah Tahunan (PIT) setiap satu tahun sekali</p>
                                <p class="text-dark style1 style3" style="text-align: justify;"> Kegiatan ini bertujuan untuk menyebarluaskan berbagai pengetahuan terkini kepada dokter spesialis, dokter umum, dokter peserta pendidikan spesialis, sarjana dalam bidang terkait, beserta pemilik laboratorium dan analisis</p>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade">
                            <div class="video p-t-b-40">
                                <div class="embed-responsive">
                                    <iframe src="https://www.youtube.com/embed/H21IAwZuPGY"></iframe>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
<section class="single-post" style="background: url('img/backgrounds/bg-white1.jpg') 40% 0 no-repeat fixed;">
            <div class="container p-t-80">
                <div class="row">
                    <div class="col-md-9 col-xs-12" data-aos="fade">
                        <?php
				include "koneksi.php";
				$no = 1;
				$work = mysql_query("SELECT * from tb_simposium");
			?>
					<div class="post-preview" >
					  <table class="table table-bordered table-responsive" style="margin-bottom: 3%;">
						<thead>
						  <tr style="background-color: #1a237e; color:#FFF">
							<th width="130" style="color:"><div align="center"><span class="style3">Registrasi</span></div></th>
							<th width="170" style="color:"><div align="center"><span class="style3">Early Bird<br>
						        <i>(2 Mei - 31 Juli 2019)</i></span></div></th>
							<th width="230" style="color:"><div align="center"><span class="style3">Late Registration<br>
						        <i>(1 Agustus - 27 September 2019)</i></span></div></th>
						  </tr>
						  <th colspan="4" ><span class="style5">SYMPOSIUM</span></th>
						  <?php while($data = mysql_fetch_array($work)) { ?>
						  <tr>
							<td><span class="style7">
						    <?= $data['profesi'] ?>
							</span></td>
							<td><span class="style7">
						    <?="Rp. ". number_format($data['hargasebelum'],0,',','.'); ?>
							</span></td>
							<td><span class="style7">
						    <?="Rp. ". number_format($data['hargasesudah'],0,',','.'); ?>
							</span></td>
						  </tr>

						   <?php } ?>
						<?php
							include "koneksi.php";
							$no = 1;
							$work1 = mysql_query("SELECT * from tb_workshop");
						?>
						<th colspan="4" ><span class="style7"><b>WORKSHOP</b></span></th>
						  <?php while($data2 = mysql_fetch_array($work1)) { ?>
						  <tr>
							<td><span class="style7">
						    <?= $data2['workshop'] ?>
							</span></td>
							<td><span class="style7">
						    <?="Rp. ". number_format($data2['hargasebelum'],0,',','.'); ?>
							</span></td>
							<td><span class="style7">
						    <?="Rp. ". number_format($data2['hargasesudah'],0,',','.'); ?>
							</span></td>
						  </tr>
						  <?php } ?>
					  </table>
					</div>
                    </div>
                    <div class="col-md-3 col-xs-12 widgets" data-aos="fade">

                                <h5 class="widget-title style3 style8">Online Registration</h5></li>

					<table class="table">
						<tr>
							<td class="style7">Early Bird</td>
							<td class="style7">:</td>
							<td class="style7">May 2nd - July 31th, 2019</td>
						</tr>
						<tr>
							<td class="style7">Late Registration</td>
							<td class="style7">:</td>
							<td class="style7">August 1th - September 27th, 2019</td>
						</tr>
						<tr>
							<td class="style7">Abstract Submission Opens</td>
							<td class="style7">:</td>
							<td class="style7">July 1th, 2019</td>
						</tr>
						<tr>
							<td class="style7">Abstract Deadline</td>
							<td class="style7">:</td>
							<td class="style7">July 31th, 2019</td>
						</tr>
            <tr>
							<td class="style7">Full Paper Deadline</td>
							<td class="style7">:</td>
							<td class="style7">August 27th, 2019</td>
						</tr>
            <tr>
							<td class="style7">Power Point Presentation Deadline</td>
							<td class="style7">:</td>
							<td class="style7">September 14th, 2019</td>
						</tr>
					</table>
                    </div>
                </div>
            </div>
        </section>
		 <section class="call-action p-t-b-80 bg-colored">
            <div class="container">
                <div class="row call-1">
                     <a class="btn btn-white" href="?p=daftar&page=simposium">Daftar Simposium dan Workshop</a>
                      <a class="btn btn-white" href="?p=daftar&page=penginapan">Daftar Akomodasi Tour</a>
                       <a class="btn btn-white" href="?p=daftar&page=present">Daftar Poster dan Presentasi Oral</a>
                  
                </div>
            </div>
        </section>
		<section class="single-post" style="background: url('img/backgrounds/bg-white1.jpg') 40% 0 no-repeat fixed;">
            <div class="container">
                <div class="p-b-50" style="margin: 5%;">
                    <h3 class="text-center style3" style="color:#1a237e;" >Early Bird</h3>
								</div>
								<div class="hitungmundur style3" id="waktu" style="text-align:center; font-size: 7vh;"></div>
						</div>

						<div class="container">
                <div class="p-b-50" style="margin: 5%;">

                </div>
            </div>



				</section>
