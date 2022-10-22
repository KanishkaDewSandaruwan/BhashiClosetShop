addCategory = (form) => {
    let fd = new FormData(form);

    if (fd.get('category_name').trim() != '') {
        if (fd.get("file") != '') {

            $.ajax({
                method: "POST",
                url: API_PATH + "addCategory",
                data: fd,
                success: function ($data) {
                    console.log($data);

                    if ($data > 0) {
                        errorMessage("This Category Already Registerd!");
                    } else {
                        successToast();

                    }
                },
                cache: false,
                contentType: false,
                processData: false,
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
        } else { errorMessage("Please SelectImage"); }
    } else { errorMessage("Please Enter Category Name"); }
}

addItems = (form) => {
    let fd = new FormData(form);

    if (fd.get("product_name")) {
        if (fd.get("file")) {

            $.ajax({
                method: "POST",
                url: API_PATH +  "addProducts",
                data: fd,
                success: function ($data) {
                    console.log($data);
                    if ($data > 0) {
                        normalAlertNoReload("error", "This Product is Alrady Here..");
                    } else {
                        loading("Product Saving Success..")
                    }
                },
                cache: false,
                contentType: false,
                processData: false,
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
        } else { errorMessage("Please SelectImage"); }
    } else { errorMessage("Please Enter Product Name"); }
}

addCustomer = (form) => {
    let fd = new FormData(form);

    if (fd.get('name').trim() != '') {
        if (fd.get('email').trim() != '') {
            if (fd.get('phone').trim() != '') {
                if (fd.get('nic').trim() != '') {
                    if (fd.get('address').trim() != '') {
                        if (fd.get('password').trim() != '') {
                            if (fd.get('conf_password').trim() != '') {
                                if (fd.get('password') == fd.get('conf_password')) {
                                    if (emailvalidation(fd.get('email'))) {
                                        if (phonenumber(fd.get('phone'))) {

                                            $.ajax({
                                                method: "POST",
                                                url: API_PATH + "addCustomer",
                                                data: fd,
                                                success: function ($data) {
                                                    console.log($data);

                                                    if ($data > 0) {
                                                        errorMessage("This Customer Already Registerd!");
                                                    } else {
                                                        successToastRedirect('signin.php');
                                                    }
                                                },
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                error: function (error) {
                                                    console.log(`Error ${error}`);
                                                }
                                            });

                                        }
                                    }
                                } else { errorMessage("Password is Not Match"); }
                            } else { errorMessage("Please Confirm Password"); }
                        } else { errorMessage("Please Enter Password"); }
                    } else { errorMessage("Please Enter Address"); }
                } else { errorMessage("Please Enter NIC"); }
            } else { errorMessage("Please Enter Phone number"); }
        } else { errorMessage("Please Enter Email"); }
    } else { errorMessage("Please Enter Full Name"); }
}