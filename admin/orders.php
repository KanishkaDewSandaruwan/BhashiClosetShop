<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <?php include 'pages/head.php'; ?>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/Logo 500.500.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <?php include 'pages/sprin.php'; ?>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"></i>Bhashi’s Closet</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link "><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Categories</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Main Category</a>
                        </div>
                    </div> -->
                    <a href="customer.php" class="nav-item nav-link"><i class="fas fa-users me-2"></i>Customer</a>
                    <a href="category.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Category</a>
                    <a href="products.php" class="nav-item nav-link"><i class="fa fa-file me-2"></i>Products</a>
                    <a href="orders.php" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Orders</a>
                    <a href="gallery.php" class="nav-item nav-link"><i class="fas fa-images me-2"></i>Gallery</a>
                    <a href="message.php" class="nav-item nav-link "><i class="fas fa-envelope me-2"></i>Messages</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php include 'pages/navbar.php'; ?>
            <!-- Navbar End -->

            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 mt-5">
                    <div class="row">
                        <div class="col-lg-10">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Orders List</li>
                                </ol>
                            </nav>
                            <h3 class="mb-4">Orders List</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                    <?php 
                            $getall = getAllOrders();

                            while($row=mysqli_fetch_assoc($getall)){ 
                                $order_id = $row['order_id'];
                                ?>
                            <article class="card mt-5" style="border: 2px solid #fff">
                                <header class="card-header text-white bg-primary"> Orders /
                                    Tracking | #<?php echo $row['order_id']; ?></header>
                                <div class="card-body">
                                    <div class="row mt-3">

                                        <div class="col-md-3">
                                            <label for="order_status" class="form-label">Order Current State
                                                Change</label>
                                            <select
                                                onchange='updateData(this, "<?php echo $order_id; ?>","order_status", "product_orders", "order_id")'
                                                id="order_status <?php echo $order_id; ?>"
                                                class='form-control norad tx12' name="order_status" type='text'>
                                                <option value="1"
                                                    <?php if ($row['order_status']=="1") echo "selected"; ?>>
                                                    Order confirmed
                                                </option>
                                                <option value="2"
                                                    <?php if ($row['order_status']=="2") echo "selected"; ?>>
                                                    Prepare Order
                                                </option>
                                                <option value="3"
                                                    <?php if ($row['order_status']=="3") echo "selected"; ?>>
                                                    Shipped Order
                                                </option>
                                                <option value="4"
                                                    <?php if ($row['order_status']=="4") echo "selected"; ?>>
                                                    Deliverd
                                                </option>
                                                <option value="5"
                                                    <?php if ($row['order_status']=="5") echo "selected"; ?>>
                                                    Canceled
                                                </option>
                                            </select>
                                        </div>
                                        <?php if ($row['order_status'] != "5") { ?>
                                        <div class="col-md-3">

                                            <label for="tracking" class="form-label">Tracking Number</label>
                                            <input type="text"
                                                onchange='updateData(this, "<?php echo $order_id; ?>","tracking", "product_orders", "order_id")'
                                                class="form-control" name="tracking"
                                                value="<?php echo $row['tracking'] ?>"
                                                id="tracking<?php echo $row['order_id'] ?>">

                                        </div>
                                        <?php } ?>
                                    </div>
                                    <article class="card mt-5">
                                        <div class="card-body row">

                                            <div class="col"> <strong>Shipping To:</strong>
                                                <br><?php echo $row['shipping_address']; ?>
                                            </div>
                                            <div class="col"> <strong>Billing To:</strong>
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
                                    $img_src = "../server/uploads/products/".$img;?>
                                        <li class="col-md-4">
                                            <figure class="itemside mb-3">
                                                <div class="aside"><img src="<?php echo $img_src; ?>"
                                                        class="img-sm border">
                                                </div>
                                                <figcaption class="info align-self-center">
                                                    <p class="title"><?php echo $row2['product_name']; ?> <br>
                                                       <span
                                                        class="text-muted">Rs.
                                                        <?php echo $row2['product_price']; ?> </span>
                                                </figcaption>
                                            </figure>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <hr>

                                </div>
                            </article>
                            <?php } ?>
                    </div>

                </div>
            </div>
            <!-- Sales Chart End -->



<style>
    
@import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

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
    background: #009CFF 
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
    background: #009CFF ;
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
</style>



            <?php include 'pages/footer.php'; ?>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/chart/chart.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
</body>

</html>