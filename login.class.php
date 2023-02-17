<?php   

extract($_POST);

if (isset($_POST['login'])){
    $user = new LoginUser($_POST['login'], $_POST['password']);
}


class LoginUser{
    private $login;
    private $password;
    public $error;
    public $success;
    private $storage = 'db/data.json';
    private $stored_users;
    
    public function __construct($login, $password){
       
        $this->login = $login;
        $this->password = $password;
        $this->stored_users = (array) json_decode(file_get_contents($this->storage), true);
        $this->login();
    }
    
    private function login(){
        if($this->stored_users != null){
            foreach($this->stored_users as $user){
                if($user['login'] == $this->login){
                $this->checkpassowrd($user['password']);
                };
            } 
            echo "User not found.";
    } else {
        echo "First  <a href='/'>registrate.</a>";
    }}

    private function checkpassowrd($user_password){
        if(md5($this->password) == $user_password){
            session_start();
            $_SESSION['user'] = $this->login;
            $arr = [
                $this->login => $this->password
            ];  
            echo json_encode($arr);
            header('Content-Type: application/json');

        }else{
           echo  "Wrong password.";
           exit();
        }
    }
}
?>