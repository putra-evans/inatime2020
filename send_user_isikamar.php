<?php
	$isi_pesan = "

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type='text/css'>
		body {
			padding: 0;
			margin: 0;
			font-family: arial;
		}

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
		    [class*='col-'] {
		        width: 100%;
		    }
		}
			.background {
				border: 1px solid black;
				width: 80%;
				margin : 2% auto;
				padding: 2%;
			}
			.background h2,h3 {
				text-align: center;

			}

		table {
			border-collapse: collapse;
			/*width: 100%;*/
			/*border : 1px solid black;*/
		}

			.batas_tabel {
				/*width: 70%;*/
				margin: 0 auto;

			}
			.batas_tabel tr {
				border-bottom: 1px solid rgba(115, 115, 115, 0.3);
				border-top: 1px solid rgba(115, 115, 115, 0.3);
			}
			.left {
				padding-bottom: 1%;
				padding-top: 1%;
			}
			.right {
				padding-top: 1%;
				padding-bottom: 1%;
				text-align: right;
			}

	</style>
	<script type='text/javascript' src='admin-konas2019/User/pages/qr_code/jquery.min.js'></script>
	<script type='text/javascript' src='admin-konas2019/User/pages/qr_code/qrcode.js'></script>
</head>
<body>
	<div class='background col-91'>
		<h2>Detail Pendaftaran</h2>
		<h3>".$nama."</h3>

		<div class='batas_tabel col-83'>
			<table class='col-100'>
";

$isi_pesan .= " 
				<tr>
					<td class='left'>Nama Lengkap</td>
					<td class='right'>".$nama."</td>
				</tr>
				<tr>
					<td class='left'>No. Telepon</td>
					<td class='right'>".$no_telpon."</td>
				</tr>
				<tr>
					<td class='left'>Email</td>
					<td class='right'>".$email."</td>
				</tr>
				<tr>
					<td class='left'>Request Hotel</td>
					<td class='right'>".$request."</td>
				</tr>
				<tr>
					<td class='left'>Mengikuti Tour</td>
					<td class='right'>".$joint_akomodasi." ikut</td>
				</tr>
";

$isi_pesan .= "

	</div>
</body>
</html>

";
?>
