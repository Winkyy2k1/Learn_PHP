<?php
    $servername="localhost";
    $username = "root";
    $password ="";
    $conn = mysqli_connect($servername,$username,$password,"qlkho");
    if (!$conn) {
        die("Lỗi kết nối: " .mysqli_connect_error());
    }
?>