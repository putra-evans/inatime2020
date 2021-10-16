<section class="section-bottom-border">
		<div class="container">
			<div class="row">
				<div class="col-md-12 list-container">
					<div class="row">
						<div class="col-md-12" style="margin-left:-3.3%;">
								<div class="col-md-7">
									<div class="alert alert-info" role="alert" style="margin-top: 10px;">
										Pastikan Isi Data Diri Benar dan Lengkap*
									</div>
										<!-- <h5>&nbsp; <u>Pastikan Isi Data Diri Benar dan Lengkap</u>*</h5> -->
										<form class="form-group" method="POST" action="daftar_simposium_aksi.php" enctype="multipart/form-data">
										<input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control" required><br>
										<tr>
											<td>
												<select type="text" name="id_simposium" id="id_simposium" class="form-control" onchange="changeValue(this.value)" >
													<option value="">Pilih Profesi</option>
														<?php
															include "koneksi.php";
													
															// KONDISI IF UNTUK MENAMPILKAN HARGA SEBELUM DAN HARGA SESUDAH
															
																$result = mysql_query("select * from tb_simposium");
																$jsArray = "var dtpgj = new Array ();\n";
																while($row=mysql_fetch_array($result)){
																	echo'<option value="'. $row['id_simposium'].'">'. $row['profesi'] .'</option>';
																	$jsArray .="dtpgj ['".$row['id_simposium']."']= {hargasebelum :'" . addslashes($row['hargasebelum'])."'};\n";
																}
																// ------------------------------------------------------------------
															

														?>
												</select>
											</td>
										</tr>
											<input type="hidden" name="hargasesudah" id="hargasesudah" placeholder="Harga" class="form-control"><br>
											<input type="text" name="asal_cabang" placeholder="Asal Cabang" class="form-control" required><br>
											<input type="email" name="email" placeholder="Email" class="form-control" required><br>
											<input type="text" name="no_telpon" placeholder="No HP / WA" class="form-control" required><br>
											<label for=""> Apakah Bapak/ibu mengikuti Symposium ? </label> <br>
											<div class="form-check form-check-inline">
											  <input class="form-check-input" type="radio" name="joint_symposium" id="inlineRadio1" value="Y" checked>
											  <label class="form-check-label" for="inlineRadio1">Mengikuti Symposium</label>
											</div>
											<div class="form-check form-check-inline">
											  <input class="form-check-input" type="radio" name="joint_symposium" id="inlineRadio2" value="T">
											  <label class="form-check-label" for="inlineRadio2">Tidak Mengikuti Symposium</label>
											</div>
											<td>
												<label for=""> Workshop </label> <br>
												<?php
													$query = mysql_query("SELECT * FROM tb_workshop") or die(mysql_error());
													while ($data = mysql_fetch_assoc($query)) {
													    if($data["status"] == "Y"){
												?>
														<div class="form-check">
																<input class="form-check-input" type="radio" name="id_workshop" value="<?= $data["id_workshop"]; ?>" id="exampleRadios1">
																<label class="form-check-label" for="exampleRadios1">
																	<?= $data["workshop"]; ?>
																</label>
														</div>
														
												<?php
													    }
													}
												?>
														<div class="form-check">
																<input class="form-check-input" type="radio" name="id_workshop" value="0" id="exampleRadios2">
																<label class="form-check-label" for="exampleRadios2">
																		Tidak Memilih
																</label>
														</div>
											</td>
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
											<div class="text-center">
												<input type="submit" name="simpan" value="DAFTAR" class="btn btn-colored btn-md text-center"><br>
											</div>
										</form>
									</div>
								</div>
						</div>
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
