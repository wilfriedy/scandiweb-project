<?php
// include database
require_once './db.php';
$connect = new Connection; // creates an instance of the databse
// product data to delete
$product__data = $_POST['products'];

// delete the selected product
function deleteAndReturnNew()
{
    global $product__data;
    global $connect;
    //loops through the submited array and deletes the data
    foreach($product__data as $product)
    {
        $query__delete = "DELETE FROM products_details WHERE id = $product ";
        $query__result = mysqli_query($connect->connection, $query__delete);
    }

}

deleteAndReturnNew();

