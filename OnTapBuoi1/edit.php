<?php 
    include("connect.php");
    $id_sp = $_GET['id']; // lấy bản ghi có id = $id ;; chỗ câu lệng get edit.
    $sql = "SELECT * FROM products WHERE product_id = $id_sp";
    $rs = mysqli_query($con,$sql);
    $r = mysqli_fetch_assoc($rs);
    

    // Add list sẽ thêm vào các lựa chọn của selecte - option
    $sql_brand2 = "SELECT * FROM `brands`";
    $list_brand = array();
    $rs_brand2 = mysqli_query($con, $sql_brand2);
    if (mysqli_num_rows($rs_brand2) > 0) {
        while ($brand = mysqli_fetch_array($rs_brand2)) {
            array_push($list_brand,$brand);
        }
    }
    // Tìm ra mã brand đang được chọn  
    $id_brand = $r['brand_id'];
    $sql_brand = "SELECT * FROM `brands` WHERE brand_id = $id_brand";
    $rs_brand = mysqli_query($con, $sql_brand);
    $rb = mysqli_fetch_assoc($rs_brand);    // Lấy ra id_brand bằng cách gọi $rs['brand_id'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sửa sản phẩm </title>
</head>
<body>
    <h2  align="center"> Sửa sản phẩm </h2>
    <form action="edit_table.php" method="POST" enctype="multipart/form-data">
        <table width="500px" align="center">
            <tr>
                <td> Ten san pham </td>
                <td> <input type="text" name="product_name" value="<?= $r['product_name']?>" > </td>
            </tr>
            <tr>
                <td> Hinh anh  </td>
                <td> <img src="<?= $r['image']?>" width="100" height="100" name="image"> <input type="file" name="image">  </td>   

            </tr>
            <tr>
                <td> Gia tien  </td>
                <td> <input type="text" name="price" value=" <?= $r['price'] ?> " > </td>
            </tr>
            <tr>
                <td> So luong </td>
                <td> <input type="text" name="quantity" value=" <?= $r['quantity'] ?>" > </td>
            </tr>
            <tr>
                <td> Mo ta </td>
                <td> <input type="text" name="des" value ="<?= $r['des'] ?> " > </td>
            </tr>
            <tr>
                <td> Ten hang san pham </td>
                <td>
                <select name ="brand">
                    <option value="<?php echo $rb['brand_id']?>"><?php echo $rb['brand_name']?> </option>
                    
                    <?php 
                        foreach ($list_brand as $key) {
                            if( $rb['brand_id'] != $key['brand_id'])  
                    ?>
                            <option value="<?php echo $key['brand_id']?>"> <?php echo $key['brand_name']?> </option>
                        <?php
                        }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" >
                    <button type="submit" > Sửa  </button> 
                    <a href="display_product.php"> <button type="button"> Huỷ sửa </button> </a>
                </td>
            </tr>
            <tr>
                <td>
                <input type="hidden" id="id" name="id" value="<?= $id_sp?>">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>


