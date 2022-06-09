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
                    <h2 align="center">Quản lý sản phẩm trong kho</h2>
                    <br><br>
                    <a class="btn_func" href="index.php">Tìm kiếm</a>
                    <a class='btn_func them' href='them.php'>Thêm</a>
                    <br><br>
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
                    $sql= "SELECT * FROM sanpham,kho WHERE sanpham.makho = kho.makho";
                    $result= mysqli_query($conn,$sql);
                    $num = mysqli_affected_rows($conn);
                    $infor= mysqli_fetch_all($result, MYSQLI_ASSOC);
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
                    ?>
                    </table>
</body>
</html>