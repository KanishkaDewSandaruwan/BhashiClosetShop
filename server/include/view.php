<?php

if(session_id() == '') {
    session_start();
}

function getAllCategory()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM category WHERE is_deleted = '0' ";
    return mysqli_query($con, $viewcat);
}



function getAllSubcat()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM category WHERE is_deleted = '0' AND sub_category != '0' ";
    return mysqli_query($con, $viewcat);
}

function getAllProductItemsByCategory($cat_id)
{
    include 'connection.php';

    $viewcat = "SELECT * FROM products WHERE is_deleted = 0 AND product_active = 1 AND cat_id = '$cat_id' ORDER BY date_updated DESC";
    return mysqli_query($con, $viewcat);
}


function getAllParentCategory()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM category	 WHERE is_deleted = '0' AND sub_category = '0'";
    return mysqli_query($con, $viewcat);
}

function getAllParentCategoryWithoutMe($cat_id)
{
    include 'connection.php';

    $viewcat = "SELECT * FROM category	 WHERE is_deleted = '0' AND sub_category = '0' AND cat_id != '$cat_id'";
    return mysqli_query($con, $viewcat);
}


function getAllOrdersPending(){
	include 'connection.php';

	$viewcat = "SELECT * FROM product_orders join customer on customer.customer_id = product_orders.customer_id  WHERE product_orders.is_deleted = '0' AND product_orders.order_status = '1' ORDER BY date_updated DESC";
	return mysqli_query($con,$viewcat);
}

function getAllSubCategory($cat_id)
{
    include 'connection.php';

    $viewcat = "SELECT * FROM category WHERE is_deleted = '0' AND sub_category = '$cat_id'";
    return mysqli_query($con, $viewcat);
}

function AllSubCategory()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM category WHERE is_deleted = '0' AND sub_category != '0'";
    return mysqli_query($con, $viewcat);
}

function getAllItems()
{
	include 'connection.php';

	$viewcat = "SELECT * FROM products WHERE is_deleted = 0 ";
	return mysqli_query($con, $viewcat);
}

function getAllItemsLatest()
{
    include 'connection.php';

    $NewDate=Date('y:m:d', strtotime('-7 days'));

    $viewcat = "SELECT * FROM products WHERE is_deleted = 0 AND NOT(date_updated < '$NewDate'  OR date_updated >  now())  ORDER BY date_updated DESC";
    return mysqli_query($con, $viewcat);

}

function getAllItemsByParentCategory($cat_id)
{
	include 'connection.php';

	$viewcat = "SELECT * FROM products join category on products.cat_id = category.cat_id WHERE products.is_deleted = 0 AND products.product_active = 1 AND (products.cat_id = '$cat_id' OR category.sub_category='$cat_id') ";
	return mysqli_query($con, $viewcat);
}

function getAllItemsByCategory($cat_id)
{
	include 'connection.php';

	$viewcat = "SELECT * FROM products WHERE cat_id = '$cat_id'";
	return mysqli_query($con, $viewcat);
}


function getAllAvailableItems()
{
	include 'connection.php';

	$viewcat = "SELECT * FROM products WHERE is_deleted = 0 AND product_active = '1'";
	return mysqli_query($con, $viewcat);
}

function getItemsCondition($id, $field)
{
	include 'connection.php';

	$viewcat = "SELECT * FROM products WHERE is_deleted = 0 AND product_active = '1' AND $field = '$id'";
	return mysqli_query($con, $viewcat);
}

function getAllItemsSearch($key)
{
	include 'connection.php';

	$viewcat = "SELECT * FROM products WHERE is_deleted = 0 AND product_active = '1' AND product_name LIKE '%$key%' AND product_description LIKE '%$key%';";
	return mysqli_query($con, $viewcat);
}

function getAllItemsByID($pid)
{
	include 'connection.php';

	$viewcat = "SELECT * FROM products WHERE is_deleted = 0 AND pid = '$pid' ";
	return mysqli_query($con, $viewcat);
}

function getCountItemsByID($pid)
{
	include 'connection.php';

	$view = "SELECT * FROM products WHERE is_deleted = 0 AND pid = '$pid' ";
	return  mysqli_query($con, $view);
}

function checkProductByName($product_name)
{
	include 'connection.php';

	$product = "SELECT * FROM products WHERE product_name = '$product_name' AND is_deleted = 0";
	$result = mysqli_query($con, $product);
	return mysqli_num_rows($result);
}

function getAllCart($customer_id){
	include 'connection.php';

	$q1= "SELECT * FROM cart join products on products.pid = cart.pid join customer on customer.customer_id = cart.customer_id WHERE cart.customer_id = '$customer_id'";
	return mysqli_query($con,$q1);
}


//customer

