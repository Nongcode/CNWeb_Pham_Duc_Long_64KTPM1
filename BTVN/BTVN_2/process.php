<?php
    session_start();
    if(!isset($_SESSION['products'])){
        $_SESSION['products'] =[
            ['id' => 1, 'name' => 'Sản phẩm 1', 'price' => '10000'],
            ['id' => 2, 'name' => 'Sản phẩm 2', 'price' => '20000'],
            ['id' => 3, 'name' => 'Sản phẩm 3', 'price' => '30000'],
        ];
    }
    $products = $_SESSION['products'];
    if(isset($_POST['action'])){
        // Thêm sản phẩm mới
        if($_POST['action']=='add'){
            $products[] = [
                'id' => count($products) + 1, 
                'name' => $_POST['name'],
                'price' => $_POST['price']
            ];
            $_SESSION['products'] = $products;
            // $products[] = $newProduct;
        } 
        // Sửa sản phẩm
        if($_POST['action'] == 'edit'){
            foreach($products as &$product){
                if($product['id'] == $_POST['id']){
                    $product['name'] = $_POST['name'];
                    $product['price'] = $_POST['price'];
                    break;
                }
            }
            unset($product);
        }
        // Xóa sản phẩm
        if($_POST['action'] == 'delete'){
            $products = array_filter($products, function($product){
                return $product['id'] != $_POST['id'];
            });
        }
    }
?>