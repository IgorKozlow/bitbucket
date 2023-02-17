<?php 
require 'templates/header.php';
require 'register.php';
?>
<noscript>
        <meta http-equiv="refresh" content="0;url=templates/nojs.html"/>
</noscript>
<?php if(!empty($_SESSION)): ?>
    <div class="nav justify-content-center"><h1> Hello  <?php echo $_SESSION['user'] ?> !</h1></div>
<?php else: ?>

<div class="nav justify-content-center"><h1>Registration Form </h1><br></div>
    <div style="text-align: center;">
        <form action="#" method="POST" enctype="multipard/form-data" id="manage_user" >
            <label>Login:  </label><br>
            <input type="text" name="login"  id="login"  onkeyup="this.value=this.value.replace(/\s+/gi,'')"><br>
            <label>Password :</label><br>
            <input type="password" name="password" id="password"><br>
            <label>Confirm Password :</label><br>
            <input type="password" name="conf_password" id="conf_password"><br>
            <label for="">Email:</label><br>
            <input type="text" name="email"  id="mail"><br>
            <label for="">User name:</label><br>
            <input type="text" name="username"  id="username">
            <div><a id="error_msg"></a>&nbsp;</div>
            <div class="nav justify-content-center"><input type="submit"  name="submit" value="Register" class="btn btn-primary"></div>
        </form>
    </div>
</div>

<script src="js\jquery.js"></script>
<script src="js\main.js"></script>

<?php endif; ?>
  


