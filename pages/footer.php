<!-- start footer Area -->
<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>About Us</h6>
                    <p>
                    <?php echo $res['about_desc']; ?>
                    </p>
                </div>
            </div>
            <div class="col-lg-4  col-md-6 col-sm-6">
              
            </div>
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget mail-chimp">
                    <h6 class="mb-20">Instragram Feed</h6>
                    <ul class="instafeed d-flex flex-wrap">
                        <?php
                        $getall = getAllgalleryImages();
                        $count = 0;
                        while ($row = mysqli_fetch_assoc($getall)) {

                            $gallery_id = $row['gallery_id'];
                            $img = $row['gallery_image'];
                            $img_src = "server/uploads/gallery/" . $img;
                            if ($count < 6): ?>
                        <li><img src="<?php echo $img_src; ?>" width="100px" height="50px" alt=""></li>
                        <?php endif;
                            $count++;
                        } ?>

                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="<?php echo $res['link_facebook']; ?>"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?php echo $res['link_twiiter']; ?>"><i class="fab fa-twitter"></i></a>
                        <a href="<?php echo $res['link_instragram']; ?>"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
            <p class="footer-text m-0"> &copy; <a href="index.php">Bhashi’s Closet</a>, All Right Reserved.
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </p>
        </div>
    </div>
</footer>
<!-- End footer Area -->