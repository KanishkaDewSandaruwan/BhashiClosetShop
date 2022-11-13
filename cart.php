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
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="cart.php">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    $getall = getAllCart($_SESSION['customer']);
                    $count = mysqli_num_rows($getall);
                    $total = 0;

                    if($count > 0){

                    while ($row = mysqli_fetch_assoc($getall)) {
                        $pid = $row['pid'];
                        $sub_total = $row['qty'] * $row['price'];
                        $total = $total + $sub_total;
                       $fullpayment =  $total + $res['shpping_fee'];


                        $img = $row['product_image'];
                        $img_src = "server/uploads/products/" . $img; ?>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img width="100px" src="<?php echo $img_src; ?>" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p><?php echo $row['product_name']; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>Rs. <?php echo $row['product_price']; ?>.00</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="number" name="qty" id="qty <?php echo $row['cart_id']; ?>"
                                            onchange="qtryChange(this, '<?php echo $row['cart_id']; ?>', 'qty');"
                                            value="<?php echo $row['qty']; ?>" class="form-control text-center">

                                    </div>
                                </td>
                                <td>
                                    <h5>Rs. <?php echo $sub_total; ?>.00</h5>
                                </td>
                            </tr>
                            <?php } }else{ ?>
                            <h1>Cart is empty</h1>
                            <?php } ?>

                           <?php if($total > 0) : ?>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>Rs. <?php echo $total; ?>.00</h5>
                                </td>
                            </tr>
                           
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Shipping</h5>
                                </td>
                                <td>
                                    <h5>Rs. <?php echo $res['shpping_fee'] ?>.00</h5>
                                </td>
                            </tr>
                           
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Total</h5>
                                </td>
                                <td>
                                    <h5>Rs. <?php echo  $fullpayment; ?>.00</h5>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="shop.php">Continue Shopping</a>
                                        <a class="primary-btn" href="checkout.php?total=<?php echo $total; ?>" >Proceed to checkout</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>