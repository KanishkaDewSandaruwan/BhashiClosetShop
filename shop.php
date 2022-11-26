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
                            <li class="nav-item "><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item active">
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

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Shop</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="shop.php">Shop</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	
    <?php
    $getallCp2 = getAllItemsLatest();
    $count = 0;
    if ($row3 = mysqli_fetch_assoc($getallCp2)) { ?>
    <!-- start product Area -->
    <section class="owl-carousel mt-5">
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
                                    <button class="btn btn-outline-primary m-1" type="button" onclick="addtoCartProduct(<?php echo $pid; ?>, <?php echo $row2['product_price']; ?>)">Add to Cart</button>
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






    <!-- start product Area -->
    <section class="owl-carousel mt-5">
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Our Products</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- single product -->
                    <?php
                if(isset($_REQUEST['cat_id']) && $_REQUEST['cat_id'] != ""){
                    $getallCp = getAllProductItemsByCategory($_REQUEST['cat_id']);
                }else if(isset($_REQUEST['key']) && $_REQUEST['key'] != ""){
                    $getallCp = getAllItemsSearch($_REQUEST['key']);
                }else{
                    $getallCp = getAllAvailableItems();
                }
                
                while ($row2 = mysqli_fetch_assoc($getallCp)) {
                    $pid = $row2['pid'];
                    $img = $row2['product_image'];
                    $img_src = "server/uploads/products/" . $img;?>

                    <div class="col-lg-3 col-md-6">
                        <div class="single-product" style="height: 350px;">
                            <a href="single-product.php?pid=<?php echo $pid; ?>">
                            <div class="col-md-12">
                                <img class="img-fluid" style="height: 150px;" src="<?php echo $img_src; ?>" alt="">
                            </div>
                            <div class="product-details">
                                <h6>
                                    <?php echo $row2['product_name']; ?>
                                </h6>
                                <div class="price">
                                    <h6>Rs.
                                        <?php echo $row2['product_price']; ?>.00
                                    </h6>
                                </div>
                            </a>
                                <div class="prd-bottom">
                                    <button class="btn btn-outline-primary m-1" type="button" onclick="addtoCartProduct(<?php echo $pid; ?>, <?php echo $row2['product_price']; ?>)">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
       
    </section>

    <!-- end product Area -->


	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>