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
                    <a href="orders.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Orders</a>
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
                                    <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                </ol>
                            </nav>
                            <h3 class="mb-4">Settings</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <div class="col-12">
                                <div class=" rounded h-100 p-4">

                                    <div class="row">
                                        <?php 
                                    $setting = getAllSettings();
                                    if($res = mysqli_fetch_assoc($setting)){ ?>

                                        <div class="row">
                                            <div class="col-md-2 mt-3">
                                                <h6>Shipping Fee : </h6>
                                            </div>
                                            <div class="col-md-2 mt-3">
                                                <input type="text" onchange='settingsUpdate(this, "shpping_fee")'
                                                    value="<?php echo $res['shpping_fee']; ?>" class="form-control"
                                                    name="shpping_fee" id="shpping_fee" placeholder="Shipping Fee"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-2">
                                                <h6>Shop Status : </h6>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input"
                                                            id="cart_button  <?php echo $cat_id; ?>" name="cart_button"
                                                            value="<?php if ($res['shop_status']== 1){ echo "0";}else{ echo "1";} ?>"
                                                            onchange='settingsUpdate(this, "shop_status")'
                                                            type="checkbox"
                                                            <?php if ($res['shop_status']== 0) echo "checked"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <?php } ?>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12 col-xl-12">
                                            <div class=" rounded h-100 p-4">



                                                <div class="tab-pane fade show" id="nav-home" role="tabpanel"
                                                    aria-labelledby="nav-home-tab">
                                                    <h6>HEADER INFORMATION</h6>
                                                    <hr>
                                                    <?php
                                                    $setting = getAllSettings();
                                                    if($res = mysqli_fetch_assoc($setting)){
                                                        
                                                        $img = $res['header_image'];
                                                        $img_src = "../server/uploads/settings/".$img;

                                                    ?>


                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">Header
                                                            Title</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "header_title")'
                                                            value="<?php echo $res['header_title']; ?>"
                                                            class="form-control" name="category_name"
                                                            id="validationCustom01" placeholder="Header Title" required>
                                                    </div>

                                                    <div class="col-md-12 mt-3">
                                                        <label for="product_desc" class="form-label">Header
                                                            Description</label>
                                                        <textarea onchange='settingsUpdate(this, "header_desc")'
                                                            class="form-control" id="header_desc" required
                                                            rows="3"><?php echo $res['header_desc']; ?></textarea>
                                                    </div>
                                                    <form class="mt-3" method="POST" enctype="multipart/form-data">
                                                        <div class="mb-3">
                                                            <input type="hidden" name="field" id="field"
                                                                value="header_image">
                                                            <label for="formFile" class="form-label">Header Image
                                                                file</label>
                                                            <input class="form-control"
                                                                onchange="uploadSettingImage(this.form);" name="file"
                                                                type="file" id="formFile">
                                                        </div>

                                                    </form>
                                                    <img class="mt-2" width="200px" src='<?php echo $img_src; ?>'>



                                                    <?php } ?>



                                                    <h6 style="margin-top: 100px;">ABOUT SETTINGS</h6>
                                                    <hr>
                                                    <?php
                                                        $setting = getAllSettings();
                                                        if($res = mysqli_fetch_assoc($setting)){ 
                                                            
                                                            $img = $res['about_image'];
                                                        $img_src = "../server/uploads/settings/".$img;?>

                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">About
                                                            title</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "about_title")'
                                                            value="<?php echo $res['about_title']; ?>"
                                                            class="form-control" id="about_title"
                                                            placeholder="About title" required>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">About
                                                            Description</label>
                                                        <input type="text" onchange='settingsUpdate(this, "about_desc")'
                                                            value="<?php echo $res['about_desc']; ?>"
                                                            class="form-control" id="about_desc"
                                                            placeholder="Company Email Address" required>
                                                    </div>
                                                    <form class="mt-3" method="POST" enctype="multipart/form-data">
                                                        <div class="mb-3">
                                                            <input type="hidden" name="field" id="field"
                                                                value="about_image">
                                                            <label for="formFile" class="form-label">About Image
                                                                file</label>
                                                            <input class="form-control"
                                                                onchange="uploadSettingImage(this.form);" name="file"
                                                                type="file" id="formFile">
                                                        </div>

                                                    </form>
                                                    <img class="mt-2" width="200px" src='<?php echo $img_src; ?>'>



                                                    <?php } ?>





                                                    <h6 style="margin-top: 100px;">CONTACT SETTINGS</h6>
                                                    <hr>
                                                    <?php
                                                        $setting = getAllSettings();
                                                        if($res = mysqli_fetch_assoc($setting)){ ?>

                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">Company Phone
                                                            Number</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "company_phone")'
                                                            value="<?php echo $res['company_phone']; ?>"
                                                            class="form-control" id="company_phone"
                                                            placeholder="Company Phone Number" required>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">Company Email
                                                            Address</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "company_email")'
                                                            value="<?php echo $res['company_email']; ?>"
                                                            class="form-control" id="company_email"
                                                            placeholder="Company Email Address" required>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">Company
                                                            Address</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "company_address")'
                                                            value="<?php echo $res['company_address']; ?>"
                                                            class="form-control" id="company_address"
                                                            placeholder="Company Address" required>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">Facebook
                                                            Link</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "link_facebook")'
                                                            value="<?php echo $res['link_facebook']; ?>"
                                                            class="form-control" id="link_facebook"
                                                            placeholder="Facebook Link" required>
                                                        <a
                                                            href="<?php echo $res['link_facebook']; ?>"><?php echo $res['link_facebook']; ?></a>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">Twitter
                                                            Link</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "link_twiiter")'
                                                            value="<?php echo $res['link_twiiter']; ?>"
                                                            class="form-control" id="link_twiiter"
                                                            placeholder="Twitter Link" required>
                                                        <a
                                                            href="<?php echo $res['link_twiiter']; ?>"><?php echo $res['link_twiiter']; ?></a>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label for="validationCustom01" class="form-label">Instragram
                                                            Link</label>
                                                        <input type="text"
                                                            onchange='settingsUpdate(this, "link_instragram")'
                                                            value="<?php echo $res['link_instragram']; ?>"
                                                            class="form-control" id="link_instragram"
                                                            placeholder="Instragram Link" required>
                                                        <a
                                                            href="<?php echo $res['link_instragram']; ?>"><?php echo $res['link_instragram']; ?></a>
                                                    </div>

                                                    <?php } ?>




                                                </div>

                                            </div>


                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <!-- Sales Chart End -->





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