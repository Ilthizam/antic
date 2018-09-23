<?php
require_once "./conn.settings.php";

$conn=mysqli_connect(HOST,USER,PASSWORD,DATABASE);

if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}else{
   // echo "Connection Success";
}
