<?php
include "db.php";
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$POST['password'];
    $confirm=$_POST['confirm'];
    if($password !== $confirm){
        $error="password does not match";
    }
    else{
        $hashed=password_hash($password,PASSWORD_DEFAULT);
        $sql="INSERT INTO users(name,email,password) VALUES('name','email','hashed')";
        if(mysql_query($conn,$sql)){
            header("Location: login.php");
            exit();
        }
        else{
            $error="email already used";
        }
    }
}
