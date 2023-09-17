<?php 
    include ("homepage.php");
	require_once("connection.php"); 

    if(isset($_POST['add'])){

        $menuitemid = mysqli_real_escape_string($conn, $_POST['menuitemid']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);

        $sql = "INSERT INTO menuitems  VALUES ('$menuitemid',
        '$name','$price')";
     
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
    <h1>New Menu Items</h1><br>
    <form action = "" method = "post">
        <div class="container">
        <p>Please fill in this form to add a new menu items.</p>
            <a class="button button-back" href ="menuitems.php"> View Record</a>
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
                <input type="menuitemid" placeholder="Enter Menu Item ID" name="menuitemid" id="menuitemid" required><br>
                <input type="name" placeholder="Enter Name" name="name" id="name" required><br>
                <input type="price" placeholder="Enter Price" name="price" id="price" required><br>
               
                <hr>
                <button class="button" type="submit" name="add">Add New Menu Items</button>
                        <br>
        </div>
    </form>
</div>
</body>
</html>