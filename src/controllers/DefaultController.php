<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    
    public function index() {
        $this->render('login');
    }
    public function versus() {
        $this->render('versus');
    }
    public function register() {
        $this->render('register');
    }
    public function trackedPros() {
        $this->render('tracked-pros');
    }
}