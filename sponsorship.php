<style type="text/css">
    .style9 {
        font-family: "Monotype Corsiva";
        color: #00882c;
        font-weight: bold;
    }

    .style10 {
        color: #FFFFFF
    }
</style>
<section class="portfolio-header parallax parallax1" style="background: url('img/tourism/jam.jpg') 50% 0 no-repeat fixed;">
    <div class="dark-overlay p-t-b-80" data-overlay-opacity="0">
        <div class="container">
            <div class="row">
                <p class="col-sm-12 text-light text-center" data-aos="fade-down" data-aos-delay="0"></p>
                <h2 class="text-center emphasis style10" data-in-effect="fadeInUp">Our Sponsorship</h2>
                <p class="col-sm-12 text-light text-center" data-aos="fade-up" data-aos-delay="300"></p>
            </div>
        </div>
    </div>
</section>

<section style="background:url('img/backgrounds/back1.jpg');" class="blogging blog p-t-b-10" id="section2">
    <div class="white-overlay p-t-b-60" data-overlay-opacity="0.5">
        <div class="container">
            <div class="row">
                <div class="item col-sm-12 p-b-10">
                    <div class="post row">
                        <h3 class="text-colored text-center emphasis style9">Welcome to Our Sponsorship</h3>

                        <div class="col-xs-12">
                            <center><b>Platinum Sponsorship</b></center>
                            <hr style="width: 80%;">
                            <?php
                            include 'koneksi.php';
                            $sql = mysql_query("SELECT * FROM tb_sponsor WHERE tipe='Platinum Package'");
                            while ($data = mysql_fetch_array($sql)) {
                            ?>
                                <div class="col-md-4 col-sm-4 m-t-20" style="padding-left: 20px; padding-right: 20px;">
                                    <div class="panel panel-success">
                                        <div class="panel-heading text-center">Sponsorship Logo</div>
                                        <div class="panel-body" align=center style="height: 33rem;">
                                            <img src="img/sponsor/<?php echo $data['logo'] ?>" alt="" class="img-fluid" width="300px">
                                        </div>
                                        <div class="panel-footer" align=center style="background-color: #00882c;text-transform: uppercase;">
                                            <button style="background-color: #00882c" onclick="tampilModal('<?php echo $data['id_sponsor'] ?>')" class="btn btn-success">Visit booth</button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="col-xs-12">
                            <center><b style="font-size: 20px; font-weight: bold;">Gold Sponsorship</b></center>
                            <hr style="width: 80%;">
                            <?php
                            include 'koneksi.php';
                            $sql = mysql_query("SELECT * FROM tb_sponsor WHERE tipe='Gold Package'");
                            while ($data = mysql_fetch_array($sql)) {
                            ?>
                                <div class="col-md-4 col-sm-4 m-t-20" style="padding-left: 20px; padding-right: 20px;">
                                    <div class="panel panel-success">
                                        <div class="panel-heading text-center" style="font-size: 20px;color: black;font-weight: bold;"><?= $data['nama'] ?></div>
                                        <div class="panel-body" align=center style="height: 33rem;">
                                            <img src="img/sponsor/<?php echo $data['logo'] ?>" alt="<?= $data['nama'] ?>" class="img-fluid" width="300px">
                                        </div>
                                        <div class="panel-footer" align=center style="background-color: #00882c;text-transform: uppercase;">
                                            <button style="background-color: #00882c" onclick="tampilModal1('<?php echo $data['id_sponsor'] ?>')" class="btn btn-success">Visit booth</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->

                            <?php } ?>
                        </div>

                        <div class="col-xs-12">
                            <center><b>Silver Sponsorship</b></center>
                            <hr style="width: 80%;">
                            <?php
                            include 'koneksi.php';
                            $sql = mysql_query("SELECT * FROM tb_sponsor WHERE tipe='Silver Package'");
                            while ($data = mysql_fetch_array($sql)) {
                            ?>
                                <div class="col-md-4 col-sm-4 m-t-20" style="padding-left: 20px; padding-right: 20px;">
                                    <div class="panel panel-success">
                                        <div class="panel-heading text-center">Sponsorship Logo</div>
                                        <div class="panel-body" align=center style="height: 33rem;">
                                            <img src="img/sponsor/<?php echo $data['logo'] ?>" alt="" class="img-fluid" width="300px">
                                        </div>
                                        <div class="panel-footer" align=center style="background-color: #00882c;text-transform: uppercase;">
                                            <button style="background-color: #00882c" onclick="tampilModal2('<?php echo $data['id_sponsor'] ?>')" class="btn btn-success">Visit booth</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="gold" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="container-fluid row" style="padding: 100px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding-left: 10px;">
                    <h4 class="modal-title text-colored text-center emphasis style9" id="myModalLabel">Complete Your Information</h4>
                    <h4 class="text-colored text-center emphasis style9"></h4>
                </div>
                <div class="modal-body" style="padding-left: 20px; padding-right:20px">
                    <form action="" method="POST">
                        <div class="form-group">
                            <!-- <label for="">Id</label> -->
                            <input type="hidden" name="id" id="id2" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" name="nomor" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success" name="goldTombol">Save Information</button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </form>
                    <?php
                    if (isset($_POST['goldTombol'])) {
                        $sql = mysql_query("INSERT INTO tb_kunjungan_sponsor(id_sponsor, nama, nohp, email) VALUES ('$_POST[id]','$_POST[nama]','$_POST[nomor]','$_POST[email]')");
                        if ($sql == TRUE) {
                            echo "<script>
                                                            alert('Success, Thank You')
                                                            window.location.href='?p=detail_sponsor&id=" . $_POST['id'] . "'
                                                            </script>";
                        } else {
                            echo "<script>
                                                            alert('Failed')
                                                            window.location.href='?p=sponsorship'
                                                            </script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="silver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="container-fluid row" style="padding: 100px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding-left: 10px;">
                    <h4 class="modal-title text-colored text-center emphasis style9" id="myModalLabel">Complete Your Information </h4>
                    <h4 class="text-colored text-center emphasis style9"><?php echo $data['tipe'] ?></h4>
                </div>
                <div class="modal-body" style="padding-left: 20px; padding-right:20px">
                    <form action="" method="POST">
                        <div class="form-group">
                            <!-- <label for="">Id</label> -->
                            <input type="hidden" name="id" id="id3" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" name="nomor" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>
                        <button class="btn btn-success" name="silverTombol">Save Information</button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </form>
                    <?php
                    if (isset($_POST['silverTombol'])) {
                        $sql = mysql_query("INSERT INTO tb_kunjungan_sponsor(id_sponsor, nama, nohp, email) VALUES ('$_POST[id]','$_POST[nama]','$_POST[nomor]','$_POST[email]')");
                        if ($sql == TRUE) {
                            echo "<script>
                                                            alert('Success, Thank You')
                                                            window.location.href='?p=detail_sponsor&id=" . $_POST['id'] . "'
                                                            </script>";
                        } else {
                            echo "<script>
                                                            alert('Failed')
                                                            window.location.href='?p=sponsorship'
                                                            </script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="platinum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="container-fluid row" style="padding: 100px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding-left: 10px;">
                    <h4 class="modal-title text-colored text-center emphasis style9" id="myModalLabel">Complete Your Information</h4>
                    <h4 class="text-colored text-center emphasis style9"></h4>

                </div>
                <div class="modal-body" style="padding-left: 20px; padding-right:20px">
                    <form action="" method="POST">
                        <div class="form-group">
                            <!-- <label for="">Id</label> -->
                            <input type="hidden" name="id" id="id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" name="nomor" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success" name="platinumTombol">Save Information</button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </form>
                    <?php
                    if (isset($_POST['platinumTombol'])) {

                        $sql = mysql_query("INSERT INTO tb_kunjungan_sponsor(id_sponsor, nama, nohp, email) VALUES ('$_POST[id]','$_POST[nama]','$_POST[nomor]','$_POST[email]')");
                        if ($sql == TRUE) {
                            echo "<script>
                                                            alert('Success, Thank You')
                                                            window.location.href='?p=detail_sponsor&id=" . $_POST['id'] . "'
                                                            </script>";
                        } else {
                            echo "<script>
                                                            alert('Failed')
                                                            window.location.href='?p=sponsorship'
                                                            </script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
<script>
    function tampilModal(id) {
        $.ajax({
            url: 'tampilSponsor.php',
            type: 'post',
            data: {
                'id': id
            },
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id_sponsor);
                $('#platinum').modal()
            }

        })
    }

    function tampilModal1(id) {
        $.ajax({
            url: 'tampilSponsor.php',
            type: 'post',
            data: {
                'id': id
            },
            dataType: 'json',
            success: function(data) {
                $('#id2').val(data.id_sponsor);
                $('#gold').modal()
            }

        })
    }

    function tampilModal2(id) {
        $.ajax({
            url: 'tampilSponsor.php',
            type: 'post',
            data: {
                'id': id
            },
            dataType: 'json',
            success: function(data) {
                $('#id3').val(data.id_sponsor);
                $('#silver').modal()
            }

        })
    }
</script>