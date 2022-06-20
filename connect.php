<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "new_sparks_bank";
    $con  = mysqli_connect($server , $username , $password , $database);
    if(!$con){
        die("connection to the database failed" . mysqli_connect_error());
    }
    //  echo "connection succesfull";
?>
