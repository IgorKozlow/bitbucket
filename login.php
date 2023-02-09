<?php

require 'login.class.php';
require 'templates/header.php';
session_start();

if (isset($_POST['submit'])){
    $user = new LoginUser($_POST['login'], $_POST['password']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <title>User account</title>
</head>
<body>
    <div class="nav justify-content-center"><h1>Login  Form</h1></div>
    <div class="nav justify-content-center">
    <form action="" method="POST" enctype="multipard/form-data">
        <label>Login:  </label><br>
        <input type="text" name="login" required><br>
        <label>Password :</label><br>
        <input type="password" name="password" required><br>
        <?php echo @$user->error; ?>
        <?php echo @$user->success; ?><br>
        <div class="nav justify-content-center"><input type="submit"  name="submit" value="Login" class="btn btn-primary"></div>
     
    </form>
    </div>

</body>
</html>