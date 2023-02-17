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
<noscript>
        <meta http-equiv="refresh" content="0;url=templates/nojs.html"/>
</noscript>
    <div class="nav justify-content-center">
        <h1>Hello  <?php echo $_SESSION['user'] ?> ! </h1>
    </div>       
<div class="nav justify-content-center">