function checkuserPassword($data){
	include 'connection.php';
	$customer_id = $data['customer_id'];
	$password = $data['password'];

	$viewcat = "SELECT * FROM customer WHERE is_deleted = 0 AND password = '$password' AND customer_id = '$customer_id' ";
	$result = mysqli_query($con,$viewcat);
	$count = mysqli_num_rows($result);
	echo $count;
}

function checkUserEmail($data){
	include 'connection.php';

	$customer_id = $data['customer_id'];
	$email = $data['email'];

	$viewcat = "SELECT * FROM customer WHERE is_deleted = 0 AND email = '$email' AND customer_id = '$customer_id' ";
	$result = mysqli_query($con,$viewcat);
	$count = mysqli_num_rows($result);
	echo $count;
}

function getAllcustomerById($customer_id){
	include 'connection.php';

	$q1= "SELECT * FROM customer WHERE is_deleted = '0' AND customer_id = '$customer_id'";
	return mysqli_query($con,$q1);
}

function getLoginAdmin($data){
	include 'connection.php';

    $email = $data['email'];
    $password = $data['password'];

	$loginAdmin = "SELECT * FROM customer WHERE email = '$email' AND password ='$password'";
	$count_loginAdmin = mysqli_query($con,$loginAdmin);

    if($email == 'admin'){
        $_SESSION['admin'] = $email;
    }else{
        $res = checkCustomerByEmail($email);
        $row = mysqli_fetch_assoc($res);
        $_SESSION['customer'] = $row['customer_id'];
    }
	return mysqli_num_rows($count_loginAdmin);
}


function checkCustomerByEmail($email){
	include 'connection.php';

	$q1= "SELECT * FROM customer WHERE email='$email' AND is_deleted='0'";
	return mysqli_query($con,$q1);
}


function checkCustomerByID($customer_id){
	include 'connection.php';

	$q1= "SELECT * FROM customer WHERE customer_id='$customer_id' AND is_deleted = '0'";
	return mysqli_query($con,$q1);
}

function getAllCustomer(){
	include 'connection.php';

	$q1= "SELECT * FROM customer WHERE is_deleted = '0' AND email != 'admin'";
	return mysqli_query($con,$q1);
}

//contact

function getAllMessages(){
	include 'connection.php';

	$messages = "SELECT * FROM contact";
	return mysqli_query($con,$messages);
}

//reviews
function getAllReviews($pid){
	include 'connection.php';
	
	$review = "SELECT * FROM review WHERE review_pid = '$pid'";
	return mysqli_query($con,$review);
}


//serve

function getAllServes()
{
	include 'connection.php';

	$viewcat = "SELECT * FROM server_products join products on products.pid = server_products.pid WHERE server_products.is_deleted = 0 ";
	return mysqli_query($con, $viewcat);
}

//settings

function getAllSettings(){
	include 'connection.php';

	$settings = "SELECT * FROM settings";
	return mysqli_query($con,$settings);
}

function checkcustomerPasswordByName($data){
	include 'connection.php';
	$email = $data['email'];
	$password = $data['password'];

	$viewcat = "SELECT * FROM customer WHERE password = '$password' AND email = '$email' ";
	$result = mysqli_query($con,$viewcat);
	$count = mysqli_num_rows($result);
	echo $count;
}


//orders

function getAllOrders(){
	include 'connection.php';

	$viewcat = "SELECT * FROM product_orders join customer on customer.customer_id = product_orders.customer_id  WHERE product_orders.is_deleted = '0' ORDER BY date_updated DESC";
	return mysqli_query($con,$viewcat);
}

function getAllOrdersBycustomer($customer_id){
	include 'connection.php';

	$viewcat = "SELECT * FROM product_orders WHERE customer_id = '$customer_id' AND is_deleted = '0' ORDER BY date_updated DESC";
	return mysqli_query($con,$viewcat);
}
function getAllOrderItemsBYOrder($order_id){
	include 'connection.php';

	$viewcat = "SELECT * FROM order_items join products on order_items.pid = products.pid WHERE order_items.order_id = '$order_id'";
	return mysqli_query($con,$viewcat);
}


//count

function dataCount($table){
	include 'connection.php';

	$counts = "SELECT * FROM $table WHERE is_deleted = 0";
	$res =  mysqli_query($con,$counts);
    $count =  mysqli_num_rows($res);
    echo $count;
}

function dataCountwithCondition($table, $condition){
	include 'connection.php';

	$counts = "SELECT * FROM $table $condition";
	$res =  mysqli_query($con,$counts);
    $count =  mysqli_num_rows($res);
    echo $count;

}

function dataforCount($table){
	include 'connection.php';

	$counts = "SELECT sum(total) as sum FROM $table WHERE is_deleted = 0";
    return mysqli_query($con,$counts);
}

function dataforCountToday($table){
	include 'connection.php';

	$counts = "SELECT sum(total) as sum FROM $table WHERE month(now()) = month(date_updated) AND is_deleted = 0";
    return mysqli_query($con,$counts);
}
?>