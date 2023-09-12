<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('versus', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('trackedPros', 'DefaultController');
Routing::post('addPro', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');

//api
Routing::get('api/pros', 'ApiController');

Routing::run($path);