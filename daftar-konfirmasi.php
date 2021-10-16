<style type="text/css">
    .style23 {
        font-family: "Monotype Corsiva";
        color: #00CC33;
    }

    .style24 {
        color: #FFFFFF
    }
</style>
<style type="text/css">
    .style18 {
        font-size: 12px;
        color: #FFFFFF;
    }

    .style21 {
        font-size: 12px
    }

    .style22 {
        color: #FFFFFF;
        font-weight: bold;
    }

    .style23 {
        color: #FFFFFF
    }
</style>
<section class="portfolio-header parallax parallax1" style="background: url('img/tourism/jam.jpg') 50% 0 no-repeat fixed;">
    <div class="dark-overlay p-t-b-80" data-overlay-opacity="0">
        <div class="container">
            <div class="row">
                <p class="col-sm-12 text-light text-center" data-aos="fade-down" data-aos-delay="0"></p>
                <h3 class="text-center emphasis style23" style="font-family: arial" data-in-effect="fadeInUp">Register
                    your account</h3>
                <p class="col-sm-12 text-light text-center" data-aos="fade-up" data-aos-delay="300"></p>
            </div>
        </div>
    </div>
</section>
<section class="parallax parallax4" style="background: url('img/backgrounds/back1.jpg') 50% 0 no-repeat fixed;">
            <div class="dark-overlay p-t-b-80" data-overlay-opacity="0.1">
                
  <div class="container">

                    <div class="row" style="background-color: white;">
					
                           
                            <div class="col-md-5" ><br>
                            <h4>TRANSFER CONFIRMATION FORM </h4>

                            <div class="alert alert-info">Please complete the data</div>
                                
                                <?php
                            $id = $_GET['id'];
                            include "koneksi.php";
                            $result = mysql_query("select * from tb_daftar where id_daftar='$id'");
                            $pecah = mysql_fetch_array($result)
                                
                            
                            // $id = $pecah['id_daftar'];
                            // $nama = $pecah['nama_lengkap'];
                            ?>
                               <form  class="form-horizontal"  method="POST" action="aksi_bayar_regis.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="nama" class="control-label">Full Name</label><br>
                                        <input type="hidden" name="id_daftar" value="<?php echo $pecah['id_daftar'] ?>" placeholder="Full Name" class="form-control" required>
                                        <input type="text" name="nama_lengkap" value="<?php echo $pecah['nama_lengkap'] ?>" placeholder="Full Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="nama" class="control-label">Email</label><br>
                                        <input type="text" name="email" value="<?php echo $pecah['email'] ?>" placeholder="Email" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="nama" class="control-label">Transfer Date</label><br>
                                        <input type="date" name="tgl" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="col-md-12">
                                        <label for="" class="control-label">File Upload</label><br>
                                        <input type="file" name="bukti" class="form-control">
                                    </div>
                                </div>
                                 <div class="form-group mb-3">
                                    <div class="col-md-12">
                                        <!--<label for="" class="control-label">File Upload</label><br>-->
                                        <input type="hidden" name="bukti" class="form-control">
                                    </div>
                                </div>
                                <div class="text-left ">
                                    <input type="submit" name="simpan" value="Konfirmasi" class="btn btn-colored btn-md text-center"><br>
                                </div>
                                <h5>Thank you for confirming the transfer. <br>
                                    We will send you a confirmation email in 2 x 24 hours after you filled the form.<br> 
                                    See you in our event!
                                </h5>
                            </form>
                            </div>
                        </div>
						</div>
            </div>
        </section>

<script type="text/javascript">
    <?php echo $jsArray; ?>

    function changeValue(id_simposium) {
        document.getElementById('hargasesudah').value = dtpgj[id_simposium].hargasesudah;
    };
</script>