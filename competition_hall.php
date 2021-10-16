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
                <h2 class="text-center emphasis style10" data-in-effect="fadeInUp">Competition Hall</h2>
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

                                <h3 class="text-colored text-left emphasis style9">How to Become Our Sponsor and Virtual Exhibitor?</h3>
                                <hr>
                                <p>Welcome to the INA-TIME Competition Hall. Analogous to the competition exhibition on offline conference, the pages on the website is a space where all participants’ videos and posters present after the conference is over (for poster presentation). Check out the videos and posters below to learn about them.</p>
                                <br>
                                <h3 class="text-colored text-center emphasis style9 ">Educational Video Competition </h3>
                                <div class="row">
                                    <?php
                                    include "koneksi.php";
                                    $no = 1;
                                    $sqll = mysql_query("SELECT * FROM tb_education_video");
                                    while ($data = mysql_fetch_array($sqll)) {
                                    ?>
                                        <div class="col-md-4 ">
                                            <div class="panel panel-success m-l-r-20 m-t-60">
                                                <div class="panel-heading text-center">Thumbnail Video</div>
                                                <div class="panel-body">
                                                    <iframe width="100%" height="100%" src="<?php echo $data['video_embed'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div>

                                                <div class="panel-footer text-center" style="background-color: green;">
                                                    <a href="<?php echo $data['video_embed'] ?>" target="_blank" style="font-size: 15px; color: white;">Watch Video</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <br><br>
                                <h3 class="text-colored text-center emphasis style9 ">Poster Presentation </h3>


                                <table class="table table-bordered">
                                    <thead class="bg-success">
                                        <tr style="text-transform:uppercase;">
                                            <th>
                                                <center>No</center>
                                            </th>
                                            <th>
                                                <center>Participants’ Number</center>
                                            </th>
                                            <th>
                                                <center>Participants’ Name / Organization</center>
                                            </th>
                                            <th>
                                                <center>Poster Title</center>
                                            </th>
                                            <th>
                                                <center>Link</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "koneksi.php";
                                        $no = 1;
                                        $sqll = mysql_query("SELECT * FROM tb_poster");
                                        while ($data1 = mysql_fetch_array($sqll)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $data1['poster_partisipan_number'] ?></td>
                                                <td><?php echo $data1['poster_partisipan_nama'] ?></td>
                                                <td><?php echo $data1['poster_title'] ?></td>
                                                <td> <a href="<?php echo $data1['poster_link'] ?>" target="_blank"> Link</a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>