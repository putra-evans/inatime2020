<?php
require_once "koneksi.php";

if (isset($_POST["simpan"])) {

    require 'PHPMailerAutoload.php';
    require 'credential.php';

    // var_dump($_POST);
    // exit;
    $nama_lengkap = @$_POST["nama_lengkap"];
    $id_simposium = @$_POST["id_simposium"];
    $asal_cabang = @$_POST["asal_cabang"];
    $email = @$_POST["email"];
    $password = @$_POST["password"];
    $no_telpon = @$_POST["no_telpon"];
    $id_workshop = @$_POST["id_workshop"];
    $jml_dt_workshop = count($id_workshop);
    $tgl_daftar = date('Y-m-d');
    $harga_simposium = @$_POST["hargasesudah"];
    // $joint_symposium = @$_POST["joint_symposium"];
    $joint_symposium = "T";
    $instansi = @$_POST["instansi"];
    $satelite_symposium = @$_POST["satelite_symposium"];



    // TAHAP 1
    // KODE UNTUK MENGINPUT KE TABEL DAFTAR
    if ($joint_symposium == 'Y') {
        $sql_daftar = "
                    INSERT INTO tb_daftar (nama_lengkap, id_simposium, joint_symposium, asal_cabang, email,password, no_telpon, tgl_daftar, instansi, satelite_symposium)
                    VALUES ('$nama_lengkap','$id_simposium','$joint_symposium','$asal_cabang','$email','$password','$no_telpon','$tgl_daftar','$instansi','$satelite_symposium')
                    ";
                    // echo "INSERT INTO tb_daftar (nama_lengkap, id_simposium, joint_symposium, asal_cabang, email,password, no_telpon, tgl_daftar)
                    // VALUES ('$nama_lengkap','$id_simposium','$joint_symposium','$asal_cabang','$email','$password','$no_telpon','$tgl_daftar')";
        $query_daftar = mysql_query($sql_daftar) or die(mysql_error());
    } elseif ($joint_symposium == 'T') {
        $sql_daftar = "
                    INSERT INTO tb_daftar (nama_lengkap, id_simposium, joint_symposium, asal_cabang, email, password, no_telpon, tgl_daftar, instansi, satelite_symposium)
                    VALUES ('$nama_lengkap','$id_simposium','$joint_symposium','$asal_cabang','$email','$password','$no_telpon','$tgl_daftar','$instansi','$satelite_symposium')
                    ";
        $query_daftar = mysql_query($sql_daftar) or die(mysql_error());
        // echo "INSERT INTO tb_daftar (nama_lengkap, id_simposium, joint_symposium, asal_cabang, email, password, no_telpon, tgl_daftar)
        //             VALUES ('$nama_lengkap','0','$joint_symposium','$asal_cabang','$email','$password','$no_telpon','$tgl_daftar')";
    }
    // exit;
    
    // -----------------------------------------------------------------
    // TAHAP 2
    // KARNA ID NYA AUTO_INCREMENT MAKA DAPATKAN DULU ID_DAFTAR TADI
    $sql_id = "SELECT LAST_INSERT_ID() as id";
    $query_id = mysql_query($sql_id) or die(mysql_error());
    $data = mysql_fetch_assoc($query_id);
    $id_daftar = $data["id"];
    // -----------------------------------------------------------------

    // TAHAP 3
    // LAKUKAN INPUT MULTI INSERT DI TABEL WORKSHOP DAN PENELITIAN.

    /*	$sql_workshop   = "INSERT INTO tb_detail_workshop (id_daftar, id_workshop) VALUES ";
            
            for( $i=0; $i < $jml_dt_workshop; $i++ )
            {
                $sql_workshop .= "('{$id_daftar}','{$id_workshop[$i]}')";
                $sql_workshop .= ", ";
            }
		
            $sql_workshop = rtrim($sql_workshop, ", ");
             $query_workshop = mysql_query($sql_workshop) or die(mysql_error());
            */

    // echo $sql_workshop; die;

    $sql_workshop   = "INSERT INTO tb_detail_workshop (id_daftar, id_workshop) VALUES ('$id_daftar','0')";
    //
    // for( $i=0; $i < $jml_dt_workshop; $i++ )
    // {
    //     $sql_workshop .= "('{$id_daftar}','{$id_workshop[$i]}')";
    //     $sql_workshop .= ", ";
    // }
    //
    // $sql_workshop = rtrim($sql_workshop, ", ");
    // // echo $sql_workshop; die;
    $query_workshop = mysql_query($sql_workshop) or die(mysql_error());
    // --------------------------------------------------------------------
    $total_seluruh = 0;
    // Tahap Dapat harga baru
    $sql_hrg_workshop = "
                            SELECT tb_daftar.id_simposium, tb_simposium.hargasebelum 
                            FROM tb_daftar 
                            JOIN tb_simposium ON tb_daftar.id_simposium = tb_simposium.id_simposium 
                            WHERE tb_daftar.id_daftar = '$id_daftar'
                        ";
    $query_total_workshop = mysql_query($sql_hrg_workshop) or die(mysql_error());
    while ($data = mysql_fetch_assoc($query_total_workshop)) {
        $total_seluruh = $total_seluruh + $data["hargasebelum"];
    }




    // -----------------------------------------------------------------
    // TAHAP 4
    // MULTI INSERT TABEL PENELITIAN
    // $sql_penelitian   = "INSERT INTO tb_detail_penelitian (id_daftar, penelitian) VALUES ";

    // for( $i=0; $i < $jml_dt_penelitian; $i++ )
    // {
    //     $sql_penelitian .= "('{$id_daftar}','{$penelitian[$i]}')";
    //     $sql_penelitian .= ", ";
    // }

    // $sql_penelitian = rtrim($sql_penelitian, ", ");
    // // echo $sql_penelitian; die;
    // $query_penelitian = mysql_query($sql_penelitian) or die(mysql_error());
    // --------------------------------------------------------------------------

    // TAHAP 5
    // HITUNG TOTAL HARGA YANG HARUS DI BAYAR USER SESUAI LIST YANG DIPILIH
// baru dikomen
    // $total_workshop = 0;
    // TAMPILKAN DULU DATA TABEL DETAIL WORKSHOP DENGAN WORKSHOP
    // SETELAH ITU LAKUKAN PERULANGAN WHILE UNTUK LAKUKAN PENAMBAHAN HARGA WORKSHOP
    // $sql_hrg_workshop = "
    //                         SELECT tb_detail_workshop.id_dtl_workshop,id_daftar, tb_workshop.hargasebelum
    //                         FROM tb_detail_workshop, tb_workshop
    //                         WHERE
    //                             tb_detail_workshop.id_workshop = tb_workshop.id_workshop AND
    //                             tb_detail_workshop.id_daftar = '$id_daftar'
    //                     ";
    // $query_total_workshop = mysql_query($sql_hrg_workshop) or die(mysql_error());
    // while ($data = mysql_fetch_assoc($query_total_workshop)) {
    //     $total_workshop = $total_workshop + $data["hargasebelum"];
    // }
    // ----------------------------------------------------------------------------
// baru di komen
    // DISINI NILAI TOTAL DARI WORKSHOP SUDAH DI DAPATKAN SESUAI YANG DIPILIH
    // SELANJUTNYA TAMBAHKAN TOTAL KESELURUHAN DARI TOTAL WORKSHOP DENGAN HARGA PROFESI(SIMPOSIUM)
    // if ($joint_symposium == "Y") {
    //     $total_simpo_work = $harga_simposium + $total_workshop;
    //     $total_seluruh = $harga_simposium + $total_workshop + 3000;
    // } elseif ($joint_symposium == "T") {
    //     $harga_simposium = 0;
    //     $total_simpo_work = $harga_simposium + $total_workshop;
    //     $total_seluruh = $harga_simposium + $total_workshop + 3000;
    // }
    // ----------------------------------------------------------------------------

    // echo $trx = date('dmYhis');
    // echo $total_seluruh;
    // echo $nama_lengkap;
    // echo $email;
    // echo $no_telpon;
    // exit;

    // SCRIPT UNTUK MENENTUKAN NO. VIRTUAL ACCOUNT
    // echo $total_seluruh.'<br>';

    /*if($total_simpo_work > 1){
                        
                        if ($total_simpo_work == 2500000) {
        
                            $sql_carikode = "SELECT MAX(va) FROM tb_daftar WHERE total = '2503000'";
                            $carikode = mysql_query($sql_carikode) or die(mysql_error());
                            $datakode = mysql_fetch_array($carikode);
                            $cek = mysql_num_rows($carikode);
                            if ($cek >= 1) {
                                $nilaikode = substr($datakode[0], 9);
                                // echo $nilaikode.'<br>';
                                $kode = (int) $nilaikode;
                                // echo $kode.'<br>';
                                $kode = $kode +1;
                                // echo $kode.'<br>';
                                $hasilkode = "988006287".str_pad($kode, 7, "0", STR_PAD_LEFT);
                            } else {
                                $hasilkode = "9880062870000001";
                            }
        
                            $simpan_total = "
                                UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                                WHERE id_daftar = '$id_daftar'
                            ";
                            mysql_query($simpan_total) or die(mysql_error());
        
                        }elseif ($total_simpo_work == 2000000) {
        
                          $sql_carikode = "SELECT MAX(va) FROM tb_daftar WHERE total = '2003000'";
                          $carikode = mysql_query($sql_carikode) or die(mysql_error());
                          $datakode = mysql_fetch_array($carikode);
                          $cek = mysql_num_rows($carikode);
                          if ($cek >= 1) {
                              $nilaikode = substr($datakode[0], 9);
                              // echo $nilaikode.'<br>';
                              $kode = (int) $nilaikode;
                              // echo $kode.'<br>';
                              $kode = $kode +1;
                              // echo $kode.'<br>';
                              $hasilkode = "988006288".str_pad($kode, 7, "0", STR_PAD_LEFT);
                          } else {
                              $hasilkode = "9880062880000001";
                          }
        
                          $simpan_total = "
                              UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                              WHERE id_daftar = '$id_daftar'
                          ";
                          mysql_query($simpan_total) or die(mysql_error());
        
                        }elseif ($total_simpo_work == 750000) {
        
                          $sql_carikode = "SELECT MAX(va) FROM tb_daftar WHERE total = '753000'";
                          $carikode = mysql_query($sql_carikode) or die(mysql_error());
                          $datakode = mysql_fetch_array($carikode);
                          $cek = mysql_num_rows($carikode);
                          if ($cek >= 1) {
                              $nilaikode = substr($datakode[0], 9);
                              // echo $nilaikode.'<br>';
                              $kode = (int) $nilaikode;
                              // echo $kode.'<br>';
                              $kode = $kode +1;
                              // echo $kode.'<br>';
                              $hasilkode = "988006289".str_pad($kode, 7, "0", STR_PAD_LEFT);
                          } else {
                              $hasilkode = "9880062890000001";
                          }
        
                          $simpan_total = "
                              UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                              WHERE id_daftar = '$id_daftar'
                          ";
                          mysql_query($simpan_total) or die(mysql_error());
        
                        }elseif ($total_simpo_work == 5000000) {
        
                          $sql_carikode = "SELECT MAX(va) FROM tb_daftar WHERE total = '5003000'";
                          $carikode = mysql_query($sql_carikode) or die(mysql_error());
                          $datakode = mysql_fetch_array($carikode);
                          $cek = mysql_num_rows($carikode);
                          if ($cek >= 1) {
                              $nilaikode = substr($datakode[0], 10);
                              // echo $nilaikode.'<br>';
                              $kode = (int) $nilaikode;
                              // echo $kode.'<br>';
                              $kode = $kode +1;
                              // echo $kode.'<br>';
                              $hasilkode = "9880062811".str_pad($kode, 6, "0", STR_PAD_LEFT);
                          } else {
                              $hasilkode = "9880062811000001";
                          }
        
                          $simpan_total = "
                              UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                              WHERE id_daftar = '$id_daftar'
                          ";
                          mysql_query($simpan_total) or die(mysql_error());
        
                        }elseif ($total_simpo_work == 3250000) {
        
                          $sql_carikode = "SELECT MAX(va) FROM tb_daftar WHERE total = '3253000'";
                          $carikode = mysql_query($sql_carikode) or die(mysql_error());
                          $datakode = mysql_fetch_array($carikode);
                          $cek = mysql_num_rows($carikode);
                          if ($cek >= 1) {
                              $nilaikode = substr($datakode[0], 10);
                            //   echo $nilaikode.'<br>'; die;
                              $kode = (int) $nilaikode;
                              // echo $kode.'<br>';
                              $kode = $kode +1;
                              // echo $kode.'<br>';
                              $hasilkode = "9880062812".str_pad($kode, 6, "0", STR_PAD_LEFT);
                          } else {
                              $hasilkode = "9880062812000001";
                          }
        
                          $simpan_total = "
                              UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                              WHERE id_daftar = '$id_daftar'
                          ";
                          mysql_query($simpan_total) or die(mysql_error());
        
                        }*/

    // -----------------------------------------------------------------

    // PROSES PENGIRIMAN INFORMASI REGISTRASI USER KE GMAIL
    // SCRIPT UNTUK KIRIM PESAN KE EMAIL USER
    require_once "kirim-email-registrasi.php";
    // SCRIPT UNTUK KIRIM PESAN KE EMAIL MDJAMIL
    //require_once "send_mdjamil.php";
    include_once __DIR__ . "/BniEnc.php";

// FROM BNI
$client_id = '99904';
$secret_key = '15005406c7b2e39da90b6c28f8a9d746';
$url = 'https://apibeta.bni-ecollection.com/';
// From Kami
$trx = date('dmYhis');
$tmx = 1585624275;
$data_asli = array(
    'type' => "createbilling",
    'client_id' => $client_id,
    'trx_id' => $trx, // fill with Billing ID
    'trx_amount' => $total_seluruh,
    'billing_type' => 'c',
    'datetime_expired' => date('c', $tmx + (76 * 24 * 60 * 60)), // billing will be expired in 2 hours
    'virtual_account' => '',
    'customer_name' => $nama_lengkap,
    'customer_email' => $email,
    'customer_phone' => $no_telpon,
);

$hashed_string = BniEnc::encrypt(
    $data_asli,
    $client_id,
    $secret_key
);

$data = array(
    'client_id' => $client_id,
    'data' => $hashed_string,
);

function get_content($url, $post = '')
{
    $usecookie = __DIR__ . "/cookie.txt";
    $header[] = 'Content-Type: application/json';
    $header[] = "Accept-Encoding: gzip, deflate";
    $header[] = "Cache-Control: max-age=0";
    $header[] = "Connection: keep-alive";
    $header[] = "Accept-Language: en-US,en;q=0.8,id;q=0.6";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_VERBOSE, false);
    // curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_ENCODING, true);
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 5);

    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36");

    if ($post) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $rs = curl_exec($ch);

    if (empty($rs)) {
        var_dump($rs, curl_error($ch));
        curl_close($ch);
        return false;
    }
    curl_close($ch);
    return $rs;
}

