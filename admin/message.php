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
                    <a href="category.php" class="nav-item nav-link "><i class="fa fa-th me-2"></i>Category</a>
                    <a href="products.php" class="nav-item nav-link"><i class="fa fa-file me-2"></i>Products</a>
                    <a href="orders.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Orders</a>
                    <a href="gallery.php" class="nav-item nav-link"><i class="fas fa-images me-2"></i>Gallery</a>
                    <a href="message.php" class="nav-item nav-link active"><i class="fas fa-envelope me-2"></i>Messages</a>
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
                                    <li class="breadcrumb-item active" aria-current="page">Message List</li>
                                </ol>
                            </nav>
                            <h3 class="mb-4">Message List</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                $getall = getAllMessages();

                                while($row=mysqli_fetch_assoc($getall)){ ?>
                                <tr>

                                    <td>#<?php echo $row['contact_id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['subject']; ?></td>
                                    <td><?php echo $row['message']; ?></td>
                                    <td><?php echo $row['date_updated']; ?></td>
                                    <td>

                                        <button type="button"
                                            onclick="permenantdeleteData(<?php echo $row['contact_id']; ?>, 'contact', 'contact_id' )"
                                            class="btn btn-darkblue"> <i class="fa-solid fa-trash"></i> </button>
                                    </td>
                                </tr>

                                <?php } ?>

                            </tbody>
                        </table>
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