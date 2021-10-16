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

				<tr>
					<td class='left'>Nama Lengkap</td>
					<td class='right'>".@$_POST['nama_lengkap']."</td>
				</tr>
				<tr>
					<td class='left'>Profesi</td>
					<td class='right'>".@$data_simposium['profesi']."</td>
				</tr>
				
				<tr>
					<td class='left'>Asal Cabang</td>
					<td class='right'>".@$_POST['asal_cabang']."</td>
				</tr>
				
				<tr>
					<td class='left'>Email</td>
					<td class='right'>".@$_POST['email']."</td>
				</tr>
					<tr>
					<td class='left'>Password</td>
					<td class='right'>".@$_POST['password']."</td>
				</tr>
				<tr>
					<td class='left'>No. Telepon</td>
					<td class='right'>".@$_POST['no_telpon']."</td>
				</tr>
				<tr>
					<td class='left'>Total</td>
					<td class='right'>Rp.  ".number_format($total_seluruh,2,',','.')."</td>
				</tr>
				
";

$isi_pesan .= "
			</table>
			
			<p style='font-size: 16px; text-align:center;margin:0px;padding:0px;'>No. Virtual Account BNI</p>
			<p style='font-size: 16px; text-align:center;'>".$data_daftar['va']."</p>
			<p style='font-size: 16px; text-align:center;'>Note: Diharapkan untuk melakukan pembayaran hanya dengan No. Virtual Account BNI diatas</p>
			
			
			<p style='font-size: 11px; color: #0099ff;'>Note : Batas Terakhir Pembayaran pada tanggal ".$batas_tgl."</p>
			<span style='font-size: 11px;'>
					Menerima transfer dari semua bank termasuk Syariah
			</span><br>
			<span style='font-size: 11px; text-align: justify'>
					Dapat dikenakan biaya transfer antar-bank dan limitasi transfer jika anda transfer dari bank lain selain BNI
			</span>
			
";

if( $data['id_simposium'] != 0 ){


$isi_pesan .= "			
			
			<table  class='col-83' style='margin: 0 auto;'>
  			<tr>
  				<td>
  					<h2 style='text-align:center;'>Symposium</h2>
  				</td>
  			</tr>
  				<tr>
  					<td class='left' style='text-align:center;'><b>".$data['profesi']."</b></td>
  				</tr>
            </table>
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