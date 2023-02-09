<?php 
session_start();

require 'templates/header.php';
require 'register.php';

if (isset($_POST['submit'])){
    $user = new RegisterUser($_POST['login'], $_POST['password'],$_POST['conf_password'],$_POST['email'], $_POST['username']);
}
?>
<?php if(!empty($_SESSION)): ?>

<div class="nav justify-content-center"><h1> Your are already logged in as  <?php echo $_SESSION['user'] ?> </h1></div>
    
<?php else: ?>

<div class="nav justify-content-center"><h1>Registration Form </h1><br></div>
<div class="nav justify-content-center">
    <form action="" method="POST" enctype="multipard/form-data" >
        
        <label>Login:  </label><br>
        <input type="text" name="login" required><br>
        <label>Password :</label><br>
        <input type="password" name="password" required><br>
        <label>Confirm Password :</label><br>
        <input type="password" name="conf_password" required><br>
        <label for="">Email:</label><br>
        <input type="text" name="email" required><br>
        <label for="">User name:</label><br>
        <input type="text" name="username" required><br>
        <?php echo @$user->error; ?>
        <?php echo @$user->success; ?><br>
        <div class="nav justify-content-center"><input type="submit"  name="submit" value="Register" class="btn btn-primary"></div>
        <div id="error_msg"></div>
    </form>
</div>
</div>
<?php endif; ?>
  


