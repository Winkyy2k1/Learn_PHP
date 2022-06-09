<?php
if(isset($_POST['submit'])) // kiểm tra xem bấm lúc submit chưa?
    {
        include("connect.php");
        $name_pro = $_POST['product_name'];
        $price  = $_POST['price'];
        $quantity = $_POST['quantity'];
        $des = $_POST['des'];
        $brand_id = $_POST['brand'];
    
        // xử lý hình ảnh 
        $image_path = $_FILES['image']['name'];   // lấy đường dẫn hình ảnh 
        // tạo nơi lưu trữ cho file 
        $file = $_FILES['image'];
        $file_name = $file['name'];
        $target_dir = "uploads/";

        $target_file = $target_dir.basename($_FILES["image"]["name"]);   // đường dẫn nơi lưu trữ
        // hàm basename trả về tên tập tin từ một đường dẫn
        $image = $target_file;   
        // đẩy ảnh vào thư mục uploads

        $check = false;

        if($price > 0 && $quantity >=0 )
        {
            $check = true;
        }
        if($_FILES['image']['size'] <= 2048 )
        {
           //echo "File quá lớn ";
            $check = true;
        }

        if($_FILES['image']['type'] == 'image/jpg' && $_FILES['image']['type'] == 'image/png')
        {
            $check = true;
        }

        if($check)
        {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "Upload thành công ";
                $sql = "INSERT INTO `products` ( `product_name`, `image`, `price`, `quantity`, `des`, `brand_id`) 
                VALUES ('$name_pro', '$image', $price, $quantity, '$des', $brand_id);" ;

                mysqli_query($con, $sql);
                include("display_product.php");
            } else {
                echo "</br> Upload ảnh không thanh công. ";
            }
        }
        else{
            echo " Khong the them moi san pham do co loi xay ra. ";
        }
        
    }
?>