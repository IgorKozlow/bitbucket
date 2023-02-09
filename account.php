<?php
   require 'templates/header.php';
       
    if(!isset($_SESSION['user'])){
        
        header("location: login.php");
        exit();
    }

    if(isset($_GET['logout'])){
        unset($_SESSION['user']);
        header('location: login.php');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User account</title>
</head>
<body>
    <div class="nav justify-content-center">
        <h1>Welcome <?php echo $_SESSION['user'] ?> ! </h1>
    </div>       
<div class="nav justify-content-center">
    <a href="?logout"> Log out</a>

</body>
</html>