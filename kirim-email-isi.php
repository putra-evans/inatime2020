<?php 
     include "koneksi.php";

    $sqll = "
     SELECT tb_simposium.*, tb_daftar.*
     FROM tb_simposium, tb_daftar
     WHERE
    			 tb_daftar.id_simposium = tb_simposium.id_simposium AND
    			 tb_daftar.id_daftar = '$id_daftar'
    	 ORDER BY tb_daftar.id_daftar ASC
    ";
    $qry_skck = mysql_query($sqll);
    $data = mysql_fetch_assoc($qry_skck);
    $tgl_daftar = $data["tgl_daftar"];
    
    // MENENTUKAN TANGGAL TERAKHIR PEMBAYARAN
    // $tgl_awal_early = strtotime('2019-05-02');
    // $tgl_akhir_early = strtotime('2019-07-31');
    // $tgl_awal_late = strtotime('2019-08-01');
    // $tgl_akhir_late = strtotime('2019-09-27');
    // $tgl_target = date('Y-m-d');
    // $tgl_target = strtotime('2019-09-02');
    
    // KONDISI IF UNTUK MENAMPILKAN HARGA SEBELUM DAN HARGA SESUDAH
    // if ($tgl_awal_early <= $tgl_target && $tgl_akhir_early >= $tgl_target){
    //  $batas_tgl = "31 Juli 2019";
    // }else if ($tgl_awal_late <= $tgl_target && $tgl_akhir_late >= $tgl_target){
     $batas_tgl = "29 Februari 2020";
    // }else if ($tgl_target < $tgl_awal_early) {
    //  $batas_tgl = "31 Juli 2019";
    // }

	$isi_pesan = "

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
		<h3>".$nama_lengkap."</h3>

		<div class='batas_tabel col-83'>
			<table class='col-100' style='margin-bottom:45px;'>
";

				
$isi_pesan .= " 

			<img src='http://inatime2020.id/img/atas-email1.jpg' width='450px' alt=''>
<h4 class='left'>&emsp;&emsp;&emsp; Hi &nbsp;".@$_POST['nama_lengkap']."</h4>
<h4 class='left'>&emsp;&emsp;&emsp;Thank you for registering to <b>“2nd INA-TIME Virtual Conference”</b> </h4>
<hr>
<h4 class='>&emsp;&emsp;&emsp;Bapak dan Ibu yang kami hormati,</h4>
</div>
<div class='isi'>
<h4>Terima kasih telah mendaftar sebagai peserta dalam acara <b>2nd INA-TIME Virtual Conference : Join and Play Our Role to Fight TB & COVID-19</b> yang diselenggarakan oleh Sub Direktorat Tuberkulosis Kementerian Kesehatan RI dan Universitas Andalas pada tanggal 28-29 Agustus 2020.</h4>

<h4>Biaya investasi dalam acara ini sebesar <b> Rp 100.000,-</b> silahkan membayar via transfer ke rekening berikut.</h4>
<center>
     <img class'mx-auto'  src='http://inatime2020.id/img/bni2.png' width='100px' alt=''><br>
<h4 class='text-center'> <b>No. Rekening 879797572 <br>
a.n INA TIME PADANG 2020</b> 
</center>
</h4>
<br>
<h4 class='text-left'>Untuk konfirmasi pembayaran, silahkan klik link <u> <i><b>http://inatime2020.id/index.php?p=daftar-konfirmasi</b> </i> </u>  berikut. </h4>
<br>
<h5>Terima kasih atas kerjasamanya. <br>
Selamat mengikuti acara kami.<br>
It’s time to fight TB & COVID-19!
.</h5>
<br>
<h4>Please submit any questions to : <u> inatime2020@gmail.com</u> or (+62) 823 8752 4184</h4>
				
";

if( $data['id_simposium'] != 0 ){


$isi_pesan .= "			
		
";

}else {
    
}


$aaa = "
	SELECT tb_daftar.*, tb_detail_workshop.* 
	FROM tb_daftar, tb_detail_workshop 
	WHERE tb_daftar.id_daftar = tb_detail_workshop.id_daftar AND 
	tb_daftar.id_daftar = '$id_daftar'
";
	$queryaaa = mysql_query($aaa) or die(mysql_error());
	$dataaaa = mysql_fetch_assoc($queryaaa);

	if($dataaaa["id_workshop"] == 0){
	 echo "";   
	}else {

$isi_pesan .= "'

			<table  class='col-83' style='margin: 0 auto;'>
			<tr>
				<td>
					<h2 style='text-align:center;'>Workshop</h2>
				</td>
			</tr>
";
	while ($data_workshop = mysql_fetch_assoc($query_workshop)) {
$isi_pesan .= "
				<tr>
					<td class='left' style='text-align:center;'><b>".$data_workshop['workshop']."</b></td>
				</tr>
";
	}

$isi_pesan .= "
			</table>
";

	}

$isi_pesan .="
		</div>
		</div>
	</div>
</body>
</html>

";
?>