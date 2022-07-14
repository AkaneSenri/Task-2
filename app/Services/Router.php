<?php 

namespace App\Services;

class Router 
{
    private static $list = [];

    public static function page($uri, $page_name) 
    {
        self::$list[] = [
            "uri" => $uri,
            "page" => $page_name
        ];
    }

    public static function post($uri, $class, $method)
    {
        self::$list[] = [
            "uri" => $uri,
            "class" => $class,
            "method" => $method,
            "post" => true
        ];
    }

    public static function enable() 
    {
        $uri = $_SERVER['REQUEST_URI'];

        foreach (self::$list as $route) { 
            if (stripos($uri, $route["uri"]) === 0) {
                if ($route["post"] === true) {
                    $action = new $route["class"];
                    $method = $route["method"];
                    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
                           $parameters = $_POST;
                     } else {
                           $parameters = $_GET;
                     }
                     $action->$method($parameters);
                 } else {
                      require_once "views/pages/" . $route['page'] . ".php";
                     die();
                 }
            }
        }

        self::error('404');

    }

    public static function error($error)
    {
        require_once "views/errors/" . $error . ".php"; 
    }
    
    public static function redirect($page)
    {
        require_once "views/pages/" . $page . ".php"; 
        die();
    }

}