<?php
    require_once "koneksi.php";

    if (isset($_POST["simpan"])) {

       require 'PHPMailerAutoload.php';
       require 'credential.php';

        // var_dump($_POST);
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
        $joint_symposium = @$_POST["joint_symposium"];
        
        

        
                // TAHAP 1
                // KODE UNTUK MENGINPUT KE TABEL DAFTAR
                    if($joint_symposium == 'Y') {
                $sql_daftar = "
                    INSERT INTO tb_daftar (nama_lengkap, id_simposium, joint_symposium, asal_cabang, email,password, no_telpon, tgl_daftar)
                    VALUES ('$nama_lengkap','$id_simposium','$joint_symposium','$asal_cabang','$email','$password','$no_telpon','$tgl_daftar')
                    ";
                $query_daftar = mysql_query($sql_daftar) or die(mysql_error());
            } elseif($joint_symposium == 'T'){
                $sql_daftar = "
                    INSERT INTO tb_daftar (nama_lengkap, id_simposium, joint_symposium, asal_cabang, email, password, no_telpon, tgl_daftar)
                    VALUES ('$nama_lengkap','0','$joint_symposium','$asal_cabang','$email','$password','$no_telpon','$tgl_daftar')
                    ";
                $query_daftar = mysql_query($sql_daftar) or die(mysql_error());            
            }
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
				if ($id_workshop==''){
				$sql_workshop   = "INSERT INTO tb_detail_workshop (id_daftar, id_workshop) VALUES ('$id_daftar','0') ";	
				}else{
				$sql_workshop   = "INSERT INTO tb_detail_workshop (id_daftar, id_workshop) VALUES ";
            
            for( $i=0; $i < $jml_dt_workshop; $i++ )
            {
                $sql_workshop .= "('{$id_daftar}','{$id_workshop[$i]}')";
                $sql_workshop .= ", ";
            }
			
			}
			
		
            $sql_workshop = rtrim($sql_workshop, ", ");
            // echo $sql_workshop; die;
            $query_workshop = mysql_query($sql_workshop) or die(mysql_error());
                    //$sql_workshop   = "INSERT INTO tb_detail_workshop (id_daftar, id_workshop) VALUES ('$id_daftar','$id_workshop')";
                    //
                    // for( $i=0; $i < $jml_dt_workshop; $i++ )
                    // {
                    //     $sql_workshop .= "('{$id_daftar}','{$id_workshop[$i]}')";
                    //     $sql_workshop .= ", ";
                    // }
                    //
                    // $sql_workshop = rtrim($sql_workshop, ", ");
                    // // echo $sql_workshop; die;
                    //$query_workshop = mysql_query($sql_workshop) or die(mysql_error());
                // --------------------------------------------------------------------
        
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
                    $total_workshop = 0;
        
                    // TAMPILKAN DULU DATA TABEL DETAIL WORKSHOP DENGAN WORKSHOP
                    // SETELAH ITU LAKUKAN PERULANGAN WHILE UNTUK LAKUKAN PENAMBAHAN HARGA WORKSHOP
                        $sql_hrg_workshop = "
                            SELECT tb_detail_workshop.id_dtl_workshop,id_daftar, tb_workshop.hargasebelum
                            FROM tb_detail_workshop, tb_workshop
                            WHERE
                                tb_detail_workshop.id_workshop = tb_workshop.id_workshop AND
                                tb_detail_workshop.id_daftar = '$id_daftar'
                        ";
                        $query_total_workshop = mysql_query($sql_hrg_workshop) or die(mysql_error());
                        while($data = mysql_fetch_assoc($query_total_workshop)){
                            $total_workshop = $total_workshop + $data["hargasebelum"];
                        }
                    // ----------------------------------------------------------------------------
        
                    // DISINI NILAI TOTAL DARI WORKSHOP SUDAH DI DAPATKAN SESUAI YANG DIPILIH
                    // SELANJUTNYA TAMBAHKAN TOTAL KESELURUHAN DARI TOTAL WORKSHOP DENGAN HARGA PROFESI(SIMPOSIUM)
                    if ($joint_symposium == "Y") {
                      $total_simpo_work = $harga_simposium + $total_workshop;
                      $total_seluruh = $harga_simposium + $total_workshop + 3000;
                    } elseif ($joint_symposium == "T") {
                      $harga_simposium = 0;
                      $total_simpo_work = $harga_simposium + $total_workshop;
                      $total_seluruh = $harga_simposium + $total_workshop + 3000;
                    }
                    // ----------------------------------------------------------------------------
        
        
        
        
                    // SCRIPT UNTUK MENENTUKAN NO. VIRTUAL ACCOUNT
                    // echo $total_simpo_work.'<br>';
                    if($total_simpo_work > 1){
                        if ($total_simpo_work == 2000000) {
        
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
                                $hasilkode = "988004451".str_pad($kode, 7, "0", STR_PAD_LEFT);
                            } else {
                                $hasilkode = "9880044510000001";
                            }
        
                            $simpan_total = "
                                UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                                WHERE id_daftar = '$id_daftar'
                            ";
                            mysql_query($simpan_total) or die(mysql_error());
        
                        }elseif ($total_simpo_work == 1500000) {
        
                          $sql_carikode = "SELECT MAX(va) FROM tb_daftar WHERE total = '1503000'";
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
                              $hasilkode = "988004452".str_pad($kode, 7, "0", STR_PAD_LEFT);
                          } else {
                              $hasilkode = "9880044520000001";
                          }
        
                          $simpan_total = "
                              UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                              WHERE id_daftar = '$id_daftar'
                          ";
                          mysql_query($simpan_total) or die(mysql_error());
        
                        }elseif ($total_simpo_work == 1250000) {
        
                          $sql_carikode = "SELECT MAX(va) FROM tb_daftar WHERE total = '1253000'";
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
                              $hasilkode = "988004453".str_pad($kode, 7, "0", STR_PAD_LEFT);
                          } else {
                              $hasilkode = "9880044530000001";
                          }
        
                          $simpan_total = "
                              UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                              WHERE id_daftar = '$id_daftar'
                          ";
                          mysql_query($simpan_total) or die(mysql_error());
        
                        }elseif ($total_simpo_work == 2250000) {
        
                          $sql_carikode = "SELECT MAX(va) FROM tb_daftar WHERE total = '2253000'";
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
                              $hasilkode = "988004454".str_pad($kode, 7, "0", STR_PAD_LEFT);
                          } else {
                              $hasilkode = "9880044540000001";
                          }
        
                          $simpan_total = "
                              UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                              WHERE id_daftar = '$id_daftar'
                          ";
                          mysql_query($simpan_total) or die(mysql_error());
        
                        }elseif ($total_simpo_work == 3500000) {
        
                          $sql_carikode = "SELECT MAX(va) FROM tb_daftar WHERE total = '3503000'";
                          $carikode = mysql_query($sql_carikode) or die(mysql_error());
                          $datakode = mysql_fetch_array($carikode);
                          $cek = mysql_num_rows($carikode);
                          if ($cek >= 1) {
                              $nilaikode = substr($datakode[0], 9);
                            //   echo $nilaikode.'<br>'; die;
                              $kode = (int) $nilaikode;
                              // echo $kode.'<br>';
                              $kode = $kode +1;
                              // echo $kode.'<br>';
                              $hasilkode = "988004455".str_pad($kode, 7, "0", STR_PAD_LEFT);
                          } else {
                              $hasilkode = "9880044550000001";
                          }
        
                          $simpan_total = "
                              UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                              WHERE id_daftar = '$id_daftar'
                          ";
                          mysql_query($simpan_total) or die(mysql_error());
        
                        }elseif ($total_simpo_work == 2500000) {
        
                          $sql_carikode = "SELECT MAX(va) FROM tb_daftar WHERE total = '2503000'";
                          $carikode = mysql_query($sql_carikode) or die(mysql_error());
                          $datakode = mysql_fetch_array($carikode);
                          $cek = mysql_num_rows($carikode);
                          if ($cek >= 1) {
                              $nilaikode = substr($datakode[0], 9);
                            //   echo $nilaikode.'<br>'; die;
                              $kode = (int) $nilaikode;
                              // echo $kode.'<br>';
                              $kode = $kode +1;
                              // echo $kode.'<br>';
                              $hasilkode = "988004456".str_pad($kode, 7, "0", STR_PAD_LEFT);
                          } else {
                              $hasilkode = "9880044560000001";
                          }
        
                          $simpan_total = "
                              UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                              WHERE id_daftar = '$id_daftar'
                          ";
                          mysql_query($simpan_total) or die(mysql_error());
        
                        }elseif ($total_simpo_work == 3750000) {
        
                          $sql_carikode = "SELECT MAX(va) FROM tb_daftar WHERE total = '3753000'";
                          $carikode = mysql_query($sql_carikode) or die(mysql_error());
                          $datakode = mysql_fetch_array($carikode);
                          $cek = mysql_num_rows($carikode);
                          if ($cek >= 1) {
                              $nilaikode = substr($datakode[0], 9);
                            //   echo $nilaikode.'<br>'; die;
                              $kode = (int) $nilaikode;
                              // echo $kode.'<br>';
                              $kode = $kode +1;
                              // echo $kode.'<br>';
                              $hasilkode = "988004457".str_pad($kode, 7, "0", STR_PAD_LEFT);
                          } else {
                              $hasilkode = "9880044570000001";
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
                              $nilaikode = substr($datakode[0], 9);
                            //   echo $nilaikode.'<br>'; die;
                              $kode = (int) $nilaikode;
                              // echo $kode.'<br>';
                              $kode = $kode +1;
                              // echo $kode.'<br>';
                              $hasilkode = "988004458".str_pad($kode, 7, "0", STR_PAD_LEFT);
                          } else {
                              $hasilkode = "9880044580000001";
                          }
        
                          $simpan_total = "
                              UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                              WHERE id_daftar = '$id_daftar'
                          ";
                          mysql_query($simpan_total) or die(mysql_error());
        
                        }elseif ($total_simpo_work == 1000000) {
        
                          $sql_carikode = "SELECT MAX(va) FROM tb_daftar WHERE total = '1003000'";
                          $carikode = mysql_query($sql_carikode) or die(mysql_error());
                          $datakode = mysql_fetch_array($carikode);
                          $cek = mysql_num_rows($carikode);
                          if ($cek >= 1) {
                              $nilaikode = substr($datakode[0], 9);
                            //   echo $nilaikode.'<br>'; die;
                              $kode = (int) $nilaikode;
                              // echo $kode.'<br>';
                              $kode = $kode +1;
                              // echo $kode.'<br>';
                              $hasilkode = "988004459".str_pad($kode, 7, "0", STR_PAD_LEFT);
                          } else {
                              $hasilkode = "9880044590000001";
                          }
        
                          $simpan_total = "
                              UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                              WHERE id_daftar = '$id_daftar'
                          ";
                          mysql_query($simpan_total) or die(mysql_error());
        
                        }elseif ($total_simpo_work == 500000) {
        
                          $sql_carikode = "SELECT MAX(va) FROM tb_daftar WHERE total = '503000'";
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
                              $hasilkode = "9880044511".str_pad($kode, 6, "0", STR_PAD_LEFT);
                          } else {
                              $hasilkode = "9880044511000001";
                          }
        
                          $simpan_total = "
                              UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                              WHERE id_daftar = '$id_daftar'
                          ";
                          mysql_query($simpan_total) or die(mysql_error());
        
                        }elseif ($total_simpo_work == 1750000) {
        
                          $sql_carikode = "SELECT MAX(va) FROM tb_daftar WHERE total = '1753000'";
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
                              $hasilkode = "9880044512".str_pad($kode, 6, "0", STR_PAD_LEFT);
                          } else {
                              $hasilkode = "9880044512000001";
                          }
        
                          $simpan_total = "
                              UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                              WHERE id_daftar = '$id_daftar'
                          ";
                          mysql_query($simpan_total) or die(mysql_error());
        
                        }elseif ($total_simpo_work == 600000) {
        
                          $sql_carikode = "SELECT MAX(va) FROM tb_daftar WHERE total = '603000'";
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
                              $hasilkode = "9880044517".str_pad($kode, 6, "0", STR_PAD_LEFT);
                          } else {
                              $hasilkode = "9880044517000001";
                          }
        
                          $simpan_total = "
                              UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                              WHERE id_daftar = '$id_daftar'
                          ";
                          mysql_query($simpan_total) or die(mysql_error());
        
                        }elseif ($total_simpo_work == 2100000) {
        
                          $sql_carikode = "SELECT MAX(va) FROM tb_daftar WHERE total = '2103000'";
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
                              $hasilkode = "9880044518".str_pad($kode, 6, "0", STR_PAD_LEFT);
                          } else {
                              $hasilkode = "9880044518000001";
                          }
        
                          $simpan_total = "
                              UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                              WHERE id_daftar = '$id_daftar'
                          ";
                          mysql_query($simpan_total) or die(mysql_error());
        
                        }elseif ($total_simpo_work == 1600000) {
        
                          $sql_carikode = "SELECT MAX(va) FROM tb_daftar WHERE total = '1603000'";
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
                              $hasilkode = "9880044519".str_pad($kode, 6, "0", STR_PAD_LEFT);
                          } else {
                              $hasilkode = "9880044519000001";
                          }
        
                          $simpan_total = "
                              UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                              WHERE id_daftar = '$id_daftar'
                          ";
                          mysql_query($simpan_total) or die(mysql_error());
        
                        }elseif ($total_simpo_work == 1850000) {
        
                          $sql_carikode = "SELECT MAX(va) FROM tb_daftar WHERE total = '1853000'";
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
                              $hasilkode = "9880044521".str_pad($kode, 6, "0", STR_PAD_LEFT);
                          } else {
                              $hasilkode = "9880044521000001";
                          }
        
                          $simpan_total = "
                              UPDATE tb_daftar SET va = '$hasilkode', total = '$total_seluruh'
                              WHERE id_daftar = '$id_daftar'
                          ";
                          mysql_query($simpan_total) or die(mysql_error());
        
                        }
                    // -----------------------------------------------------------------
        
                    // PROSES PENGIRIMAN INFORMASI REGISTRASI USER KE GMAIL
                    // SCRIPT UNTUK KIRIM PESAN KE EMAIL USER
                       require_once "send_user.php";
                    // SCRIPT UNTUK KIRIM PESAN KE EMAIL MDJAMIL
                       //require_once "send_mdjamil.php";
						?>
						<!--<script type="text/javascript">
                            alert('Thank you, registration information has been sent via Email.');
                            window.location.href="index.php?ac=print&id=<?php echo $id_daftar ?>";
                        </script>-->
						<?php
						
                    }else {

                        $sqldel ="
                            DELETE FROM tb_detail_workshop WHERE id_daftar = '$id_daftar';
                        ";
                        $sqldel1 ="
                            DELETE FROM tb_daftar WHERE id_daftar = '$id_daftar';
                        ";

                        mysql_query($sqldel) or die(mysql_error());
                        mysql_query($sqldel1) or die(mysql_error());

                        ?>
                        <script type="text/javascript">
                            alert('Data Failed');
                            window.location.href="index.php?p=daftar_peserta";
                        </script>
                        <?php
                    }
            
    }

?>
