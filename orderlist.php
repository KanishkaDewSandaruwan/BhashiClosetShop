<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php include 'pages/head.php'; ?>
<?php include 'pages/auth.php'; ?>

<body>

    <!-- Start Header Area -->
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
                            <li class="nav-item active"><a class="nav-link" href="orderlist.php">Order List</a></li>
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
                    <h1>Profile</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="profile.php">Profile</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <?php 
$getall = getAllcustomerById($_SESSION['customer']);
$row=mysqli_fetch_assoc($getall);
$customer_id = $row['customer_id']; ?>

    <!--================Contact Area =================-->
    <section class="contact_area section_gap_bottom">
        <div class="container">
        <?php 
    $getall = getAllOrders();

    while($row=mysqli_fetch_assoc($getall)){ 
        $order_id = $row['order_id'];
        ?>
        <article class="card mt-5" style="border: 2px solid #fb8a00">
            <header class="card-header text-white" style="background-color: #fb8a00; border-radius: 0px;"> Orders /
                Tracking </header>
            <div class="card-body">
                <h6>Order ID: #<?php echo $row['order_id']; ?> </h6>
                <article class="card">
                    <div class="card-body row">

                        <div class="col"> <strong>Shipping TO:</strong>
                            <br><?php echo $row['shipping_address']; ?>
                        </div>
                        <div class="col"> <strong>Billing TO:</strong>
                            <br><?php echo $row['billing_address']; ?>
                        </div>
                        <div class="col"> <strong>Current Status:</strong>
                            <br>
                            <?php if($row['order_status'] == 1){
                                echo 'Order confirmed';
                            }else if($row['order_status'] == 2){
                                echo 'Prepare Order';
                            } else if($row['order_status'] == 3){
                                echo 'Shipped Order';
                            } else if($row['order_status'] == 4){
                                echo 'Deliverd';
                            } else if($row['order_status'] == 5){
                                echo 'Canceled';
                            } ?>
                        </div>
                        <div class="col"> <strong>Tracking #:</strong> <br>
                            <?php if($row['tracking'] != 'Pending'){ echo $row['tracking']; }else{echo "Pending";}?>
                        </div>
                        <div class="col"> <strong>Order Purchase Date:</strong>
                            <br><?php echo $row['date_updated']; ?>
                        </div>
                    </div>
                </article>
                <?php if($row['order_status'] != 5) {?>
                <div class="track">

                    <div
                        class="step <?php if($row['order_status'] == 1 || $row['order_status'] == 2 || $row['order_status'] == 3 || $row['order_status'] == 4) {echo 'active';}?>">
                        <span class="icon"> <i class="fa fa-check"></i> </span>
                        <span class="text">Order confirmed</span>
                    </div>
                    <div
                        class="step <?php if($row['order_status'] == 2 || $row['order_status'] == 3 || $row['order_status'] == 4) {echo 'active';}?>">
                        <span class="icon"> <i class="fa fa-user"></i> </span>
                        <span class="text">Prepare Order</span>
                    </div>
                    <div
                        class="step <?php if($row['order_status'] == 3 || $row['order_status'] == 4) {echo 'active';}?>">
                        <span class="icon"> <i class="fa fa-truck"></i> </span>
                        <span class="text"> Shipped Order </span>
                    </div>
                    <div class="step <?php if($row['order_status'] == 4) {echo 'active';}?>">
                        <span class="icon"> <i class="fa fa-box"></i> </span>
                        <span class="text">Deliverd</span>
                    </div>
                </div>
                <?php } ?>
                <hr>
                <ul class="row">
                    <?php 
        $getdetails = getAllOrderItemsBYOrder($row['order_id']);

        while($row2=mysqli_fetch_assoc($getdetails)){
            
            $img = $row2['product_image'];
            $img_src = "server/uploads/products/".$img;?>
                    <li class="col-md-4">
                        <figure class="itemside mb-3">
                            <div class="aside"><img src="<?php echo $img_src; ?>" class="img-sm border">
                            </div>
                            <figcaption class="info align-self-center">
                                <p class="title"><?php echo $row2['product_name']; ?> <br>
                                    <span class="text-muted">Rs.
                                    <?php echo $row2['product_price']; ?> </span>
                            </figcaption>
                        </figure>
                    </li>
                    <?php } ?>
                </ul>
                <hr>
                <div class="row">

                    <?php if ($row['order_status'] != "5") { ?>
                    <div class="col-md-3">
                        <select
                            onchange='updateDataFromHome(this, "<?php echo $order_id; ?>","order_status", "product_orders", "order_id")'
                            id="order_status <?php echo $order_id; ?>" class='form-control w-50'
                            name="order_status" type='text'>
                            <option value="5" <?php if ($row['order_status']=="5") echo "selected"; ?>>
                                Canceled
                            </option>
                        </select>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </article>
        <?php } ?>

        </div>
    </section>
    <!--================Contact Area =================-->

    <!-- start footer Area -->
    <?php include 'pages/footer.php'; ?>
    <!-- End footer Area -->
    <style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    body {
        background-color: #eeeeee;
        font-family: 'Open Sans', serif
    }


    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 0.10rem
    }

    .card-header:first-child {
        border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1)
    }

    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        background: #fb8a00
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .icon {
        background: #fb8a00;
        color: #fff
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }

    .itemside {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        width: 100%
    }

    .itemside .aside {
        position: relative;
        -ms-flex-negative: 0;
        flex-shrink: 0
    }

    .img-sm {
        width: 80px;
        height: 80px;
        padding: 7px
    }

    ul.row,
    ul.row-sm {
        list-style: none;
        padding: 0
    }

    .itemside .info {
        padding-left: 15px;
        padding-right: 7px
    }

    .itemside .title {
        display: block;
        margin-bottom: 5px;
        color: #212529
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem
    }

    .btn-warning {
        color: #ffffff;
        background-color: #fb8a00;
        border-color: #fb8a00;
        border-radius: 1px
    }

    .btn-warning:hover {
        color: #ffffff;
        background-color: #ff2b00;
        border-color: #ff2b00;
        border-radius: 1px
    }
    </style>
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