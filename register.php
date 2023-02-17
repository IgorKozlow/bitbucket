<?php   
extract($_POST);

if (isset($_POST['login'])){
    $user = new RegisterUser($_POST['login'], $_POST['password'],$_POST['conf_password'],$_POST['email'], $_POST['username']);
}


class RegisterUser{
    private $login;
    private $username;
    private $raw_password;
    private $conf_password;
    private $encrypted_password;
    private $email; 
    public $error;
    public $success;
    private $storage ='db/data.json';
    private $stored_users;
    private $new_user; 

    
    public function __construct($login, $raw_password, $conf_password, $email, $username){
       
        $this->login = $login;
        $this->username = $username;
        $this->raw_password = $raw_password;
        $this->conf_password= $conf_password;
        $this->email =$email;
        $this->encrypted_password = md5($this->raw_password);
        $this->stored_users = (array) json_decode(file_get_contents($this->storage), true);
        $this->error = "asdass";
        $this->new_user = [
            "login" => $this->login,
            "password" => $this->encrypted_password,
            "email" => $this->email,
            "username" => $this->username,
        ];
      
        if($this->checkValidation()){ 
          
        } else{
            return $this->erorr = 'no validation';
        }
    }

    private function checkMailandName(){
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            if(preg_match("/^[a-z]{2,}+$/mi", $this->username)){
                $this->insertUser();
            } else{
                echo "Wrong Username";
            }
        } else{
            echo 'Wrong email form';
        }
    }

    private function checkPassword(){
        if(preg_match("/(?=.*[0-9])(?=.*[a-zA-Z])[0-9a-zA-Z]{6,}/", $this->raw_password)){
           if($this->raw_password == $this->conf_password){
                $this->checkMailandName();
           }else{
                echo "Passwords are not the same ";
           }
        }else{
            echo 'Password must have at least 6 chars and numbs';
        }
        
    }

    private function checkValidation(){
        if (preg_match("/^.{6,}+$/mi", $this->login)){
            $this->checkPassword();
        } else{
            echo 'Login must have at least 6 simbols';
        }
    }

    private function userloginExists(){
        foreach($this->stored_users as $user){
            if($this->login == $user['login']){
                echo "User with this login already exist.";
               
            } 
        }
    }

    private function emailExists(){
        foreach($this->stored_users as $user){
            if($this->email == $user['email']){
                echo "User with this Email already exist.";
                return true;
            } 
        }
    }

    private function insertUser(){
        if($this->userloginExists() == FALSE &&  $this->emailExists() == FALSE ){
            array_push($this->stored_users, $this->new_user);
            if(file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))){
                header('Content-Type: application/json');

                echo json_encode($this->new_user, JSON_PRETTY_PRINT);
                return true;
            } else{
                echo 'Your Registration is BAD';
            }
        } 
    }
}

?>