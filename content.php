<?php
if(@$_GET["p"] == "daftar"){
	// echo "halaman Simposium";
	include "daftar.php";
	if(@$_GET["page"] == "simposium"){
		include "daftar_simposium.php";
	}elseif(@$_GET["page"] == "penginapan"){
		include "daftar_penginapan.php";
	}elseif(@$_GET["page"] == "present"){
		include "daftar_present.php";
	
	}
}elseif(@$_GET["p"] == "tutor_pemb"){
	include "tutor_pemb.php";
}elseif(@$_GET["ac"] == "print"){
	include "print_modal2.php";
}elseif(@$_GET["ac"] == "print-regis"){
	include "print_modal3.php";
}elseif(!empty($_GET["p"])){
	include_once($_GET["p"].".php");
}elseif(@$_GET["k"] == "konfirmasi"){
		include "konfirmasi-bayar.php";
}
else{
	include "home.php";
}
?>
