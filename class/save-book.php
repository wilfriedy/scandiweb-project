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
$weight = $product__data['weight'] . 'KG';

// data insertion


$insert_cmd = "INSERT INTO products_details(units , type, name , sku , price , measurements) VALUES(3 ,1, '$name', '$sku', '$price', '$weight' )";

$save_product = mysqli_query($connect->connection, $insert_cmd);

