<?php
    require "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $id = $_GET['id'];
    $sql= "SELECT * FROM kho,sanpham WHERE kho.makho = sanpham.makho and masp=$id";
    $sql2 =  "SELECT * FROM kho";
    $result= mysqli_query($conn,$sql);
    $infor= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $res = mysqli_query($conn,$sql2);
    $num = mysqli_affected_rows($conn);
    $infor2= mysqli_fetch_all($res, MYSQLI_ASSOC);
    $infor_tensp = $infor[0]['tensp'];
    $infor_mota = $infor[0]['mota'];
    $infor_hinhanh = $infor[0]['hinhanh'];
    $infor_dongia = $infor[0]['dongia'];
    $infor_diachi = $infor[0]['diachi'];
    $infor_hansd = $infor[0]['hansd'];
?>
        <form method="POST" action="">
                <table border="1" padding="2px">
                    <tr>
                        <td>Tên Sản phẩm</td>
                        <td><input type="text" name="tensp" value="<?php echo $infor_tensp ?>"></td>
                    </tr>
                    <tr>
                        <td>Mô tả</td>
                        <td><input type="text" value="<?php echo $infor_mota ?>" name="mota"></td>
                    </tr>
                    <tr>
                        <td>Hình ảnh</td>
                        <td><input type="text" value="<?php echo $infor_hinhanh ?>" name="hinhanh"></td>
                    </tr>
                    <tr>
                        <td>Đơn giá</td>
                        <td><input type="number" value="<?php echo $infor_dongia ?>" name="dongia"></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td><input type="text" value="<?php echo $infor_diachi ?>" name="diachi"></td>
                    </tr>
                    <tr>
                        <td>Hạn SD</td>
                        <td><input type="date" value="<?php echo $infor_hansd ?>" name="hansd"></td>
                    </tr>
                    <tr>
                        <td>Mã kho</td>
                        <td>
                            <select name="makho">
                                <option value="0">---Chọn mã kho---</option>
                                    <?php
                                    for($i=0;$i<$num;$i++){
                                        ?>
                                        <option value="<?php echo "{$infor2[$i]['makho']}" ?>"><?php echo "{$infor2[$i]['tenkho']}" ?></option> 
                                        <?php
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <button>Sửa SP</button>
        </form> 
</body>
</html>

<?php
    if ($_POST["tensp"] == "" || $_POST["mota"]=="" || $_POST["hinhanh"]=="" || $_POST["dongia"]=="" || $_POST["diachi"]=="" || $_POST["hansd"]=="" || $_POST["makho"]==""){
        echo 'Bạn cần điền đầy đủ!!';
    }
    else {
        $tensp = $_POST["tensp"];
        $mota = $_POST["mota"];
        $hinhanh = $_POST["hinhanh"];
        $dongia = $_POST["dongia"];
        $diachi = $_POST["diachi"];
        $hansd = $_POST["hansd"];
        $makho = $_POST["makho"];
            if(isset($_GET["id"])){
                $masp=$_GET["id"];
                $sql = "UPDATE sanpham SET tensp='$tensp',mota='$mota',hinhanh='$hinhanh',dongia='$dongia',diachi='$diachi',hansd='$hansd',makho='$makho' Where masp='$masp'";  
                $res = mysqli_query($conn,$sql);
                header("location:home.php" );
            }
            else{
                echo "id không hợp lệ!";
            }
    }
?>