<?php include '../server/api.php'; ?>
<?php include 'admin.php'; ?>
<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <form class="d-none d-md-flex ms-4">
        <input class="form-control border-0" type="search" placeholder="Search">
    </form>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-envelope me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Message</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="ms-2">
                            <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                            <small>15 minutes ago</small>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="ms-2">
                            <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                            <small>15 minutes ago</small>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="ms-2">
                            <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                            <small>15 minutes ago</small>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item text-center">See all message</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Notificatin</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <?php 
                    $getall = getAllOrdersPending();

                    while($row=mysqli_fetch_assoc($getall)){ 
                        $order_id = $row['order_id'];
                        ?>
                <a href="orders.php" class="dropdown-item mt-1">
                    <h6 class="fw-normal mb-0">#<?php echo $row['order_id']; ?> | <?php echo $row['date_updated']; ?> </h6>
                    <small><?php echo $row['name']; ?></small>
                </a>
                <?php } ?>

                <hr class="dropdown-divider">
                <a href="orders.php" class="dropdown-item text-center">See all Orders</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <i class="fa fa-users me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Admin</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="#" data-bs-toggle="modal" data-bs-target="#ChangePassword" class="dropdown-item"> <i class="fa fa-lock me-lg-2"></i> Change
                    Password</a>
                <a href="settings.php" class="dropdown-item"> <i class="fa fa-cog me-lg-2"></i> Settings</a>
                <a href="logout.php" class="dropdown-item"> <i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
            </div>
        </div>
    </div>
</nav>