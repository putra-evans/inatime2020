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
                            <h4>REGISTRATION FORM</h4>
                            <div class="alert alert-info">Please complete the personal data</div>
                                
                                 <form class="form-group" method="POST" action="daftar_regislama_aksi.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="nama" class="control-label">Full Name</label> * complete with a
                                        degree<br>
                                        <input type="text" name="nama_lengkap" placeholder="Full Name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="" class="control-label">Participants</label><br>
                                        <select name="participants" id="" class="form-control">
                                            <?php
                                                include "koneksi.php";
                                                $result = mysql_query("select * from tb_simposium");
                                                while($row=mysql_fetch_array($result)){
                                                echo'<option value="'. $row['id_simposium'].'">'. $row['profesi'] .'</option>';
                                                    }
    												?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="nama" class="control-label">Instantion</label><br>
                                        <input type="text" name="instansi" placeholder="Instantion" class="form-control" required>
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
                                        <label for="nama" class="control-label">Phone Number</label><br>
                                        <input type="text" name="phone" placeholder="Phone Number" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="" class="control-label">Password</label><br>
                                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="" class="control-label">Previous Register With</label><br>
                                        <select name="regiswith" id="id_simposium" class="form-control" required>
                                            <option value="">Please Select</option>
                                            <option value="Symposium Only">Symposium Only</option>
                                            <option value="Workshop Only">Workshop Only</option>
                                            <option value="Symposium + WS">Symposium + WS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="" class="control-label">Workshop Registration</label><br>
                                             <span style="font-size:11px"> Note : If registered a workshop before, please choose the workshop. Choose <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; “No Workshop” if registered no workshop before</span>
                                         <select name="workshopregis" id="" class="form-control" required>
                                            <option value="">Please Select</option>
                                            <option value="No Workshop Registered">No Workshop Registered</option>
                                            <option value="Update on Clinical and Programmatic Management of MDR-TB">Update on Clinical and Programmatic Management of MDR-TB</option>
                                            <option value="Update on Diagnostics and Management of Extrapulmonary TB">Update on Diagnostics and Management of Extrapulmonary TB</option>
                                            <option value="Update Basic of Diagnostics and Management TB in Children">Update Basic of Diagnostics and Management TB in Children</option>
                                            <option value="How to Develop Short Proposal in Basic Science and Public Health Research on Tuberculosis?">How to Develop Short Proposal in Basic Science and Public Health Research on Tuberculosis?</option>
                                            <option value="TB Infection Control Across Household, Hospital, and Workplaces">TB Infection Control Across Household, Hospital, and Workplaces</option>
                                            <option value="How to Make Sense Daily Records for TB Management?">How to Make Sense Daily Records for TB Management?</option>
                                            <option value="Advocation Strategy and Develops Policy Brief">Advocation Strategy and Develops Policy Brief</option>
                                            <option value="Advocation Strategy and Develops Policy Brief">Advocation Strategy and Develops Policy Brief</option>
                                            <option value="Molecular Approach to TB Detection">Molecular Approach to TB Detection</option>
                                            <option value="Comprehensive Approach in Latent TB Management">Comprehensive Approach in Latent TB Management</option>
                                        </select>
                                        
                                        <!--<textarea name="workshopregis" id="" cols="30" rows="7" class="form-control" required></textarea>-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="" class="control-label">Registration Receipt</label><br>
                                        <input type="file" name="receipt" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="" class="control-label">Booking an Accomodation</label><br>
                                         <select name="boking" class="form-control" required>
                                            <option value="">Please Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="" class="control-label">Accomodation Receipt</label><br>
                                        <input type="file" name="accomodation" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="" class="control-label">Account Number</label> (For registration and accomodation refund) <br>
                                        <textarea name="account" id="" cols="30" rows="7" class="form-control" required></textarea>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="" class="control-label">The Sponsor Would Like to Keep in Touch, Please Confirm Whether You Would Be Happy to Hear From Them</label><br>
                                        <input type="radio"  name="spons" value="yes">Yes
                                        <input type="radio"  name="spons" value="no">No
                                    </div>
                                </div>
                                <br>
                                <div class="text-left">
                                    <input type="submit" name="simpan" value="Register" class="btn btn-colored btn-md text-center"><br>
                                </div>
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