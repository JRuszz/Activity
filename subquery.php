<?php 
    include ("homepage.php");
	require_once("connection.php"); 
?>

<!DOCTYPE html>
<html>
<head>

<style>
    h1{
    display: flex;
    justify-content: center;
    margin-left: 230px;
    font-size: 1.5cm;
    }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            
        }


        form {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: inline-block;
            padding: 30px;
            text-align: center;
            margin-left: 230px;
        }

        label {
            display: block;
            margin-bottom: 20px;
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            
        }

        input[type="submit"] {
            background-color: #001235; 
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease-in-out;
            
        }

        input[type="submit"]:hover {
           /*background-color: #555;*/
            background-color: #f3f5f9;
            color: rgb(0, 0, 0);
        }
    </style>




    <center>
    <title>Activity Number 2 Subquery</title>
</head>
<body>

    <h1>Select Subquery</h1>
<br><br>
    <form method="post" action="process.php">
        <label for="page">Choose a page:</label>
        <select name="page" id="page">
            <?php
            for ($i = 1; $i <= 24; $i++) {
                $pageValue = $i . ".php";
                echo "<option value=\"$pageValue\">Page $i</option>";
            }
            ?>
        </select>
        <input type="submit" value="Go">
    </form>
        </center>
        
</body>
</html>