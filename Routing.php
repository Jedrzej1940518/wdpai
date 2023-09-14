<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/ApiController.php';

class Routing
{

    public static $routes;

    public static function get($url, $controller)
    {
        self::$routes[$url] = $controller;
    }
    public static function post($url, $controller)
    {
        self::$routes[$url] = $controller;
    }
    public static function runApi($url)
    {
        $action = explode("/", $url)[1];
        $params = explode("/", $url)[2];
        $api_controller = new ApiController();

        $api_controller->$action($params);
    }
    public static function run($url)
    {
        $base = explode("/", $url)[0];
        if ($base == 'api')
        {
            return Routing::runApi($url);
        }
 
        if (!array_key_exists($url, self::$routes)) {
            die("{$url} Wrong url!");
        }

        $controller = self::$routes[$url];
        $object = new $controller;

        if($url=='')
        {
            $url = 'index';
        }
        $object->$url();
    }
}