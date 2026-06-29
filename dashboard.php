<?php
session_start();
if(isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
include "db.php";
$user_id=$_SESSION['user_id'];
$total_sql="SELECT SUM(amount) AS total FROM expense WHERE user_id=$user_id";
$total_result=mysqli_query($conn,$total_sql);
$total_row=mysqli_fetch_assoc($total_result);
$total=$total_row['total'] ? $total_row['total'] : 0;

$count_sql="SELECT COUNT(*) AS count FROM expense WHERE user_id=$user_id";
$count_result=mysqli_query($conn,$count_sql);
$count_row=mysqli_fetch_assoc($count_result);
$count=$count_row['count'];

$month_sql="SELECT SUM(amount) AS month_total FROM expense WHERE user_id=$user_id AND MONTH(expense_date)=MONTH(CURDATE()) AND YEAR(expense_date)=YEAR(CURDATE())";
$month_result=mysqli_query($conn,$month_sql);
$month_row=mysqli_fetch_assoc($month_result);
$month_total=$month_row['month_total'] ? $month_row['month_total'] : 0;

$expense_sql="SELECT * FROM expense WHERE user_id=$user_id ORDER BY expense_data DESC";
$expense_result=mysqli_query($conn,$expsense_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1> welcome , <?php echo $_SESSION['user_name']; ?> </h1>
            <a href="logout.php"> <button class="btn logout">logout</button></a>
</div>
<div class="cards">
    <div class="card">
        <h3>total expense </h3>
        <p> Rs <?php echo number_format($total,2); ?> </p>
</div>
    <div class="card">
        <h3> This Month </h3>
        <p> Rs <?php echo number_format($month_total,2); ?> </p>
</div>
</div>
<a href="add_expense.php"> <button class="btn add"> add expense </button> </a>
</body>
</html>
