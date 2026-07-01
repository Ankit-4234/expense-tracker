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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit expense</title>
</head>
<body>
    <div class="container">
        <h1> edit expenses </h1>
        <form method="POST">
            <input type="text" name="title" value="<?php echo $row['title']; ?>" required> <br> <br>
            <input type="number" name="amount" value="<?php echo $row['amount']; ?>" required> <br> <br>
            <input type="text" name="category" value="<?php echo $row['category'] ?>" required> <br> <br>
            <input type="date" name="expense_date" value="<?php echo $row['expense_date'] ?>" required> <br> <br>
            <button type="submit" name="update"> update expense </button>
</form>
</div>
</body>
</html>