<?php

class createDB{
    public $servername;
    public $username;
    public $dbname;
    public $tablename;
    public $con;
    public $password;


//create constructor

public function __construct(
$dbname="socko",
$tablename="trash",
$servername="localhost",
$username="root",
$password="",
$con=""
)
{
$this->dbname=$dbname;
$this->tablename=$tablename;
$this->servername=$servername;
$this->con=$con;
$this->username=$username;
$this->password=$password;

//create connection

$this->con=mysqli_connect($servername,$username,$password);

//check connection

if(!$this->con)
{
  die("connection fail");  
}

//query

$sql="CREATE DATABASE IF NOT EXISTS $dbname";

if(mysqli_query($this->con,$sql))
{
    $this->con=mysqli_connect($servername,$username,$password,$dbname);

    $sql="CREATE TABLE IF NOT EXISTS $tablename
          (product_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
          product_name VARCHAR(100) NOT NULL,
          product_image VARCHAR(50) NOT NULL,
          product_manufacturer VARCHAR(50) NOT NULL,
          product_description VARCHAR(100) NOT NULL,
          product_price FLOAT,
          product_discount INT(30) NOT NULL
          );";

          if(!mysqli_query($this->con, $sql))
          {
              echo "error creating table";
          }
         
}
else{
    return false;
}
}

//get product from database

public function getData()
{
    $sql="SELECT * FROM $this->tablename";

    $result=mysqli_query($this->con,$sql);

    if(mysqli_num_rows($result)> 0)
    {
        return $result;
    }
}
}
?>