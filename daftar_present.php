<section class="section-bottom-border">
		<div class="container">
			<div class="row">
				<div class="col-md-12 list-container">
					<div class="row">
						<div class="col-md-12" style="margin-left:-3.3%;">
								<div class="col-md-5" style="height: 80vh; overflow: auto;">
									<div class="alert alert-info" role="alert" style="margin-top: 10px;">
										Pastikan Isi Data Diri Benar dan Lengkap*
									</div>
									<div class="alert alert-success" role="alert">
											<table style="width: 100%; text-align:center;">
												<tr>
													<td>
															<!--<a href="berkas/presentasi_oral.docx" class="btn btn-success">Download</a>-->
															<a href="files/presentation.doc" class="btn btn-success">Download</a>
													</td>
													<td>
															<a href="berkas/template_abstrak.doc" class="btn btn-success">Download</a>
													</td>
													<td>
															<a href="berkas/template_naskah.docx" class="btn btn-success">Download</a>
													</td>
												</tr>
												<tr style="font-size: 12px;">
													<td>
															Presentasi Oral
													</td>
													<td>
															Template Abstrak
													</td>
													<td>
															Template Naskah
													</td>
												</tr>
											</table>
										</div>
										<!-- <h5>&nbsp; <u>Pastikan Isi Data Diri Benar dan Lengkap</u>*</h5> -->
										<form class="form-group" method="POST" action="daftar_present_aksi.php" enctype="multipart/form-data">
										<input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required><br>
                                        <input type="text" name="asal_institusi" placeholder="Asal Institusi" class="form-control" required><br>
                                        <input type="email" name="email" placeholder="Email" class="form-control" required><br>
                                        <input type="text" name="no_telpon" placeholder="No HP / WA" class="form-control" required><br>
                                        <input type="text" name="judul" placeholder="Judul" class="form-control" required><br>
                                        <div class="form-group">
                                            <label for="file">Upload File Abstract</label>
                                            <input type="file" class="form-control-file" id="file" name="files">
                                        </div>

                                        <div class="text-left">
                                            <input type="submit" name="simpan" value="DAFTAR" class="btn btn-colored btn-md text-center"><br>
                                        </div>
										</form>
										<div class='alert alert-info'><b>Contact Person</b><hr> dr. Kartika : 081372215936</div>
									</div>
										<div class="col-md-7">

										<!--  -->

										<?php include "syarat.php"; ?>

										<!--  -->

									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
