<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/ApiController.php';

class Routing {

    public static $routes;

    public static function get($url, $controller) {
        self::$routes[$url] = $controller;
    }
    public static function post($url, $controller) {
        self::$routes[$url] = $controller;
    }
    public static function run($url) {
    
        if(!array_key_exists($url, self::$routes)){

            foreach (self::$routes as $key => $value) {
                echo $key . ": " . $value . "<br>";
              }
            die("{$url} Wrong url!");
        }

        $controller = self::$routes[$url];
        $object = new $controller;
        $url = $url ?: 'index';

        $base = explode("/", $url)[0];

        if($base == 'api')
        {
            $action = explode("/", $url)[1];
        }
        else
        {
            $action = $url;
        }
        $object->$action();
    }
}