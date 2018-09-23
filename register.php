<?php
/**
 * Created by PhpStorm.
 * User: Ilthizam
 * Date: 8/15/2018
 * Time: 4:20 PM
 */

include "./connection.php";

if($_SERVER["REQUEST_METHOD"]=="POST") {

    $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
    $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
    $nic = mysqli_real_escape_string($conn, $_POST["nic"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $homeAddress = mysqli_real_escape_string($conn, $_POST["homeAddress"]);
    $userName = mysqli_real_escape_string($conn, $_POST["userName"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);

    $sqlstaff = "insert into staffDetail(firstName,lastName,staffAddress,staffphone,nic)
                values ('$firstName','$lastName','$homeAddress','$phone','$nic')";

    $result1 = mysqli_query($conn,$sqlstaff);

    $sqllogin = "insert into login (userName,staffId,password,type) values 
              ('$userName',(select staffId from staffDetail where nic='$nic'),'$password','$type')";

    $result2 = mysqli_query($conn,$sqllogin);
}


