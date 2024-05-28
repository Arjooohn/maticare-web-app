<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "login_sample_db";

    //We are going to test the connection, $con, to the database 
    //by checking if the variables are correct
    if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
    {
        //If the connection is not established it 
        //will fail to connect and terminate
        die("failed to connect!");
    }
?>