$response = get_content($url, json_encode($data));
$response_json = json_decode($response, true);

if ($response_json['status'] !== '000') {
    // handling jika gagal
    var_dump($response_json);
} else {
    $data_response = BniEnc::decrypt($response_json['data'], $client_id, $secret_key);
    // $data_response will contains something like this:
    // array(
    // 'virtual_account' => 'xxxxx',
    // 'trx_id' => 'xxx',
    // );
    //var_dump($data_response);
    $vabaru = $data_response['virtual_account'];
    $query_simpan_total = " UPDATE tb_daftar SET va = '$vabaru', total = '$total_seluruh'
                        WHERE id_daftar = '$id_daftar'
                    ";
                    // echo $query_simpan_total;
                    // exit;
                          mysql_query($query_simpan_total) or die(mysql_error());
                          
}

// require_once "send_user.php";

// 	$mail = new PHPMailer(true);
// 	    try {
// 	        //Server settings
// 	        //$mail->SMTPDebug = 4;
// 	        //$mail->isSMTP();
// 	        $mail->Host = 'smtp.gmail.com';
// 	        $mail->SMTPAuth = true;
// 	        $mail->Username = EMAIL;
// 	        $mail->Password = PASS;
// 	        $mail->SMTPSecure = 'tls';
// 	        $mail->SMTPAuth = true;
// 	        $mail->Port = 587;
// 	        //Recipients
// 	        $mail->setFrom(EMAIL, 'Registrasi Pendaftaran');
// 	        $mail->addAddress($_POST['email']);     // Add a recipient

// 	        $mail->addReplyTo(EMAIL);
// 	       #DBDBDB
// 	        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
// 	        //Content

// 	        $mail->isHTML(true);                                  // Set email format to HTML
// 	        $mail->Subject = "Detail Pendaftaran ".$_POST['nama_lengkap'];
// 	        $mail->Body    = $isi_pesan;
// 	        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
// 	        $mail->send();
// 	    }

?>

   <script>
    alert('Thank you, registration information has been sent via Email.');
    window.location='index.php?ac=print&id=<?php echo $id_daftar ?>';
    </script>";
<?php

} else {

    $sqldel = "
                            DELETE FROM tb_detail_workshop WHERE id_daftar = '$id_daftar';
                        ";
    $sqldel1 = "
                            DELETE FROM tb_daftar WHERE id_daftar = '$id_daftar';
                        ";

    mysql_query($sqldel) or die(mysql_error());
    mysql_query($sqldel1) or die(mysql_error());

?>
    <script type="text/javascript">
        alert('Data Failed');
        window.location.href = "index.php?p=daftar_peserta";
    </script>
<?php
}

?>