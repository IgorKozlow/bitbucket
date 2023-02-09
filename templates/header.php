<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manao Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <?php
      
    session_start();

    if(isset($_GET['logout'])){
      unset($_SESSION['user']);
      header('location: login.php');
      exit;
  }
    ?>
    <?php If(!empty($_SESSION["user"])): ?>
    <ul class="nav justify-content-center">
      <h3>Hello <?php echo $_SESSION['user'] ?> ! <a href="?logout"> Log out</a></h3> 
    </ul>
    <?php else: ?>
      <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/index.php">Registration</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/login.php">Login</a>
      </li>
      
    </ul>
    <?php endif; ?>
    
  </html>