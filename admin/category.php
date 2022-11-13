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
                    <a href="index.php" class="nav-item nav-link "><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Categories</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Main Category</a>
                        </div>
                    </div> -->
                    <a href="customer.php" class="nav-item nav-link"><i class="fas fa-users me-2"></i>Customer</a>
                    <a href="category.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Category</a>
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
                                <li class="breadcrumb-item active" aria-current="page">Category List</li>
                            </ol>
                        </nav>
                        <h3 class="mb-4">Category List</h3>
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CategoryModal"> Add
                            New</button>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Cat ID</th>
                                        <th>Category Name</th>
                                        <th>Sub Category</th>
                                        <th>Image</th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Cat ID</th>
                                        <th>Category Name</th>
                                        <th>Sub Category</th>
                                        <th>Image</th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                            $getall = getAllCategory();

                            while($row=mysqli_fetch_assoc($getall)){

                                $cat_id = $row['cat_id'];
                                $img = $row['cat_image'];
                                $img_src = "../server/uploads/category/".$img;?>
                                    <tr>
                                        <td>#<?php echo $row['cat_id']; ?></td>
                                        <td>
                                            <div class="form-group">
                                                <input id="cat_name  <?php echo $cat_id; ?>" type="text" name="cat_name"
                                                    onchange="updateData(this, '<?php echo $cat_id; ?>', 'cat_name', 'category', 'cat_id');"
                                                    value="<?php echo $row['cat_name']; ?>"
                                                    data-parsley-trigger="change" required=""
                                                    placeholder="Enter Category Name" autocomplete="off"
                                                    class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <select
                                                onchange='updateSubCatData(this, "<?php echo $cat_id; ?>","sub_category", "category", "cat_id")'
                                                id="sub_category <?php echo $cat_id; ?>" class='form-control norad tx12 
                                                <?php if($row['sub_category'] == 0) {?>
                                                bg-dark text-white
                                                <?php } ?>
                                                '
                                                name="sub_category" type='text'>
                                                <?php if($row['sub_category'] == 0 ){?>
                                                <option value="0" selected>... This is Main Category ...</option>
                                                <?php  }else{ ?>
                                                <option value="0">... This is Main Category ...</option>
                                                <?php }
                                        $getallCat = getAllParentCategoryWithoutMe($cat_id);
                                        while($row2=mysqli_fetch_assoc($getallCat)){  ?>
                                                <option value="<?php echo $row2['cat_id']; ?>"
                                                    <?php if ($row['sub_category']== $row2['cat_id']) echo "selected"; ?>>
                                                    <?php echo $row2['cat_name']; ?></option>
                                                <?php  } ?>
                                            </select>
                                        </td>

                                        <td>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

                                            <img id="images<?php echo $cat_id; ?>" onclick="upImage(<?php echo $cat_id; ?>)" width="200px" src='<?php echo $img_src; ?>'>
                                            <form class="w-10"   enctype="multipart/form-data" method="POST">
                                                <div class="mb-3">
                                                    <input class="form-control" value="<?php echo $row['cat_id'] ?>"
                                                        name="id" type="hidden" id="id">
                                                    <input class="form-control" value="cat_id" name="id_fild"
                                                        type="hidden" id="id_fild">
                                                    <input class="form-control" value="category" name="table"
                                                        type="hidden" id="table">
                                                    <input class="form-control" value="cat_image" name="field"
                                                        type="hidden" id="field">
                                                    <input style="display: none;"  onchange="uploadImage(this.form);" class="form-control"
                                                        name="file" type="file" id="formFile<?php echo $cat_id; ?>">
                                                </div>
                                            </form>

                                        </td>
                                        <td><button type="button"
                                                onclick="deleteDataCategory(<?php echo $row['cat_id']; ?>,'category', 'cat_id')"
                                                class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i>
                                            </button></td>
                                    </tr>

                                    <?php } ?>

                                </tbody>
                            </table>
                </div>

            </div>
        </div>
        <!-- Sales Chart End -->




<!-- Modal -->
<div class="modal fade" id="CategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLabel">Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-white">
                <form method="POST" accept="php_parts/addCat.php" class="row g-3 needs-validation" novalidate
                    enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label for="cat_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="cat_name"
                            placeholder="Category Name" required>
                    </div>
                    <div class="col-md-12">
                        <label for="sub_category" class="form-label">Sub Category</label>
                        <select class="form-select" name="sub_category" id="sub_category"
                            aria-label="Default select example">
                            <option value="0" selected>... Make Main Category ...</option>
                            <?php $getall = getAllCategory();
                                    while($row=mysqli_fetch_assoc($getall)){ ?>
                            <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="file" class="form-label">Category Image file</label>
                        <input class="form-control" name="file" type="file" id="file">
                    </div>
            </div>
            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="addCategory(this.form)" name="submit" class="btn btn-primary">Save
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