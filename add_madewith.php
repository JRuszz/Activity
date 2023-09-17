<?php 
    include ("homepage.php");
	require_once("connection.php"); 

    if(isset($_POST['add'])){

        $itemid = mysqli_real_escape_string($conn, $_POST['itemid']);
        $ingredientid = mysqli_real_escape_string($conn, $_POST['ingredientid']);
        $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

        $sql = "INSERT INTO madewith  VALUES ('$itemid',
        '$ingredientid','$quantity')";
     
    if(mysqli_query($conn, $sql)){
        echo "<h3><p><center>Data stored in a database successfully.</center></p>";
    } else{
        
        echo "<center>ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
            echo"</center>";
            
    }
    

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>Team Yey</title>
	<meta http-equiv="X-UA-Compatible" content= "IE-edge">
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <link href="add.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="sidebar">
<br><br>
    <h1>New Made with</h1><br>
    <form action = "" method = "post">
        <div class="container">
        <p>Please fill in this form to add a new Made with.</p>
            <a class="button button-back" href ="madewith.php"> View Record</a>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            }
            if(isset($success)){
                foreach($success as $success){
                    echo '<span class="success-msg">'.$success.'</span>';
                };
            };
            ?>
            <hr>
                <input type="itemid" placeholder="Enter Item ID" name="itemid" id="itemid" required><br>
                <input type="ingredientid" placeholder="Enter Ingredient ID" name="ingredientid" id="ingredientid" required><br>
                <input type="quantity" placeholder="Enter Quantity" name="quantity" id="quantity" required><br>
                <hr>
                <button class="button" type="submit" name="add">Add New Items</button>
                        <br>
        </div>
    </form>
</div>
</body>
</html>