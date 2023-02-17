<?php

require 'login.class.php';
require 'templates/header.php';

if (isset($_POST['submit'])){
    $user = new LoginUser($_POST['login'], $_POST['password']);
}
?>
<noscript>
        <meta http-equiv="refresh" content="0;url=templates/nojs.html"/>
</noscript>
<?php if(!empty($_SESSION)): ?>
    <div class="nav justify-content-center"><h1> Hello <?php echo $_SESSION['user'] ?>!  </h1></div>
<?php else: ?>
    
    <div class="nav justify-content-center"><h1>Login  Form</h1></div>
    <div class="nav justify-content-center" style="text-align: center;">
    <form action="#" method="POST" enctype="multipard/form-data" id="login_user">
        <label>Login:  </label><br>
        <input type="text" name="login" required onkeyup="this.value=this.value.replace(/\s+/gi,'')"><br>
        <label>Password :</label><br>
        <input type="password" name="password" required><br>
        <div><a id="error_msg_log">&nbsp;</a>&nbsp;</div>
        <div class="nav justify-content-center"><input type="submit"  name="submit" value="Login" class="btn btn-primary"></div>
    </form>
    </div>

<script src="js\jquery.js"></script>
<script src="js\main.js"></script>

<?php endif ?>
</html>