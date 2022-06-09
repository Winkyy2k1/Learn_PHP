
<?php
        $servername="localhost";
        $username = "root";
        $password ="";
        $conn = mysqli_connect($servername,$username,$password,"qlkho");
        $sql= "SELECT * FROM kho,sanpham WHERE kho.makho = sanpham.makho";
        $result= mysqli_query($conn,$sql);
        $num = mysqli_affected_rows($conn);
        $infor= mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<form method="POST" action="">
        <table border="1" padding="2px">
            <tr>
                <td>Mã sản phẩm</td>
                <td><input type="text" name="masp"></td>
            </tr>
            <tr>
                <td>Tên Sản phẩm</td>
                <td><input type="text" name="tensp"></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><input type="text" name="mota"></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="text" name="hinhanh"></td>
            </tr>
            <tr>
                <td>Đơn giá</td>
                <td><input type="number" name="dongia"></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input type="text" name="diachi"></td>
            </tr>
            <tr>
                <td>Hạn SD</td>
                <td><input type="date" name="hansd"></td>
            </tr>
            <tr>
                <td>Mã kho</td>
                <td>
                    <select name="makho">
                        <option value="0">---Chọn mã kho---</option>
                            <?php
                                for($i=0;$i<$num;$i++){
                                    ?>
                                    <option value="<?php echo "{$infor[$i]['makho']}" ?>"><?php echo "{$infor[$i]['tenkho']}" ?></option> 
                                    <?php
                                }
                            ?>
                    </select>
                </td>
            </tr>
            
        </table>
        <button>Thêm SP</button>
</form>
<?php
    if (isset($_POST)){ 
        $masp = $_POST["masp"];
        $tensp = $_POST["tensp"];
        $mota = $_POST["mota"];
        $hinhanh = $_POST["hinhanh"];
        $dongia = $_POST["dongia"];
        $diachi = $_POST["diachi"];
        $hansd = $_POST["hansd"];
        $makho = $_POST["makho"];
        for ($i=0;$i<$num;$i++){
            if ($masp == $infor[$i]['masp']) {
                echo '<script>alert("Mã sản phẩm đã tồn tại!")</script>';
            }   
            else {
                if ($masp!="" && $tensp!="" && $mota!="" && $hinhanh!="" && $dongia!="" && $diachi!="" && $hansd!="" && $makho!=""){
                    $sql = "INSERT INTO sanpham (masp,tensp,mota,hinhanh,dongia,diachi,hansd,makho) VALUES 
                        ('$masp','$tensp','$mota','$hinhanh','$dongia','$diachi','$hansd','$makho')";
                    $result= mysqli_query($conn,$sql);
                    header("location:home.php");
                }
                else {
                     echo '<script>alert("Mời nhập đủ các ô!")</script>';
                }
            }
        }
    }
?>
