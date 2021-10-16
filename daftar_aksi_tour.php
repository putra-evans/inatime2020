<?php
    include "koneksi.php";
    if (isset($_POST["booking"])) {
        require 'PHPMailerAutoload.php';
        require 'credential_tour.php';

        $nama = @$_POST["nama"];
        $no_telpon = @$_POST["no_telpon"];
        $email = @$_POST["email"];
        $request = @$_POST["request"];
        $joint_akomodasi = @$_POST["joint_akomodasi"];

        $cek_email = "SELECT email FROM tb_daftar WHERE email = '$email'";
        $query_cek = mysql_query($cek_email) or die(mysql_error());
        $cek = mysql_num_rows($query_cek);

        if ($cek >= 1) {

        // var_dump($_POST); die;
            $sql = "
                INSERT INTO tb_akomodasi (nama, no_telpon, email, request, joint_akomodasi)
                VALUES ('$nama','$no_telpon','$email','$request','$joint_akomodasi')
            ";

            mysql_query($sql) or die(mysql_error());

            require_once "send_akomodasi.php";
            //require_once "send_mdjamil_tour.php";
            require_once "send_akomodasi_user.php";
           
            ?>

					
						
					
			<?php

        }elseif ($cek == 0) {
            ?>
			<script type="text/javascript">
                            alert('Sorry, your data has not been saved as a participant in the Symposium and Workshop.');
                            window.location.href="index.php?p=daftar-peserta";
                        </script>
                    
                <?php

        }

    }
?>
