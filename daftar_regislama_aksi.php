<?php
require_once "koneksi.php";

if (isset($_POST["simpan"])) {

    //require 'PHPMailerAutoload.php';
    //require 'credential.php';

    // var_dump($_POST);
    $nama_lengkap   = @$_POST["nama_lengkap"];
    $participants   = @$_POST["participants"];
    $instansi       = @$_POST["instansi"];
    $asal_cabang    = @$_POST["asal_cabang"];
    $email          = @$_POST["email"];
    $phone          = @$_POST["phone"];
    $password       = @$_POST["password"];
    $regiswith      = @$_POST["regiswith"];
    $workshopregis  = @$_POST["workshopregis"];
    $booking        = @$_POST["boking"];
    $account        = @$_POST["account"];
    $spons        = @$_POST["spons"];

    $receipt = $_FILES['receipt']['name'];
    $lokasi1 = $_FILES['receipt']['tmp_name'];

    move_uploaded_file($lokasi1, "img/regis/" . $receipt);

    $accomodation = $_FILES['accomodation']['name'];
    $lokasi2 = $_FILES['accomodation']['tmp_name'];

    move_uploaded_file($lokasi2, "img/regis/" . $accomodation);


    $sql_daftar = "
                INSERT INTO `tb_regis_lama`(`lama_nama`, `lama_parti`, `lama_instansi`, `lama_asal`, `lama_email`, `lama_phone`, `lama_password`, `lama_regiswith`, `lama_workshopregis`, 
                `lama_booking`, `lama_account`, `lama_receipt`, `lama_accomodation`,`sponsor`) VALUES 
                
                ('$nama_lengkap','$participants','$instansi','$asal_cabang','$email','$phone','$password','$regiswith ','$workshopregis','$booking ','$account','$receipt','$accomodation','$spons')";
    $query_daftar = mysql_query($sql_daftar) or die(mysql_error());

    // -----------------------------------------------------------------
    $sql_id = "SELECT LAST_INSERT_ID() as id";
    $query_id = mysql_query($sql_id) or die(mysql_error());
    $data = mysql_fetch_assoc($query_id);
    $id_daftar = $data["id"];

?>
<script>
    alert('Thank you, re-registration success.');
    window.location='index.php?p=home';
    </script>";
    <!-- <script type="text/javascript">
                            alert('Thank you for registration, please login for submit your abstract ');
                            window.location.href="index.php?p=login_peserta";
                        </script> -->


<?php
}
?>