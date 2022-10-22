<?php
include 'include/connection.php';

include 'include/view.php';
include 'include/add.php';
include 'include/update.php';
include 'include/common.php';
include 'include/delete.php';

if (isset($_GET['function_code']) && $_GET['function_code'] == 'addCategory') {

    $img = $_FILES['file']['name'];
    $target_dir = "uploads/category/";
    $target_file = $target_dir . basename($img);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif", "jfif", "svg", "webp");

    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $img);
        addCategory($_POST, $img);
    }

}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'deleteData') {
    deleteDataTables($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addColor') {
    createColor($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addSize') {
    createSize($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'permanantDeleteData') {
    permanantDeleteDataTable($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'increaseQty') {
    increaseQtyProduct($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addServe') {
    addServes($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'login') {
    echo getLoginAdmin($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'updateData') {
    updateDataTable($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'updateSubCatData') {
    updateSubCatData($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'imageUploadCategory') {

    $folder = $_POST['folder'];
    $img = $_FILES['file']['name'];
    $target_dir = "uploads/category/";
    $target_file = $target_dir . basename($img);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif", "jfif", "svg", "webp");

    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $img);
        editImages($_POST, $img);
    }

}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'imageUploadProducts') {

    $folder = $_POST['folder'];
    $img = $_FILES['file']['name'];
    $target_dir = "uploads/products/";
    $target_file = $target_dir . basename($img);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif", "jfif", "svg", "webp");

    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $img);
        editImages($_POST, $img);
    }

}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addProducts') {

    $img = $_FILES['file']['name'];
    $target_dir = "uploads/products/";
    $target_file = $target_dir . basename($img);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif", "jfif", "svg", "webp");
    
    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $img);
        addProduct($_POST, $img);
    }
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'changesettings') {
    changePageSettings($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'SettingImage') {

    $img = $_FILES['file']['name'];
    $target_dir = "uploads/settings/";
    $target_file = $target_dir . basename($img);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif", "jfif", "svg", "webp");

    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $img);
        editSettingImage($_POST, $img);
    }

}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'checkPasswordByEmail') {
    checkcustomerPasswordByName($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addcontact') {
    addMessage($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addReview') {
    addReviews($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addResevation') {
    addResevation($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'addCustomer') {
    createCustomer($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'editQty') {
    editQtyinCart($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'placeOrder') {
    placeOrders($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'checkEmail') {
    checkUserEmail($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'checkPassword') {
    checkuserPassword($_POST);
}
else if (isset($_GET['function_code']) && $_GET['function_code'] == 'insertImageUpload') {

    $img = $_FILES['file']['name'];
    $target_dir = "uploads/gallery/";
    $target_file = $target_dir . basename($img);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $extensions_arr = array("jpg", "jpeg", "png", "gif", "jfif", "svg", "webp");

    if (in_array($imageFileType, $extensions_arr)) {
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $img);
        insertImagetoGallery($img);
    }

}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'checkoutOrder') {
    checkoutOrder($_POST);
}else if (isset($_GET['function_code']) && $_GET['function_code'] == 'changeDescription') {
    changeDesc($_POST);
}
?>