<?php
include_once('dbparams.php'); // gets parameters for db set up
class Connection
{
    public $connection; // this is the connection variable that extablishes the connection for the databases outside this class
    public function __construct()
    {
         $this->connection = new mysqli(DB_HOST, DB_USER ,DB_PASSWORD,DB_NAME);

        if(!$this->connection)
        {
            echo 'Failed connection' . $this->connection->connect_error;
        } 
    }

}