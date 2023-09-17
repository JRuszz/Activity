<?php 
    include ("homepage.php");
	require_once("connection.php"); 

    if(isset($_POST['add'])){

        $supplierid = mysqli_real_escape_string($conn, $_POST['supplierid']);
        $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
        $rep_fname = mysqli_real_escape_string($conn, $_POST['rep_fname']);
        $rep_lname = mysqli_real_escape_string($conn, $_POST['rep_lname']);
        $referred_by_FK = mysqli_real_escape_string($conn, $_POST['referred_by_FK']);

        $sql = "INSERT INTO suupliers  VALUES ('$supplierid',
        '$company_name','$rep_fname','$rep_lname','$referred_by_FK')";
     
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
    <h1>New Suppliers</h1><br>
    <form action = "" method = "post">
        <div class="container">
        <p>Please fill in this form to add a new suppliers.</p>
        <a class="button button-back" href="suppliers.php"> View Record</a>
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
                <input type="supplierid" placeholder="Enter Supplier ID" name="supplierid" id="supplierid" required><br>
                <input type="companyname" placeholder="Enter Company Name" name="company_name" id="company_name" required><br>
                <input type="rep_fname" placeholder="Enter Representative First Name" name="rep_fname" id="rep_fname" required><br>
                <input type="rep_lname" placeholder="Enter Representative Last Name" name="rep_lname" id="rep_lname" required><br>
                <input type="referred_by_FK" placeholder="Enter Referal" name="referred_by_FK" id="pareferred_by_FK" required><br>
            
            <hr>
                <button class="button" type="submit" name="add">Add New Suppliers</button>
                 <br>
                
                        
        </div>
    </form>
</div>
</body>
</html>