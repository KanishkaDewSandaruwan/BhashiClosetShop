<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <?php include 'pages/head.php'; ?>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"></i>Bhashi’s Closet</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Categories</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Main Category</a>
                        </div>
                    </div> -->
                    <a href="customer.php" class="nav-item nav-link"><i class="fas fa-users me-2"></i>Customer</a>
                    <a href="category.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Category</a>
                    <a href="products.php" class="nav-item nav-link active"><i class="fa fa-file me-2"></i>Products</a>
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
                                    <li class="breadcrumb-item "><a href="products.php">Products</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Products Edit</li>
                                </ol>
                            </nav>
                            <h3 class="mb-4">Edit Products Items</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <?php 
                    if (isset($_REQUEST['pid'])) {
                        $getall = getAllItemsByID($_REQUEST['pid']);
                        $row = mysqli_fetch_assoc($getall);
                        $pid = $row['pid'];
                        $img = $row['product_image'];
                        $img_src = "../server/uploads/products/" . $img;
                            ?>
                        <form action="" method="post" id="basicform" class="col-md-6" data-parsley-validate=""
                            enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input id="product_name  <?php echo $pid; ?>" type="text" name="product_name"
                                    onchange="updateData(this, '<?php echo $pid; ?>', 'product_name', 'products', 'pid');"
                                    value="<?php echo $row['product_name']; ?>" data-parsley-trigger="change"
                                    required="" placeholder="Enter Product Name" autocomplete="off"
                                    class="form-control">
                            </div>

                            <div class="form-group mt-5">
                                <form enctype="multipart/form-data" method="POST">
                                    <div class="mb-3">
                                        <textarea id="product_description"
                                            name="product_description"><?php echo $row['product_description']; ?></textarea>
                                        <input class="form-control" value="<?php echo $row['pid'] ?>" name="id" type="hidden" id="id">
                                        <button type="button" onclick="changeDescription(this.form)"
                                            class="btn btn-primary">Update Description</button>
                                    </div>
                                </form>
                                <script>
                                $('#product_description').summernote({
                                    placeholder: 'Article Content',
                                    tabsize: 2,
                                    height: 120,
                                    toolbar: [
                                        ['style', ['style']],
                                        ['font', ['bold', 'underline', 'clear']],
                                        ['color', ['color']],
                                        ['para', ['ul', 'ol', 'paragraph']],
                                        ['view', ['fullscreen', 'codeview', 'help']]
                                    ]
                                });
                                </script>
                            </div>

                            <div class="form-group mt-3 mt-5">

                                <button type="button" class="btn btn-dark mr-5"
                                    onclick="window.location.href='products.php'">Back</button>

                            </div>
                        </form>
                        <?php } ?>
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