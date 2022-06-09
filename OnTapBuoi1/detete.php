<?php
    include("connect.php");
    $id_sp = $_GET['id'];
    $sql_xoa = "DELETE FROM products WHERE product_id =$id_sp";
    mysqli_query($con,$sql_xoa);
    include("display_product.php");
?>

