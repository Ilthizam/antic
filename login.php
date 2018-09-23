<?php
/**
 * Created by PhpStorm.
 * User: Ilthizam
 * Date: 8/15/2018
 * Time: 10:33 AM
 */

include "./connection.php";
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $userName=mysqli_real_escape_string($conn, $_POST["userName"]);
    $password=mysqli_real_escape_string($conn,$_POST["password"]);

    $sql="select type from login where userName='$userName'and password='$password'";

    $result=mysqli_query($conn, $sql);
    $row=$result->fetch_assoc();
    $count=mysqli_num_rows($result);

    if($count==1){
        //$_SESSION['userName']=$row['userName'];

        if($row["type"]=="admin"){
            $_SESSION["type"]=$row["type"];
            header("location:./dAdmin.php");

        }
        if($row["type"]=="cashier"){
            $_SESSION["type"]=$row["type"];
            header("location:./dCashier.php");
        }
        if ($row["type"]=="manager"){
            $_SESSION["type"]="manager";
            header("location:./dManager.php");
        }

    }else{
        $error="Username or Password is invalid";
        echo "<script>alert('$error')</script>";
    }


}


