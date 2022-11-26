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
                                    <li class="breadcrumb-item active" aria-current="page">Products List</li>
                                </ol>
                            </nav>
                            <h3 class="mb-4">Products List</h3>
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ProductModal">
                                Add
                                New</button>
                        </div>

                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="text-primary">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Date Updated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $getall = getAllItems();
                                while ($row = mysqli_fetch_assoc($getall)) {
                                    $pid = $row['pid'];
                                    $img = $row['product_image'];
                                    $img_src = "../server/uploads/products/" . $img; ?>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input id="product_name  <?php echo $pid; ?>" type="text"
                                                name="product_name"
                                                onchange="updateData(this, '<?php echo $pid; ?>', 'product_name', 'products', 'pid');"
                                                value="<?php echo $row['product_name']; ?>"
                                                data-parsley-trigger="change" required=""
                                                placeholder="Enter Product Name" autocomplete="off"
                                                class="form-control">
                                        </div>
                                        <h5 class="mt-2 text-primary"> <?php echo $row['product_name']; ?></h5>
                                        <br>

                                    </td>
                                    <td>
                                        <?php echo $row['product_description']; ?>
                                    </td>
                                    <td>
                                        <img onclick="upImage(<?php echo $pid; ?>)" width="200px"
                                            src='<?php echo $img_src; ?>'>
                                        <form enctype="multipart/form-data" method="POST">
                                            <div class="mb-3">
                                                <input class="form-control" value="<?php echo $row['pid'] ?>" name="id"
                                                    type="hidden" id="id">
                                                <input class="form-control" value="pid" name="id_fild" type="hidden"
                                                    id="id_fild">
                                                <input class="form-control" value="products" name="table" type="hidden"
                                                    id="table">
                                                <input class="form-control" value="product_image" name="field"
                                                    type="hidden" id="field">
                                                <input onchange="uploadImageProducts(this.form);" class="form-control"
                                                    style="display: none;" name="file" type="file"
                                                    id="formFile<?php echo $pid; ?>">
                                            </div>
                                        </form>

                                    </td>
                                    <td>
                                        <?php echo $row['date_updated']; ?>
                                    </td>
                                    <td>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <h6 class="mt-2">Price </h6>
                                            </div>
                                            <div class="col-md-12 col-xl-9">
                                                <input type="number" class="form-control"
                                                    onchange="updateData(this, '<?php echo $pid; ?>', 'product_price', 'products', 'pid');"
                                                    name="product_price" id="product_price <?php echo $pid; ?>"
                                                    value="<?php echo $row['product_price']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <h6 class="mt-2">Category </h6>
                                            </div>
                                            <div class="col-md-12 col-xl-9">
                                                <select
                                                    onchange='updateData(this, "<?php echo $pid; ?>","cat_id", "products", "pid")'
                                                    id="cat_id <?php echo $pid; ?>" class='form-control norad tx12'
                                                    name="cat_id" type='text'>
                                                    <?php 
                                        $getallCat = getAllSubcat();
                                        while($row2=mysqli_fetch_assoc($getallCat)){ ?>

                                                    <option value="<?php echo $row2['cat_id']; ?>"
                                                        <?php if ($row['cat_id']== $row2['cat_id']) echo "selected"; ?>>
                                                        <?php echo $row2['cat_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <h6 class="mt-2">Qultity </h6>
                                            </div>
                                            <div class="col-md-12 col-xl-9">
                                                <input type="number" class="form-control"
                                                    onchange="updateData(this, '<?php echo $pid; ?>', 'product_qty', 'products', 'pid');"
                                                    name="product_qty" id="product_qty <?php echo $pid; ?>"
                                                    value="<?php echo $row['product_qty']; ?>">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <h6 class="mt-2">Active </h6>
                                            </div>
                                            <div class="col-md-12 col-xl-9">
                                                <select
                                                    onchange="updateData(this, '<?php echo $pid; ?>', 'product_active', 'products', 'pid');"
                                                    id="product_active <?php echo $pid; ?>"
                                                    class='form-control norad tx12' name="product_active" type='text'>
                                                    <option value="1"
                                                        <?php if ($row['product_active'] == "1" ) echo "selected" ; ?>>
                                                        Active
                                                    </option>
                                                    <option value="0"
                                                        <?php if ($row['product_active'] == "0" ) echo "selected" ; ?>>
                                                        Deactive
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>





                                    </td>

                                    <td>

                                        <a href="prodcuts_edit.php?pid=<?php echo $row['pid']; ?>"
                                            class="btn btn-darkblue">
                                            <i class="fa-solid fa-pen-to-square"></i> </a>
                                        <?php if ($row['product_active']=="0"): ?>
                                        <button type="button"
                                            onclick="deleteData(<?php echo $row['pid']; ?>,'products', 'pid')"
                                            class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <?php endif ?>

                                    </td>
                                    <?php } ?>

                            </tbody>


                        </table>
                    </div>

                </div>
            </div>
            <!-- Sales Chart End -->




            <!-- Modal -->
            <div class="modal fade" id="ProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-primary">
                        <div class="modal-header">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Products</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post" id="basicform" data-parsley-validate=""
                            enctype="multipart/form-data">
                            <div class="modal-body bg-white">
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input id="product_name" type="text" name="product_name"
                                        data-parsley-trigger="change" required="" placeholder="Enter Product Name"
                                        autocomplete="off" class="form-control">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="product_description">Product Description</label>
                                    <input id="product_description" type="text" name="product_description"
                                        data-parsley-trigger="change" required=""
                                        placeholder="Enter Product Description" autocomplete="off" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="product_price">Price</label>
                                    <input id="product_price" type="number" name="product_price"
                                        data-parsley-trigger="change" required="" placeholder="Enter Product Price"
                                        autocomplete="off" class="form-control">
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="cat_id" class="form-label">Category</label>
                                    <select class="form-select" name="cat_id" id="cat_id"
                                        aria-label="Default select example">
                                        <?php $getall = getAllSubcat();
                                while($row=mysqli_fetch_assoc($getall)){ ?>
                                        <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?>
                                        </option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="product_qty">Qty</label>
                                    <input id="product_qty" type="number" name="product_qty"
                                        data-parsley-trigger="change" required="" placeholder="Enter Qty"
                                        autocomplete="off" class="form-control">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="inputPassword">Active</label>
                                    <select class="form-select" name="product_active" id="product_active"
                                        aria-label="Default select example">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="formFile" class="form-label">Product Image</label>
                                    <input class="form-control" required name="file" type="file" id="file">
                                </div>

                            </div>
                            <div class="modal-footer bg-white">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                <button type="button" onclick="addItems(this.form)" name="submit"
                                    class="btn btn-primary">Save
                                    changes</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

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