<?php
$host ="localhost";
$uname = "root";
$upass = "";
$dbname = "bth_baion1";
$con = mysqli_connect($host, $uname, $upass, $dbname);

if(!$con)
{
    die("Khong ket noi duoc co so su lieu: " . mysqli_connect_error());
}
    else echo "Ket noi thanh cong";
?>