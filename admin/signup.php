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
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-8">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <form action="" method="post">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="index.html" class="">
                                    <h3 class="text-primary">Bhashi???s Closet Shop</h3>
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingText" name="name"
                                            placeholder="jhondoe">
                                        <label for="floatingText">Full name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="gender" id="gender"
                                            aria-label="Default select example">
                                            <option value="1" selected>Male</option>
                                            <option value="0">Female</option>
                                        </select>
                                        <label for="floatingText">Gender</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingText" name="phone"
                                            placeholder="0753664078">
                                        <label for="floatingText">Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingText" name="nic"
                                            placeholder="862545789V">
                                        <label for="floatingText">NIC Number</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingText" name="address"
                                        placeholder="Address">
                                    <label for="floatingText">Address</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" name="email"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input type="password" class="form-control" name="conf_password"
                                            id="conf_password" placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <a href="">Forgot Password</a>
                            </div>
                            <button type="button" onclick="addCustomer(this.form)" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                            <p class="text-center mb-0">Already have an Account? <a href="signin.php">Sign In</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>
    <?php include 'pages/footer.php'; ?>
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