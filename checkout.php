<!DOCTYPE html>
<html lang="zxx" class="no-js">
<?php include 'pages/head.php'; ?>
<?php include 'pages/auth.php'; ?>

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
                            <li class="nav-item submenu dropdown">
                                <a href="shop.php" class="nav-link dropdown-toggle">Shop</a>

                            </li>

                            <li class="nav-item "><a class="nav-link" href="contact.php">Contact</a></li>
                            <?php if (isset($_SESSION['customer'])): ?>
                            <li class="nav-item "><a class="nav-link" href="profile.php">Profile</a></li>
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
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3>Billing Details</h3>

                            <div class="col-md-12 form-group p_star">
                                <label class="form-control-label">Shipping Address</label><br>
                                <textarea name="shipping_address" id="shipping_address" cols="60" rows="3"></textarea>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <label class="form-control-abel">Billing Address</label><br>
                                <textarea name="billing_address" id="billing_address" cols="60" rows="3"></textarea>
                            </div>


                        </div>
                        <div class="col-lg-4">
                            <div class="order_box">
                                <h2>Your Order</h2>
                                <ul class="list list_2">
                                    <li><a href="#">Subtotal <span>Rs.
                                                <?php echo $_REQUEST['total']; ?>.00
                                            </span></a></li>
                                    <li><a href="#">Shipping <span>Rs.
                                                <?php echo $res['shpping_fee']; ?>.00
                                            </span></a></li>
                                    <li><a href="#">Total <span>Rs.
                                                <?php echo $_REQUEST['total'] + $res['shpping_fee']; ?>.00
                                            </span></a></li>
                                </ul>

                                <div class="row px-2 mt-5">
                                    <h6 class="text-dark ml-3">Delivery Information</h6>
                                </div>
                                <div class="row px-2 mt-2">
                                    <div class="form-group col-md-12">
                                        <label class="form-control-label">Name on Card</label><br>
                                        <input class="form-control" type="text" id="holder_name" name="holder_name"
                                            placeholder="D.P Samarasingha">
                                    </div>
                                </div>
                                <div class="row px-2 ">
                                    <div class="form-group col-md-12">
                                        <label class="form-control-label">Card Number</label><br>
                                        <input class="form-control" type="text" id="card_num" name="card_num"
                                            placeholder="1111 2222 3333 4444">
                                    </div>
                                </div>
                                <div class="row px-2 ">
                                    <div class="form-group col-md-12">
                                        <label class="form-control-label">Expiration Date</label><br />
                                        <input class="form-control" type="text" id="expire" name="expire"
                                            placeholder="MM/YYYY">
                                    </div>
                                </div>
                                <div class="row px-2">
                                    <div class="form-group col-md-12">
                                        <label class="form-control-label">CVV</label><br />
                                        <input class="form-control" type="text" id="cvv" name="cvv" placeholder="***">
                                        <input class="form-control" type="hidden"
                                            value="<?php echo $_REQUEST['total'] + $res['shpping_fee']; ?>" id="total"
                                            name="total" placeholder="***">
                                        <input class="form-control" type="hidden"
                                        value="<?php echo $_SESSION['customer']; ?>" id="customer_id"
                                            name="customer_id" placeholder="***">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="primary-btn" type="button" onclick="checkOut(this.form)">Proceed to
                            Payment</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

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
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>