<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
include"db.php";
$user_id = $_SESSION["user_id"];
if(isset($_POST['submit'])){
$title=$_POST['titlte'];
$amount=$_POST['amount'];
$catergory=$_POST['category'];
$expense_date=$_POST['expense_date'];

$sql="INSERT INTO expenses(user_id,title,amount,category,expense_date) 
VALUES('$user_id','$title','$amount','$category','$expense_date')";
mysqli_query($conn,$sql);
header("Location: dashboard.php");
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add expense</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1> add expense </h1>
    <form method="POST">
    <input type="text" name="title" placeholder="expesnse title" required> <br> <br>
    <input type="number" name="amount" placeholder="total amount" required> <br> <br>
    <input type="text" name="category" placeholder="category" required> <br> <br>
    <input type="date" name="expense_date" placeholder="category" required> <br> <br>
    <button type="submit" name="submit"> save expense </button> 
    </form>
    <div>
</body>
</html>