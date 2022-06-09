<?php
include("connect.php");
$name_pro = $_POST['product_name'];
$price  = $_POST['price'];
$quantity = $_POST['quantity'];
$des = $_POST['des'];
$brand_id = $_POST['brand'];

$id_edit = $_POST['id'];

    $sql =" UPDATE `products` SET product_name='$name_pro',
    price='$price',
    quantity='$quantity',
    des='$des',
    brand_id='$brand_id' 
    WHERE product_id = $id_edit ";

    mysqli_query($con, $sql);
     include("display_product.php");
?>