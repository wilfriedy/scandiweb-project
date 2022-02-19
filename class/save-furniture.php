<?php
// include database
require_once './db.php';
$connect = new Connection;
// product data to insert
$product__data = $_POST;
// echo $product__data;
print_r($product__data);
// defining variables to be inserted seprately
$name = $product__data['product-name'];
$sku = $product__data['sku'];
$price = $product__data['price'];
$dimensions = $product__data['height'] . 'x' . $product__data['width'] . 'x' . $product__data['length'];

// data insertion


$insert_cmd = "INSERT INTO products_details(units , type, name , sku , price , measurements) VALUES(1 ,3, '$name', '$sku', '$price', '$dimensions' )";

$save_product = mysqli_query($connect->connection, $insert_cmd);

