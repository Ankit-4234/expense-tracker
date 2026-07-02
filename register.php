<?php
include "db.php";
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm=$_POST['confirm'];
    if($password !== $confirm){
        $error="password does not match";
    }
    else{
        $hashed=password_hash($password,PASSWORD_DEFAULT);
        $sql="INSERT INTO users(name,email,password) VALUES('$name','$email','$hashed')";
        if(mysqli_query($conn,$sql)){
            header("Location: login.php");
            exit();
        }
        else{
            $error="email already used";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="auth-container">
    <h1> Create account </h1>
    <?php if(isset($error)) {?>
    <p class="error"><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST">
    <input type="text" name="name" placeholder="full name" required> <br><br>
    <input type="email" name="email" placeholder="email" required> <br> <br>
    <input type="password" name="password" placeholder="password" required> <br> <br>
    <input type="password" name="confirm" placeholder="confirm password" required> <br> <br>
    <button type="submit" name="submit"> register </button>
    </form>
    <p>Already have an account? <a href="login.php" login> </a> </p>
    </div>
</body>
</html>