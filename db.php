<?php
$host='localhost';
$name='root';
$password='';
$database='expense_tracker';
$conn=new mysqli($host,$name,$password,$database);
if($conn->connect_error)
    {
        die("connection failed".$conn->connect_error);
    }
 ?>