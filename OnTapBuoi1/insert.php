<?php 
    include_once("connect.php");
    $sql_brand = "SELECT * FROM `brands`";
    $list_brand = array();
    $rs_brand = mysqli_query($con, $sql_brand);

    if (mysqli_num_rows($rs_brand) > 0) {
        while ($brand = mysqli_fetch_array($rs_brand)) {
            array_push($list_brand,$brand);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Thêm mới sản phẩm </title>
</head>
<body>
    <h2  align="center"> Nhap du lieu san pham muon them. </h2>
    <form action="insert_table.php" method="POST" enctype="multipart/form-data">
        <table width="500px" align="center">
            <tr>
                <td> Ten san pham </td>
                <td> <input type="text" name="product_name"> </td>
            </tr>
            <tr>
                <td> Hinh anh  </td>
                <td> <input type="file" name="image"> </td>
            </tr>
            <tr>
                <td> Gia tien  </td>
                <td> <input type="text" name="price"> </td>
            </tr>
            <tr>
                <td> So luong </td>
                <td> <input type="text" name="quantity"> </td>
            </tr>
            <tr>
                <td> Mo ta </td>
                <td> <input type="text" name="des"> </td>
            </tr>
            <tr>
                <td> Ten hang san pham </td>
                <td>
                    <select name ="brand">
                            <?php 
                                foreach ($list_brand as $key) {?>
                                    <option value="<?php echo $key['brand_id']?>"><?php echo $key['brand_name']?></option>
                                <?php
                                }
                            ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" >
                    <button type="submit" name="submit" > Thêm  </button> 
                    <a href="display_product.php"> <button type="button"> Huỷ thêm </button> </a>
                </td>
            </tr>
        </table>

    </form>
</body>
</html>