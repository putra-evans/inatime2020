<style type="text/css">
    .style22 {
        font-size: 12px
    }

    .style23 {
        color: #FFFFFF
    }

    .style24 {
        color: #0000FF
    }
</style>
<section class="portfolio-header parallax parallax1" style="background: url('img/tourism/jam.jpg') 50% 0 no-repeat fixed;">
    <div class="dark-overlay p-t-b-80" data-overlay-opacity="0">
        <div class="container">
            <div class="row">
                <p class="col-sm-12 text-light text-center" data-aos="fade-down" data-aos-delay="0"></p>
                <h3 class="text-center emphasis style23" style="font-family: arial" data-in-effect="fadeInUp">Log in to your account</h3>
                <p class="col-sm-12 text-light text-center" data-aos="fade-up" data-aos-delay="300"></p>
            </div>
        </div>
    </div>
</section>
<section class="parallax parallax4" style="background: url('img/backgrounds/back1.jpg') 50% 0 no-repeat fixed;">
    <div class="dark-overlay p-t-b-80" data-overlay-opacity="0.1">

        <div class="container">

            <div class="row" style="background-color: white;">


                <div class="col-md-5"><br>
                    <div class="alert alert-info">Log in to your account</div>


                    <form method="POST" class="form-horizontal" action="" enctype="multipart/form-data">

                        <div class="box-body">
                            <div class="col-sm-10">
                                <?php
                                include "koneksi.php";
                                if (@$_POST['save']) {
                                    if (@$_POST['level'] == 'pesertabaru') {
                                        $username = isset($_POST['email']) ? $_POST['email'] : '';
                                        $password = isset($_POST['password']) ? $_POST['password'] : '';
                                        $tabel = "tb_daftar";
                                        $sql = mysql_query("SELECT * FROM $tabel 
                                            WHERE email='" . $username . "' AND 
                                            password='" . $password . "' ");
                                        $jml = mysql_num_rows($sql);
                                        $row = mysql_fetch_array($sql);
                                        if ($jml > 0) {
                                            session_start();
                                            $_SESSION['email'] = $row['email'];
                                            $_SESSION['id'] = $row['id_daftar'];
                                            $_SESSION['password'] = $row['password'];

                                            $_SESSION['nama'] = $row['nama_lengkap'];
                                            echo "
                                                    <Script>
                                                        alert('Welcome $_SESSION[nama]');
                                                        window.location='index.php?p=entry_abstract';
                                                    </script>";
                                        } else {
                                            echo "
                                                    <Script>
                                                        alert('Login Failed');
                                                        window.location='index.php';
                                                    </script>";
                                        }
                                    } else {
                                        $username = isset($_POST['email']) ? $_POST['email'] : '';
                                        $password = isset($_POST['password']) ? $_POST['password'] : '';
                                        $tabel = "tb_regis_lama";
                                        $sql = mysql_query("SELECT * FROM $tabel 
                                            WHERE lama_email='" . $username . "' AND 
                                            lama_password='" . $password . "' ");
                                        $jml = mysql_num_rows($sql);
                                        $row = mysql_fetch_array($sql);
                                        if ($jml > 0) {
                                            session_start();
                                            $_SESSION['id'] = $row['lama_id'];
                                            $_SESSION['email'] = $row['lama_email'];
                                            $_SESSION['password'] = $row['lama_password'];
                                            $_SESSION['nama'] = $row['lama_nama'];

                                            echo "
                                                    <Script>
                                                        alert('Welcome $_SESSION[nama]');
                                                        window.location='index.php?p=entry_abstract';
                                                    </script>";
                                        } else {
                                            echo "
                                                    <Script>
                                                        alert('Login Failed');
                                                        window.location='index.php';
                                                    </script>";
                                        }
                                    }
                                }
                                ?>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="nama" class="control-label">Email</label><br>
                                        <input type="text" name="email" id="email" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="kdp" class="control-label">Password</label><br>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="kdp" class="control-label">Level</label><br>
                                        <select name="level" class="form-control">
                                            <option value="">--Silahkan Pilih--</option>
                                            <option value="pesertabaru">Peserta Baru</option>
                                            <option value="pesertalama">Peserta Lama</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div style="color: black; background-color: black;" class="col-sm-4 col-md-12 m-l-r-30">
                                        <button type="submit" name="submit" class="col-md-12 btn btn-primary warna">Login</button>
                                        <input type="hidden" name="save" value="save"><br>
                                        <span class="style22">No account yet ?
                                            <a href="?p=daftar-peserta" class="style24">Register Now</a></span>
                                        </td>
                                        </tr>
                                    </div>
                                </div>

                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    <?php echo $jsArray; ?>

    function changeValue(id_simposium) {
        document.getElementById('hargasesudah').value = dtpgj[id_simposium].hargasesudah;
    };
</script>