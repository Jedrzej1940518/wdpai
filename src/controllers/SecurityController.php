<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
class SecurityController extends AppController
{
    public function login()
    {
        if($this->isGet())
        {
            return $this->render('login');
        }

        // $user = new User('jsnow@pk.edu.pl', 'admin', 'John', 'Snow');
        
        // $email = $_POST["email"];
        // $password = $_POST["passrrword"];
        
        // if($user->getEmail() !== $email)
        // {
        //     return $this->render('login', ['messages' => ['User with this email doesn\'t exist!']]);
        // }
        // if($user->getPassword() !== $password)
        // {
        //     return $this->render('login', ['messages' => ['Wrong password!']]);
        // }

        //return $this->render('versus');

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/versus");
    }
}