<?php
    include "koneksi.php";

    function upload(){
        $namafiles = $_FILES['files']['name'];
        $ukuranfiles = $_FILES['files']['size'];
        $errorfiles = $_FILES['files']['error'];
        $tmpfiles = $_FILES['files']['tmp_name'];

        //pengecekan user diharuskan upload files
        if ($errorfiles === 4) {
            ?>
            <script type="text/javascript">
                alert ("Maaf, files belum di upload");
            </script>
            <?php
            return false;
        }

        //pengecekan user yang di upload files atau bukan
        $eksfilesvalid = ['pdf','docx','doc'];
        $eksfiles = explode('.', $namafiles); //==> fauzi.jpg menjadi ['fauzi','jpg']
        $eksfiles =strtolower( end($eksfiles) );

            if (!in_array($eksfiles, $eksfilesvalid)) {
                ?>
                    <script type="text/javascript">
                        alert ("Maaf, File yang di upload bukan files.");
                    </script>
                <?php
                return false;
            }

        //pengecekan user yang di upload ukuran tidak boleh lebih dari 1mb
        if ($ukuranfiles > 100000000) {
            ?>
                <script type="text/javascript">
                    alert ("Maaf, Ukuran files terlalu besar.");
                </script>
            <?php
            return false;
        }

        //JIKA LOLOS 3 PENGECEKAN DIATAS, LAKUKAN PROSES files DIUPLOAD READY
        //TAPI LAKUKAN PENGACAKAN NAMA files DULU JIKA TIDAK
        //NANTINYA PASTI AKAN BERTEMU DENGAN MASALAH
        $namafilesbaru = uniqid();
        $namafilesbaru .= '.';
        $namafilesbaru .= $eksfiles;
        // var_dump($namafilesbaru); die; //AKTIFKAN , JIKA INGIN TAU REAKSI 3 PENGECEKAN DI ATAS.

        move_uploaded_file($tmpfiles, 'files/'.$namafilesbaru);
        return $namafilesbaru;
    }


if (isset($_POST["simpan"])) {
    $nama = @$_POST["nama"];
    $asal_institusi = @$_POST["asal_institusi"];
    $email = @$_POST["email"];
    $no_telpon = @$_POST["no_telpon"];
    $judul = @$_POST["judul"];

    $cek_email = "SELECT email FROM tb_daftar WHERE email = '$email'";
    $query_cek = mysql_query($cek_email) or die(mysql_error());
    $cek = mysql_num_rows($query_cek);
    // echo $cek;

    if ($cek >= 1) {

        $files = upload();
        if (!$files) {
            ?>
                <script>
                    window.location.href="index.php?p=daftar&page=present";
                </script>
            <?php
        }
        $insert = "INSERT INTO tb_presentation (nama, asal_institusi, email, no_telpon, judul, abstract) VALUES ('$nama','$asal_institusi','$email','$no_telpon','$judul','$files')";
        // echo $insert; die;
        $data = mysql_query($insert) or die(mysql_error());
            ?>
                <script>
                    alert("Berhasil tersimpan.");
                    window.location.href="index.php";
                </script>
            <?php

    }elseif ($cek == 0) {
        ?>
                <script>
                    alert("Maaf, Data Bapak/ibuk Belum tersimpan sebagai peserta Symposium and Workshop.");
                    window.location.href="index.php?p=daftar&page=present";
                </script>
            <?php

    }

}
?>
