<!DOCTYPE html>
<html lang="vi">
<?php
    require "connect.php";
?>
<header>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý kho</title>
    <style>
        table{
            border: 1px solid #333;
        }
        td {
            padding: 2px;
        }
        .btn_func {
            margin-left: 5px;
            text-decoration: none;
            color: blue;
        }
    </style>
</header>
<body>
    <?php
        $severname = "localhost";
        $username = "root";
        $password = "";
        $conn = mysqli_connect($severname, $username, $password,"qlkho");
    ?>
        <form method="POST" action="">
            <label id="timkiem">Nhập từ khoá:</label>
            <input type="text" id="timkiem" name="timkiem">
            <button name="btn_timkiem" value="TimKiem">Tìm kiếm</button>
        </form>
        <?php
            if (isset($_POST)){
                if (!isset($_POST['timkiem'])){
                    echo '<script>alert("Mời nhập từ khoá muốn tìm kiếm")</script>';
                }
                else {
                    ?>
                    <table border="1">
                        <tr>
                            <td>Mã Sản Phẩm</td>
                            <td>Tên Sản Phẩm</td>
                            <td>Mô tả</td>
                            <td>Hình Ảnh</td>
                            <td>Đơn giá</td>
                            <td>Hạn Sử Dụng</td>
                            <td>Tên Kho</td>
                            <td>Địa chỉ kho</td>
                            <td>Ảnh kho</td>
                        </tr>
                    <?php
                    $timkiem = $_POST['timkiem'];
                    $sql= "SELECT * FROM sanpham,kho 
                                WHERE sanpham.makho = kho.makho and ('$timkiem'=masp or '$timkiem'=tensp or '$timkiem'=mota or '$timkiem'=tenkho)";
                    $result= mysqli_query($conn,$sql);
                    $num = mysqli_affected_rows($conn);
                    $infor= mysqli_fetch_all($result, MYSQLI_ASSOC);
                    if (!$infor) {
                        echo '<script>alert("Mời nhập lại từ khoá!")</script>';
                    }
                    else {
                        for ($i=0;$i<$num;$i++) {
                            echo
                        "
                            <tr>
                                <td>{$infor[$i]["masp"]}</td>
                                <td>{$infor[$i]['tensp']}</td>
                                <td>{$infor[$i]['mota']}</td>
                                <td>{$infor[$i]['hinhanh']}</td>
                                <td>{$infor[$i]['dongia']}</td>
                                <td>{$infor[$i]['hansd']}</td>
                                <td>{$infor[$i]['tenkho']}</td>
                                <td>{$infor[$i]['diachikho']}</td>
                                <td>{$infor[$i]['anhkho']}</td>
                                <td>
                                    <a class='btn_func sua' href='sua.php?id=".$infor[$i]['masp']."'> Sửa</a>
                                    <a class='btn_func xoa' href='confirm.php?id=".$infor[$i]['masp']."'> Xoá</a>
                                </td>
                            </tr>
                        ";     
                            }
                    }
                    ?>
                    </table>
                    <?php
                }
            }
        ?>
</body>
</html>