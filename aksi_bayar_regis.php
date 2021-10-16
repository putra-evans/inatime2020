<?php
require_once "koneksi.php";

if (isset($_POST["simpan"])) {

    //require 'PHPMailerAutoload.php';
    //require 'credential.php';

    // var_dump($_POST);
    // $id_daftar   = @$_POST["id_daftar"];
    $email  = @$_POST["email"];
    $nama  = @$_POST["nama_lengkap"];
    $tgl = @$_POST["tgl"];


    $bukti = $_FILES['bukti']['name'];
    $lokasi1 = $_FILES['bukti']['tmp_name'];

    move_uploaded_file($lokasi1, "img/regis_bukti/" . $bukti);




    $sql_daftar = "INSERT INTO `tb_bukti_bayar`(`email_daftar`, `nama_daftar`, `tgl_daftar`, `bukti`) VALUES ('$email','$nama','$tgl','$bukti')";
    $query_daftar = mysql_query($sql_daftar) or die(mysql_error());

    // -----------------------------------------------------------------
?>

    <script type="text/javascript">
                            alert('Thank you for registration');
                            window.location.href="index.php?p=login_peserta";
                        </script>


<?php
}
?>