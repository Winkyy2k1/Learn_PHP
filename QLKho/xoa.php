<?php
    require "connect.php";
    if (isset($_GET["id"])) {
        $masp = $_GET["id"];
    }
    $sql = "DELETE From sanpham where masp = $masp";
    $result = mysqli_query($conn, $sql);
    header("location: home.php");
?>