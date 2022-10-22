    <!-- Footer Start -->
    <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="index.php">Bhashi’s Closet</a>, All Right Reserved. <script>
                            document.write(new Date().getFullYear());
                        </script> 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

        <div class="modal fade" id="ChangePassword" tabindex="-1" aria-labelledby="ChangePasswordLabel" aria-hidden="true">
         <div class="modal-dialog ">
             <div class="modal-content">
                 <div class="modal-header bg-primary">
                     <h5 class="modal-title text-white" id="ChangePasswordLabel">Change Password</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body bg-white ">
                     <form method="POST" class="row g-3 needs-validation " novalidate enctype="multipart/form-data">
                         <div class="col-md-12">
                             <label for="current_password" class="form-label">Current Password Name</label>
                             <input type="password" class="form-control" name="current_password" id="current_password"
                                 placeholder="Current Password Name" required>
                         </div>

                         <div class="col-md-12">
                             <label for="new_password" class="form-label">New Password</label>
                             <input type="password" class="form-control" name="new_password" id="new_password"
                                 placeholder="New Password" required>
                         </div>

                         <div class="col-md-12">
                             <label for="confirm_new_password" class="form-label">Confirm New Password</label>
                             <input type="password" class="form-control" name="confirm_new_password"
                                 id="confirm_new_password" placeholder="Confirm New Password" required>
                         </div>

                         <div class="col-md-12">
                             <input type="hidden" class="form-control" name="email"
                                 value="<?php echo $_SESSION['admin']; ?>" id="email">
                         </div>


                 </div>
                 <div class="modal-footer bg-white">
                     <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                     <button type="button"  onclick="changePasswordAdmin(this.form)" class="btn btn-primary">Save
                         changes</button>
                 </div>
                 </form>
             </div>
         </div>
        
        <!-- toast -->
        <script src="plugin/iziToast-master/dist/js/iziToast.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="plugin/iziToast-master/dist/css/iziToast.min.css">
    <!-- endbuild -->

     <!-- Simple table -->
     <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

     <script src="https://kit.fontawesome.com/6e8b05f9c5.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    
    <script src="js/include/alerts.js"></script>
    <script src="js/include/validation.js"></script>
    <script src="js/include/homejs.js"></script>
    <script src="js/include/upload.js"></script>
    <script src="js/include/add.js"></script>
    <script src="js/include/delete.js"></script>

    <script src="js/admin.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>