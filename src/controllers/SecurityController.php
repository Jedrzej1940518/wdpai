<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../../Database.php';

class SecurityController extends AppController
{
    public function login()
    {
        if($this->isGet())
        {
            return $this->render('login');
        }

               
        $email = $_POST["email"];
        
        $user_repository = new UserRepository();
        $user = $user_repository->findByEmail($email);
        
        $password = md5($_POST["password"]);

        if($user->getPassword() !== $password)
        {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }
        //setting cookies
        $user_id = $user->getId();
        $expiration_time = time() + 3600; 

        setcookie("user_id", $user_id, $expiration_time, "/");

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/versus");
    }
    
    public function register()
    {
        if($this->isGet())
        {
            return $this->render('register');
        }
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmedPassword = $_POST['password-repeated'];

        $user_repository = new UserRepository();

        if(!($this->isEmailValid($email)))
        {
            return $this->render('register', ['messages' => ['Email not valid']]);
        }
        if($this->isEmailUsed($email, $user_repository))
        {
            return $this->render('register', ['messages' => ['Email already in use']]);
        }
        if(!$this->isPasswordValid($email))
        {
            return $this->render('register', ['messages' => ['Password must be at least 8 characters long!']]);
        }
        if($password != $confirmedPassword)
        {
            return $this->render('register', ['messages' => ['Passwords don\'t match!']]);

        }
        
        $user = new User(0, $email, md5($password));
        $user_repository->insert($user);
        $app_user = $user_repository->findByEmail($email);
        echo json_encode($app_user);    //debug
    
        return $this->render('login', ['messages' => ['Registration complete. You can now log in']]);
    }
    private function isEmailValid($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    private function isEmailUsed($email, $user_repository) {
        $app_user = $user_repository->findByEmail($email);
        return ($app_user !== false);
    }
    
    private function isPasswordValid($password) {
        return (strlen($password) >= 2);
    }
}