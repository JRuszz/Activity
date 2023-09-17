<?php 
    include ("homepage.php");
	require_once("connection.php"); 

    if(isset($_POST['add'])){

        $mealid_FK = mysqli_real_escape_string($conn, $_POST['mealid_FK']);
        $itemid_FK = mysqli_real_escape_string($conn, $_POST['itemid_FK']);
        $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
        $discount = mysqli_real_escape_string($conn, $_POST['discount']);

        $sql = "INSERT INTO partof  VALUES ('$mealid_FK',
        '$itemid_FK','$quantity','$discount')";
     
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
    <h1>New Part of</h1><br>
    <form action = "" method = "post">
        <div class="container">
        <p>Please fill in this form to add a new items.</p>
            <a class="button button-back" href ="partof.php"> View Record</a>
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
                <input type="mealid_FK" placeholder="Enter Meal ID" name="mealid_FK" id="mealid_FK" required><br>
                <input type="itemid_FK" placeholder="Enter Item ID" name="itemid_FK" id="itemid_FK" required><br>
                <input type="quantity" placeholder="Enter Quantity" name="quantity" id="quantity" required><br>
                <input type="discount" placeholder="Enter Discount" name="discount" id="discount" required><br>
                <hr>
                <button class="button" type="submit" name="add">Add New Items</button>
                        <br>
        </div>
    </form>
</div>
</body>
</html>