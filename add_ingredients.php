<?php 
    include ("homepage.php");
	require_once("connection.php"); 

    if(isset($_POST['add'])){

        $ingredientid = mysqli_real_escape_string($conn, $_POST['ingredientid']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $unit = mysqli_real_escape_string($conn, $_POST['unit']);
        $unitprice = mysqli_real_escape_string($conn, $_POST['unitprice']);
        $foodgroup = mysqli_real_escape_string($conn, $_POST['foodgroup']);
        $inventory = mysqli_real_escape_string($conn, $_POST['inventory']);
        $supplierid_FK = mysqli_real_escape_string($conn, $_POST['supplierid_FK']);

        $sql = "INSERT INTO ingredients  VALUES ('$ingredientid',
        '$name','$unit','$unitprice','$foodgroup','$inventory', '$supplierid_FK')";
     
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
    <h1>New Ingredients</h1><br>
    <form action = "" method = "post">
        <div class="container">
        <p>Please fill in this form to add a new ingredients.</p>
            <a class="button button-back" href ="ingredients.php"> View Record</a>
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
                <input type="ingredientid" placeholder="Enter ID" name="ingredientid" id="ingredientid" required><br>
                <input type="name" placeholder="Enter Name" name="name" id="name" required><br>
                <input type="unit" placeholder="Enter Unit" name="unit" id="unit" required><br>
                <input type="unitprice" placeholder="Enter Unit Price" name="unitprice" id="unitprice" required><br>
                <input type="foodgroup" placeholder="Enter Food Group" name="foodgroup" id="foodgroup" required><br>
                <input type="inventory" placeholder="Enter Inventory" name="inventory" id="inventory" required><br>
                <input type="supplierid_FK" placeholder="Enter Supplier ID" name="supplierid_FK" id="supplierid_FK" required><br>
            <hr>
                <button class="button" type="submit" name="add">Add New Suppliers</button>
                        <br>
        </div>
    </form>
</div>
</body>
</html>