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
                            <li class="nav-item active"><a class="nav-link" href="profile.php">Profile</a></li>
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
            <div class="row">
                <div class="col-lg-7">
                    <div class="d-flex flex-column justify-content-center h-100 p-5" style="background-color: #fb8a00;">
                        <div class="d-inline-flex border border-secondary p-2 mb-4">
                            <h1 class="font-weight-normal text-secondary m-0 mr-3"></h1>
                            <div class="d-flex flex-column">
                                <h4>Full Name</h4>
                                <p class="m-0 text-white"><?php echo $row['name']; ?></p>
                            </div>
                        </div>
                        <div class="d-inline-flex border border-secondary p-2 mb-4">
                            <h1 class="font-weight-normal text-secondary m-0 mr-3"></h1>
                            <div class="d-flex flex-column">
                                <h4>Email</h4>
                                <p class="m-0 text-white"><?php echo $row['email']; ?></p>
                            </div>
                        </div>
                        <div class="d-inline-flex border border-secondary p-2 mb-4">
                            <h1 class="font-weight-normal text-secondary m-0 mr-3"></h1>
                            <div class="d-flex flex-column">
                                <h4>Phone Number</h4>
                                <p class="m-0 text-white"><?php echo $row['phone']; ?></p>
                            </div>
                        </div>
                        <div class="d-inline-flex border border-secondary p-2 mb-4">
                            <h1 class="font-weight-normal text-secondary m-0 mr-3"></h1>
                            <div class="d-flex flex-column">
                                <h4>Address</h4>
                                <p class="m-0 text-white"><?php echo $row['address']; ?></p>
                            </div>
                        </div>
                        <div class="d-inline-flex border border-secondary p-2 mb-4">
                            <h1 class="font-weight-normal text-secondary m-0 mr-3"></h1>
                            <div class="d-flex flex-column">
                                <h4>NIC</h4>
                                <p class="m-0 text-white"><?php echo $row['nic']; ?></p>
                            </div>
                        </div>
                        <div class="d-inline-flex border border-secondary p-2 mb-4">
                            <h1 class="font-weight-normal text-secondary m-0 mr-3"></h1>
                            <div class="d-flex flex-column">
                                <h4>Gender</h4>
                                <p class="m-0 text-white">
                                    <?php if ($row['gender']=="1") echo "Male"; else echo "Female"; ?></p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center experience">
                            <a class="btn btn-primary" id="change" href="change_email.php"><i
                                    class="fa fa-lock"></i>&nbsp;Change Email</a>
                            <a href="change_password.php" class="btn btn-primary text-white"><i
                                    class="fa fa-lock"></i>&nbsp;Change Password</a>
                            <button class="btn btn-primary"
                                onclick="deleteDataFromHome(<?php echo $row['customer_id']; ?>, 'customer', 'customer_id')"><i
                                    class="fa fa-trash"></i>&nbsp;Delete</button>
                        </div><br>


                    </div>
                </div>
                <div class="col-lg-4 mb-5 my-lg-4 py-5 pl-lg-1">
                    <div class="contact-form">
                        <div id="success"></div>
                        <div class="col-md-12 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Profile Settings</h4>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-12"><label class="labels">Name</label>
                                        <input type="text"
                                            onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","name", "customer", "customer_id")'
                                            class="form-control" id="name" placeholder="Your name"
                                            value="<?php echo $row['name']; ?>">
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Mobile Number</label>
                                        <input type="text"
                                            onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","phone", "customer", "customer_id")'
                                            class="form-control" id="phone" placeholder="enter phone number"
                                            value="<?php echo $row['phone']; ?>">
                                    </div>


                                    <div class="col-md-12 mt-3"><label class="labels">Address </label><input type="text"
                                            onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","address", "customer", "customer_id")'
                                            class="form-control" id="address" placeholder="enter address"
                                            value="<?php echo $row['address']; ?>"></div>

                                    <div class="col-md-12 mt-3"><label class="labels">NIC</label>
                                        <input type="text" disabled
                                            onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","nic", "customer", "customer_id")'
                                            id="nic" class="form-control" placeholder="Enter NIC"
                                            value="<?php echo $row['nic']; ?>">
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <label class="labels">Email ID</label>
                                        <input type="email"
                                            onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","email", "customer", "customer_id")'
                                            id="email" class="form-control" placeholder="Enter Email Address"
                                            value="<?php echo $row['email']; ?>">
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="labels">Gender</label>
                                        <select
                                            onchange='updateDataFromHome(this, "<?php echo $customer_id; ?>","gender", "customer", "customer_id")'
                                            id="gender <?php echo $customer_id; ?>" class='form-control w-100'
                                            name="gender" type='text'>
                                            <option value="1" <?php if ($row['gender']=="1") echo "selected"; ?>>
                                                Male</option>
                                            <option value="0" <?php if ($row['gender']=="0") echo "selected"; ?>>
                                                Female</option>
                                        </select>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--================Contact Area =================-->

    <!-- start footer Area -->
    <?php include 'pages/footer.php'; ?>
    <!-- End footer Area -->

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