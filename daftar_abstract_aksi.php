<?php
    require_once "koneksi.php";

    if (isset($_POST["simpan"])) {

        //require 'PHPMailerAutoload.php';
        //require 'credential.php';

        // var_dump($_POST);
        $nama_lengkap = @$_POST["nama_lengkap"];
        //$id_simposium = @$_POST["id_simposium"];
        $asal_cabang = @$_POST["asal_cabang"];
        $email = @$_POST["email"];
		$password = @$_POST["password"];
        $no_telpon = @$_POST["no_telpon"];
        //$id_workshop = @$_POST["id_workshop"];
        //$jml_dt_workshop = count($id_workshop);
        $tgl_daftar = date('Y-m-d');
        //$harga_simposium = @$_POST["hargasesudah"];
        //$joint_symposium = @$_POST["joint_symposium"];
        
        

        
                // TAHAP 1
                // KODE UNTUK MENGINPUT KE TABEL DAFTAR
                   
                $sql_daftar = "
                    INSERT INTO tb_daftar (nama_lengkap, id_simposium, joint_symposium, asal_cabang, email,password, no_telpon, tgl_daftar)
                    VALUES ('$nama_lengkap','0','0','$asal_cabang','$email','$password','$no_telpon','$tgl_daftar')
                    ";
                $query_daftar = mysql_query($sql_daftar) or die(mysql_error());
         
                // -----------------------------------------------------------------
        ?>
		
		
         				<script type="text/javascript">
                            alert('Thank you for registration, please login for submit your abstract ');
                            window.location.href="index.php?p=login_peserta";
                        </script>
		

<?php
}
?>