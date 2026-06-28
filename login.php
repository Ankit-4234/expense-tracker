<?php
session_start();
include "db.php";
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="SELECT * FROM users WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    $user=mysqli_fetch_assoc($result); 

    if($user && password_verify($password,$user['password'])){
        $_SESSION['user_id']=$user['id'];
        $_SESSION['user_name']=$user['name'];
        header("Location: dashboard.php");
        exit();
    }else{
        $error="Invalid email or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="auth_container">
        <h1>login</h1>
        <?php if(isset($error)){ ?>
        <p class="error"> <?php echo $error; ?>
    <?php } ?>
    <form method="POST">
        <input type="email" name="email" placeholder="email" required> <br> <br>
        <input type="password" name="passsword" placeholder="password" required> <br> <br>
        <button type="submit" name="submit"> login </button>
</form>
<p>no account? <a href="register.php"> register </a> </p>
    
</body>
</html>