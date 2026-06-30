<?php
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
include "db.php";
$user_id=$_SESSION['user_id'];
$id=$_GET['id'];

$result=mysqli_query($conn, "SELECT * FROM expenses WHERE id=$id AND user_id=$user_id");
$row=mysqli_fetch_assoc($result);


if(isset($_POST['update'])){
    $title=$_POST['title'];
    $amount=$_POST['amount'];
    $category=$_POST['category'];
    $expense_data=$_POST['expense_data'];

    $sql="UPDATE expense SET
    title='$title',
    amount='$amount',
    category='$category',
    expense_date='$expense_date'
    WHERE id=$id AND user_id=$user_id";
    mysqli_query($conn,$sql);
    header("Location: hasboard.php");
    exit();
}