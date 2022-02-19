<?php
require_once './class/db.php';
$connect = new Connection;// creates an instance of the databse
// this class gets all the productws from the databse and displays them
class Getproducts
{
    private $query_ = "SELECT p.id, p.sku , p.name , p.price , p.measurements , u.title FROM products_details p INNER JOIN products_measurements u on u.id = p.units ORDER BY p.id DESC";
    public function productsList() 
    {
        global $connect;
        return $query_result = mysqli_query($connect->connection , $this->query_);
    }
}


