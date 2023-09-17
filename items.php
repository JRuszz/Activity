<?php 
    include ("homepage.php");
	require_once("connection.php"); 


    $sql = "SELECT * FROM items";
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
<div class="sidebar">
<br>
<br>
    <h1>ITEMS</h1>
    <a href ="add_items.php"> <button class="button button1"><i class="fa fa-plus"></i> Add Items</button></a><br><br><br>
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
	        <th>Name</th>
            <th>Price</th>
	        <th>Date added</th>
        
        </tr>
        
    
        <?php
        
            while($items = mysqli_fetch_assoc($result)){
        
        ?>


        
        <tr>
          
            <td><?php echo $items["itemid"]; ?></td>
            <td><?php echo $items["name"]; ?></td>
            <td><?php echo $items["price"]; ?></td>
            <td><?php echo $items["datepicker"]; ?></td>
        </tr>

       
    
    </form>
        <?php
                }
	    ?>
    </table>
    </center>

                
</body>
</html>