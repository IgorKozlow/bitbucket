<?php   

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
    private $new_user; //array

    
    public function __construct($login, $raw_password, $conf_password, $email, $username){

        $this->login = $login;
        $this->username = $username;
        $this->raw_password = $raw_password;
        $this->conf_password= $conf_password;
        $this->email =$email;
        $this->encrypted_password = md5($this->raw_password, PASSWORD_DEFAULT);
        $this->stored_users = json_decode(file_get_contents($this->storage), true);
        $this->new_user = [
            "login" => $this->login,
            "password" => $this->encrypted_password,
            "email" => $this->email,
            "username" => $this->username,
        ];
      
        if($this->checkValidation()){
        } else {
            return $this->erorr = '';
        }
    }

    private function checkMailandName(){
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            if(preg_match("/^[a-z]{2,}+$/mi", $this->username)){
                $this->insertUser();
            } else{
                $this->error = "Wrong Username";
            }
        } else{
            $this->error = 'Wrong email form';
        }
    }

    private function checkPassword(){
        if(preg_match("/^[a-z0-9]{6,}+$/mi", $this->raw_password)){
           if($this->raw_password == $this->conf_password){
                $this->checkMailandName();
           }else{
                $this->error = "Passwords are not the same ";
           }
        }else{
            $this->error = 'Password must have at least 6 chars or numbs';
        }
        
    }
    private function checkValidation(){
        if (preg_match("/^.{6,}+$/mi", $this->login)){
            $this->checkPassword();
        } else {
            $this->error = 'Login must have at least 6 simbols';
        }
    }

    private function userloginExists(){
        
        foreach($this->stored_users as $user){
          
            if($this->login == $user['login']){
                $this->error = "User with this login already exist.";
                    return true;
            } 
        }
    }

    private function emailExists(){
        foreach($this->stored_users as $user){
            if($this->email == $user['email']){
                $this->error = "User with this Email already exist.";
                    return true;
            } 
        }
    }

    private function insertUser(){
        if($this->userloginExists() == FALSE &&  $this->emailExists() == FALSE ){
            array_push($this->stored_users, $this->new_user);
            if(file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))){
                $this->success = 'Your registration is Successful!';
                
            } else {
                return $this->error = 'Your Registration is BAD';
            }
        } 
    }
}

?>