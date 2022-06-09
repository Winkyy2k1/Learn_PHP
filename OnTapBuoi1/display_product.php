<?php
        include("connect.php");
        $sql = "SELECT * FROM `products` ";
        $rs = mysqli_query($con, $sql);
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
    <h4> Them moi san pham <a href="insert.php" > Them moi </a> </h4>
    <h2 align="center" > Danh sach cac san pham la: </h2>
    <table border="1" width=100% style="border-collapse: collapse;">
        <tr align="center">
            <td>  STT </td>
            <td> Ma san pham </td>
            <td> Ten san pham </td>
            <td> Hinh anh</td>
            <td> Gia tien </td>
            <td> So luong </td>
            <td> Mo ta </td>
            <td> Mã hãng sản phẩm </td>
            <td> Chuc nang </td>
        </tr>
        <?php 
            $count = 0;
            while($r = mysqli_fetch_assoc($rs))
            {
                $count++;
        ?>
            <tr align="center">
                <td> <?= $count ?> </td>
                <td> <?= $r['product_id'] ?></td>
                <td> <?= $r['product_name'] ?> </td>
                <td> <img src="<?= $r['image']?>" width="100" height="100">  </td>   
                <td> <?= $r['price'] ?> </td>
                <td> <?= $r['quantity'] ?> </td>
                <td> <?= $r['des'] ?> </td>
                <td> <?= $r['brand_id'] ?> </td>
                <td> 
                  <a onclick="return confirm('Bạn có muốn xoá không?')" href="detete.php?id=<?= $r['product_id'] ?>"> <button style="margin: 5px;"> Xoa </button></a>
                  <a href="edit.php?id=<?= $r['product_id'] ?>"> <button> Sua </button></a>
                </td>
            </tr>

        <?php
             }
        ?>
    </table>
</body>
</html>

