<!DOCTYPE html>
<html lang="zxx" class="no-js">
<?php include 'pages/head.php'; ?>

<body>

    <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="shop.php" class="nav-link dropdown-toggle">Shop</a>

                            </li>

                            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                            <?php if (isset($_SESSION['customer'])): ?>
                            <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="admin/logout.php">LogOut</a></li>
                            <li class="nav-item"><a class="nav-link" href="orderlist.php">Order List</a></li>
                            <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="admin/signin.php">LogIn</a></li>
                            <li class="nav-item"><a class="nav-link" href="admin/signup.php">Register</a></li>
                            <?php endif; ?>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a href="cart.php" class="cart"><span class="ti-bag"></span></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

    </header>
    <!-- End Header Area -->

    <!-- start banner Area -->
    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="active-banner-slider owl-carousel">
                        <!-- single-slide -->
                        <div class="row single-slide align-items-center d-flex">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h1>
                                        <?php echo $res['header_title']; ?>
                                    </h1>
                                    <p>
                                        <?php echo $res['header_desc']; ?>
                                    </p>
                                    <form method="post">
                                        <div class="input-group rounded">
                                            <input type="search" class="form-control rounded" name="key" id="key" placeholder="Search"/>
                                            <button type="button" onclick="search(this.form)" class="input-group-text border-0" id="search-addon">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <img class="img-fluid" src="<?php echo $header_src; ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- single-slide -->
                        <div class="row single-slide">
                            <div class="col-lg-5">
                                <div class="banner-content">
                                    <h1>
                                        <?php echo $res['header_title']; ?>
                                    </h1>
                                    <p>
                                        <?php echo $res['header_desc']; ?>
                                    </p>
                                    <form method="post">
                                        <div class="input-group rounded">
                                            <input type="text" class="form-control rounded" name="key" id="key" placeholder="Search"
                                                aria-label="Search" aria-describedby="search-addon" />
                                            <button type="button" onclick="search(this.form)" class="input-group-text border-0" id="search-addon">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <img class="img-fluid" src="<?php echo $header_src; ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <section class="category-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Our Main Product Categories</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">

                    <div class="row">
                        <?php
                    $getall = getAllParentCategory();

                    while ($row = mysqli_fetch_assoc($getall)) {
	                    $cat_id = $row['cat_id'];

	                    $img = $row['cat_image'];
	                    $img_src = "server/uploads/category/" . $img;

	                    $getallCp2 = getAllItemsByParentCategory($cat_id);
	                    if ($row2 = mysqli_fetch_assoc($getallCp2)) {
                    ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="<?php echo $img_src; ?>" alt="">
                                <a href="category.php?subcat_id=<?php echo $cat_id; ?>">
                                    <div class="deal-details">
                                        <h6 class="deal-title">
                                            <?php echo $row['cat_name']; ?>
                                        </h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php }
                    } ?>


                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- start features Area -->
    <section class="features-area section_gap">
        <div class="container">
            <div class="row features-inner">
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon1.png" alt="">
                        </div>
                        <h6>Free Delivery</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon2.png" alt="">
                        </div>
                        <h6>Return Policy</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon3.png" alt="">
                        </div>
                        <h6>24/7 Support</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="img/features/f-icon4.png" alt="">
                        </div>
                        <h6>Secure Payment</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end features Area -->

    <!-- Start category Area -->

    <section class="category-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Our Categories</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">

                    <div class="row">
                        <?php
                    $getall = getAllSubcat();

                    while ($row = mysqli_fetch_assoc($getall)) {
	                    $cat_id = $row['cat_id'];

	                    $img = $row['cat_image'];
	                    $img_src = "server/uploads/category/" . $img;

	                    $getallCp2 = getAllItemsByParentCategory($cat_id);
	                    if ($row2 = mysqli_fetch_assoc($getallCp2)) {
                    ?>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="<?php echo $img_src; ?>" alt="">
                                <a href="shop.php?cat_id=<?php echo $cat_id; ?>">
                                    <div class="deal-details">
                                        <h6 class="deal-title">
                                            <?php echo $row['cat_name']; ?>
                                        </h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php }
                    } ?>


                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End category Area -->
    <?php
    $getallCp2 = getAllItemsLatest();
    $count = 0;
    if ($row3 = mysqli_fetch_assoc($getallCp2)) { ?>
    <!-- start product Area -->
    <section class="owl-carousel active-product-area section_gap">
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Latest Products</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- single product -->
                    <?php
	    $getallCp2 = getAllItemsLatest();
	    $count = 0;
	    while ($row3 = mysqli_fetch_assoc($getallCp2)) {
		    $pid = $row3['pid'];
		    $img = $row3['product_image'];
		    $img_src = "server/uploads/products/" . $img;
		    if ($count < 6) { ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="single-product" style="height: 350px;">
                            <div class="col-md-12">
                                <img class="img-fluid" style="height: 150px;" src="<?php echo $img_src; ?>" alt="">
                            </div>
                            <div class="product-details">
                                <h6>
                                    <?php echo $row3['product_name']; ?>
                                </h6>
                                <div class="price">
                                    <h6>Rs.
                                        <?php echo $row3['product_price']; ?>.00
                                    </h6>
                                </div>
                                <div class="prd-bottom">
                                    <button class="btn btn-outline-primary m-1" type="button"
                                        onclick="addtoCartProduct(<?php echo $pid; ?>, <?php echo $row2['product_price']; ?>)">Add
                                        to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
		    $count++;
	    } ?>

                </div>
            </div>
        </div>
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Our Best Products</h1>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- single product -->
                    <?php
	    $getallCp2 = getAllAvailableItems();
	    $count = 0;
	    while ($row3 = mysqli_fetch_assoc($getallCp2)) {
		    $pid = $row3['pid'];
		    $img = $row3['product_image'];
		    $img_src = "server/uploads/products/" . $img;
		    if ($count < 6) { ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="single-product" style="height: 350px;">
                            <div class="col-md-12">
                                <img class="img-fluid" style="height: 150px;" src="<?php echo $img_src; ?>" alt="">
                            </div>
                            <div class="product-details">
                                <h6>
                                    <?php echo $row3['product_name']; ?>
                                </h6>
                                <div class="price">
                                    <h6>Rs.
                                        <?php echo $row3['product_price']; ?>.00
                                    </h6>
                                </div>
                                <div class="prd-bottom">
                                    <button class="btn btn-outline-primary m-1" type="button"
                                        onclick="addtoCartProduct(<?php echo $pid; ?>, <?php echo $row2['product_price']; ?>)">Add
                                        to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
		    $count++;
	    } ?>

                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <!-- end product Area -->

    <style>
    .exclusive-deal-area .exclusive-left {
        background: url('<?php echo $about_src; ?>') center no-repeat !important;
    }
    </style>
    <!-- Start exclusive deal Area -->
    <section class="exclusive-deal-area">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 no-padding exclusive-left">
                    <div class="row clock_sec clockdiv" id="clockdiv">
                        <div class="col-lg-12">
                            <h1><?php echo $res['about_title']; ?></h1>
                            <p><?php echo $res['about_desc']; ?></p>
                        </div>

                    </div>
                    <a href="shop.php" class="primary-btn">Shop Now</a>
                </div>
                <div class="col-lg-6 no-padding exclusive-right">
                    <div class="active-exclusive-product-slider">
                        <!-- single exclusive carousel -->
                        <?php
                        $getallCp2 = getAllAvailableItems();
                        $count = 0;
                        while ($row3 = mysqli_fetch_assoc($getallCp2)) {
                            $pid = $row3['pid'];
                            $img = $row3['product_image'];
                            $img_src = "server/uploads/products/" . $img;
                            if ($count < 6) { ?>
                        <div class="single-exclusive-slider">
                            <img class="img-fluid" style="width: 100%; height: 300px;" src="<?php echo $img_src; ?>"
                                alt="">
                            <div class="product-details">
                                <div class="price">
                                    <h6>Rs.
                                        <?php echo $row3['product_price']; ?>.00</h6>
                                </div>
                                <h4> <?php echo $row3['product_name']; ?></h4>
                                <div class="prd-bottom">
                                    <button class="btn btn-outline-primary m-1" type="button"
                                        onclick="addtoCartProduct(<?php echo $pid; ?>, <?php echo $row2['product_price']; ?>)">Add
                                        to Cart</button>
                                </div>
                            </div>
                        </div>
                        <?php }
		    $count++;
	    } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End exclusive deal Area -->


    <?php include 'pages/footer.php'; ?>

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>