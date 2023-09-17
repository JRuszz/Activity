<?php 
    include ("homepage.php");
	require_once("connection.php"); 


    $sql = "SELECT * FROM madewith";
    //fire query
    $result = mysqli_query($conn, $sql);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>Team Yey</title>
	<meta http-equiv="X-UA-Compatible" content= "IE-edge">
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="suppliers.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="sidebar">
<br>
<br>
    <h1>MADE WITH</h1>
    <a href ="add_madewith.php"> <button class="button button1"><i class="fa fa-plus"></i> Add Made With</button></a><br><br><br>
    <center>
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
    <table style = "width: 70%;">
        <tr>
	        <th>Item ID</th>
	        <th>Ingredient Id</th>
            <th>Quantity</th>
        
        </tr>
        
    
        <?php
        
            while($madewith = mysqli_fetch_assoc($result)){
        
        ?>
        
        <tr>
          
            <td><?php echo $madewith["itemid"]; ?></td>
            <td><?php echo $madewith["ingredientid"]; ?></td>
            <td><?php echo $madewith["quantity"]; ?></td>

    
        </tr>
        <?php
                }
	    ?>
    </table>
    </center>
</div>
</body>
</html>