<?php
    require 'connect.php';
?>
<html>
    <header>
        <style>
            body {
                display: flex;
            }
            #confirm {
                margin: auto;
                border: 2px solid #333;
                padding: 5px;
            }
            .div_xoa{
                display: flex;
                justify-content: space-between;
            }
            .btn_xoa {
                padding: 5px;
                border: 1px solid #333;
                width: 100px;
                margin: 2px;
                text-align: center;
            }
            .a_xoa {
                text-decoration: none;
            }
        </style>
    </header>
    <body>
        <?php
            if($_GET['id']){
                $masp = $_GET['id'];
                echo 
                '
                    <div id="confirm">
                        <h3>Bạn có chắc chắn muốn xoá sản phẩm này?</h3>
                        <br><br>
                        <div class="div_xoa"><a class="a_xoa" href="xoa.php?id='.$masp.'"><div class="btn_xoa">Xoá</div></a> 
                        <a class="a_xoa" href="index.php"><div class="btn_xoa">Quay lại</div></a>
                        </div>
                    </div>
                ';
            }  else echo "id không hợp lệ"; 
        ?>
    </body>
</html>