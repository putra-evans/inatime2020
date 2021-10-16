<style type="text/css">
.style18 {font-size: 12px; color: #FFFFFF; }
.style21 {font-size: 12px}
.style22 {
	color: #FFFFFF;
	font-weight: bold;
}
.style23 {color: #FFFFFF}
</style>
<section class="portfolio-header parallax parallax1" style="background: url('img/tourism/jam.jpg') 50% 0 no-repeat fixed;">
    <div class="dark-overlay p-t-b-80" data-overlay-opacity="0">
        <div class="container">
            <div class="row">
                <p class="col-sm-12 text-light text-center" data-aos="fade-down" data-aos-delay="0"></p>
                <h3 class="text-center emphasis style23" style="font-family: arial" data-in-effect="fadeInUp">Register your account</h3>
                <p class="col-sm-12 text-light text-center" data-aos="fade-up" data-aos-delay="300"></p>
            </div>
        </div>
    </div>
</section>
<section class="parallax parallax4" style="background: url('img/backgrounds/back1.jpg') 50% 0 no-repeat fixed;">
            <div class="dark-overlay p-t-b-80" data-overlay-opacity="0.1">
                
  <div class="container">

                    <div class="row" style="background-color: white;">
					
                           
                            <div class="col-md-10" ><br>
							<div class="alert alert-info">Please complete the personal data</div>
                                
                                
                                <form class="form-group" method="POST" action="daftar_abstract_aksi.php" enctype="multipart/form-data">
										 <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="nama" class="control-label">Full Name</label><br>
                                                
										<input type="text" name="nama_lengkap" placeholder="Full Name" class="form-control" required>
                                            </div>
                                        </div>
										
										
										 <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="nama" class="control-label">City</label><br>
                                                
											<input type="text" name="asal_cabang" placeholder="City" class="form-control" required>
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="nama" class="control-label">Email</label><br>
                                                
										<input type="email" name="email" placeholder="Email" class="form-control" required>
                                            </div>
                                        </div>
											<div class="form-group">
                                            <div class="col-md-12">
                                                <label for="nama" class="control-label">Password</label><br>
                                                <input type="password" name="password" placeholder="Password" class="form-control" required>
                                            </div>
                                        </div>
											<div class="form-group">
                                            <div class="col-md-12">
                                                <label for="nama" class="control-label">Phone Number</label><br>
                                               
											<input type="text" name="no_telpon" placeholder="Phone Number" class="form-control" required>
                                            </div>
                                        </div>
										<div></div>
											
														<!--<div class="form-check">
																<input class="form-check-input" type="radio" name="id_workshop" value="0" id="exampleRadios2">
																<label class="form-check-label" for="exampleRadios2">
																	 <span class="style21">	Not Choose</span>
																</label>
														</div>-->
											
											<!-- <td>
												<label for=""> Penelitian </label> <br>
												<input class="form-check-input" type="checkbox" name="penelitian[]" value="Oral Presentation" id="defaultCheck1">
												<label class="form-check-label" for="defaultCheck1">
													Oral Presentation
												</label> <br>
												<input class="form-check-input" type="checkbox" name="penelitian[]" value="Poster Presentation" id="defaultCheck1">
												<label class="form-check-label" for="defaultCheck1">
													Poster Presentation
												</label> <br>
											</td><br> -->
											<div class="form-group">
                                            <div class="col-md-12">
											<label for="nama" class="control-label"></label><br>
												<input type="submit" name="simpan" value="Register" class="btn btn-colored btn-md text-center"><br>
											</div>
											</div>
										</form>
										 
                            </div>
                        </div>
						</div>
            </div>
        </section>
<script type ="text/javascript">
		<?php echo $jsArray; ?>
		function changeValue (id_simposium){
			document.getElementById('hargasesudah').value = dtpgj[id_simposium].hargasesudah;
		};
	</script>
