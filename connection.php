<?php
$servername = 'localhost';
$email = 'root';
$password = '';
$dbname = 'addbase_lab1';
$conn = mysqli_connect($servername, $email, $password, $dbname);

    //checking if connection is working or not
    if(!$conn)
    {
        die("Connection failed!" . mysqli_connect_error());
    }
    else 
    {
        echo "Successfully Connected! <br>";
    }
?>
