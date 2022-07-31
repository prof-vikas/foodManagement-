<?php 
    //Start Session
    session_start();


    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://foodmanagement.orgfree.com/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', '388443');
    define('DB_PASSWORD', 'apple0mac');
    define('DB_NAME', '388443');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //SElecting Database


?>