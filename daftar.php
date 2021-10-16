<?php 
	$page = @$_GET["page"];
	if($page == "simposium"){
		$name = "Symposium and Workshop";
	} elseif ($page == "penginapan"){
		$name = "Akomodasi dan Tour";
	} elseif ($page == "present"){
		$name = "Oral Presentation and Poster Presentation";
	}
	
?>


<style media="screen">
.hiddenmenu{
	display: none;
}

	@media only screen and (max-width: 768px) {
	    /* For mobile phones: */
	    [class*="col-"] {
	        width: 100%;
	    }
			.hiddenmenu{
				display: block;
			}
	}
</style>

<section class="portfolio-header parallax parallax1" style="background:#000 url('img/backgrounds/bg-dark3.jpg') 50% 0 no-repeat fixed;">
			<div class="dark-overlay p-t-b-80" data-overlay-opacity="0.8">
					<div class="container">
							<div class="row">
									<h2 class="text-light text-center emphasis" data-in-effect="fadeInUp">PENDAFTARAN PESERTA</h2>
									<p class="col-sm-12 text-light text-center" data-aos="fade-up" data-aos-delay="300"><?= $name; ?></p>
							</div>
					</div>
			</div>
		</section>
		
		<nav class="navbar navbar-default">
		    <div class="container">
    		  <div class="container-fluid">
    			    <!-- Brand and toggle get grouped for better mobile display -->
    			    <div class="navbar-header">
    			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    			        <span class="sr-only">Toggle navigation</span>
    			        <span class="icon-bar"></span>
    			        <span class="icon-bar"></span>
    			        <span class="icon-bar"></span>
    			      </button>
    			      <a style="font-size: 12px;" class="navbar-brand hiddenmenu" href="?p=daftar&page=simposium">Symposium and Workshop</a>
					  <a style="font-size: 12px;" class="navbar-brand hiddenmenu" href="?p=daftar&page=penginapan">Akomodasi dan Tour</a>
    			    </div>
    
    			    <!-- Collect the nav links, forms, and other content for toggling -->
    			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    			      <ul class="nav navbar-nav">
    			        <!-- <li class="active"><a href="#">Symposium and Workshop <span class="sr-only">(current)</span></a></li> -->
    			        <li
    								<?php
    									$get = @$_GET["page"];
    									if($get == "simposium"){echo 'class="active"';}
    								?>
    							>
    									<a href="?p=daftar&page=simposium">Symposium and Workshop</a>
    							</li>
    
    			        <li
    								<?php
    									$get = @$_GET["page"];
    									if($get == "penginapan"){echo 'class="active"';}
    								?>
    							>
    								<a href="?p=daftar&page=penginapan">Akomodasi dan Tour</a>
    							</li>
    
    			        <li
    								<?php
    									$get = @$_GET["page"];
    									if($get == "present"){echo 'class="active"';}
    								?>
    							>
    								<a href="?p=daftar&page=present">Oral dan Poster Presentation</a>
    							</li>
    			      </ul>
    			    </div><!-- /.navbar-collapse -->
    			</div>
    		 </div><!-- /.container-fluid -->
        </nav>	
<!-- 
<script type ="text/javascript">
	<?php //echo $jsArray; ?>
	function changeValue (id_simposium){
		document.getElementById('hargasebelum').value = dtpgj[id_simposium].hargasebelum;
	};	
</script> -->