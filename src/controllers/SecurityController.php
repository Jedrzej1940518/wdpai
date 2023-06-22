<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/Database.php';

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
    public function register()
    {
        if($this->isGet())
        {
            return $this->render('register');
        }
        $password = $_POST["password"];
        $email = $_POST["email"];

        $user = new User($email, $password);
        $user_repository = new UserRepository();
        $user_repository->insert($user);

        $users = $user_repository->findAll();
        echo json_encode($users);

        return $this->render('login', ['messages' => ['Registration complete. You can now log in']]);
    }
}