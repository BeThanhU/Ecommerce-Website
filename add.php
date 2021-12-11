<?php
    include("./db/connect.php");

    if(isset($_GET['add']) == 'cart'){
        $user_Name_client = $_GET['userName'];
        $product_id = $_GET['product_id'];
        $product_name = $_GET['product_name'];
        $product_price = $_GET['product_price'];
        $product_amount = $_GET['product_amount'];
        $product_category = $_GET['product_category'];
    
        $sql = "INSERT INTO giohang(TaiKhoanKH, MSHH, TenHangHoa, Gia, SoLuong, PhanLoai) VALUES ('$user_Name_client', '$product_id', '$product_name', '$product_price', '$product_amount', '$product_category');";

        $sql_insert = mysqli_query($con, $sql);

        if($sql_insert){
            echo 'true';
        }else{
            echo 'false';
        }
    }
?>