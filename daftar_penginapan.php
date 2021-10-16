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


    .akomodasi {
        padding: 15px;
        width: 100%;
        box-sizing: border-box;
        /* border: 1px solid black; */
      }
        .kolom1 {
          float: left;
          
          padding: 30px;
          text-align: center;
        }

        .kolom2{
          float: right;
          
          padding: 30px;
          text-align: center;
        }

        .akomodasi::after {
          content: "";
          clear: both;
          display: table;
        }
          .img {
            box-shadow: 0 0 3px;
          }
    
</style>
<section class="section-bottom-border">
		<div class="container">
				<div class="col-md-12">
					<div class="row">
							<div class="akomodasi">
									<div class="kolom1 col-58">
											<label>DAFTAR HOTEL</label>
											<a href="img/harga_hotel.jpg" target="_blank"><img class="img" src="img/harga_hotel.jpg"></a>
									</div>
									<div class="kolom2 col-41">
											<label>PAKET TOUR</label>
											<a href="img/paket.jpg" target="_blank"><img class="img" src="img/paket.jpg"></a>
											<br>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
											  PLEASE BOOK !
											</button>
											<br><br><br>
											<table class="table table-hover" style="text-align: left !important;">
												  <thead>
												    <tr>
												      <th colspan="3" scope="col" style="text-align:center;">Accomodation Contact</th>
												    </tr>
												  </thead>
												  <tbody>
												    <tr>
												      <td>Ermi Tour</td>
															<td>:</td>
												      <td>082388776613</td>
												    </tr>
												    <tr>
												      <td>Email</td>
															<td>:</td>
												      <td>akomodasipatklinsumbar@gmail.com</td>
												    </tr>
												  </tbody>
												</table>
									</div>
							</div>
					</div>
				</div>
		</div>
	</section>

	<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align:center;">Akomodasi dan Tour</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<form action="daftar_aksi_tour.php" method="POST">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email" name="email" autocomplete="off">
					</div>
					<div class="form-group">
						<label for="no_telpon">HP / WA</label>
						<input type="number" class="form-control" id="no_telpon" name="no_telpon" autocomplete="off">
					</div>
					<div class="form-group">
    				    <label for="request">Note</label>
    				    <textarea class="form-control" id="request" rows="3" name="request"></textarea>
    				    <p style="font-size: 12px;">mohon tulis kan : nama hotel , jenis kamar , jenis bed, check in, check out</p>
    			    </div>
    			    
    			    
    			    <label for="request">Apakah bapak/ibu ingin mengikuti Tour ?</label>
    			    <div class="form-check">
                      <input class="form-check-input" type="radio" name="joint_akomodasi" id="YA" value="YA" checked>
                      <label class="form-check-label" for="YA">
                        Mengikuti Tour
                      </label>
                    </div> 
                    
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="joint_akomodasi" id="TIDAK" value="TIDAK" checked>
                      <label class="form-check-label" for="TIDAK">
                        Tidak Mengikuti Tour
                      </label>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="booking">Booking</button>
				</form>
      </div>
    </div>
  </div>
</div>
