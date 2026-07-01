<?php
if(!isset($_SESSION['user_id'])){
    header(Location: login.php);
    exit();
}
include "db.php"
$user_id=$_SESSION['user_id'];
$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM expense WHERE id=$id AND user_id=$user_id");
header("Location: login.php");
exit();
?>