<?php
include 'koneksi.php';
$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM tb_sponsor WHERE id_sponsor='$id'");
$data = mysql_fetch_array($sql);
?>
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
                <h2 class="text-center emphasis style10" data-in-effect="fadeInUp">About Our Sponsorship</h2>
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
                        <div class="col-xs-12">
                            <div class="col-md-9 col-md-offset-1 panel-group toggle-questions" id="toggle-accordion">
                                <h3 class="text-colored text-center emphasis style9"><?php echo $data['tipe'] ?></h3>
                                <hr>
                                <div align=center>
                                    <img src="img/sponsor/<?php echo $data['logo'] ?>" class="img-fluid" width="400px" alt="">
                                    <h3 class="text-colored text-center emphasis style9"><?php echo $data['nama'] ?></h3>
                                </div>
                                <h3 class="text-colored text-left emphasis style9"><u>About Us</u></h3>
                                <p align=justify><?php echo $data['tentang'] ?></p>
                                <p><a href=""><?php echo $data['link_w'] ?></a></p>
                                <h3 class="text-colored text-left emphasis style9"><u>Our Products</u></h3>
                                <table>
                                </table>
                                <table class="table table-bordered">
                                    <thead class="bg-success">
                                        <tr style="text-transform:uppercase;">
                                            <th>
                                                <center>No</center>
                                            </th>
                                            <th>
                                                <center>Package</center>
                                            </th>
                                            <th>
                                                <center>Details</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                        <tr>
                                            <td>1.</td>
                                            <td><img src="img/sponsor/<?php echo $data['gambar_produk'] ?>" class="img-fluid" width="300px" alt=""></td>
                                            <td><?php echo $data['produk'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p align=justify><?php echo $data['link_v'] ?></p> <br>
                                <h3 class="text-colored text-left emphasis style9"><u>Contact Us</u></h3>
                                <?php echo $data['kontak'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>