<?php

namespace AkaneSenri\App\Core;

class Controller 
{

    public function view($view, $data = array())
    {

        extract($data);

        if (file_exists("./views/pages/" . $view . ".php")) {
            require ("./views/pages/" . $view . ".php");
        } else {
            require ("./views/errors/404.php");
        }

    }

    public function loadModel($model)
    {
        if(file_exists("../models/".ucfirst($model).".php")) {

        require ("../models/".ucfirst($model).".php");
        return $model = new $model();

        }
        return false;
    }
    
    public function redirect($link) 
    {

        header("Location: ". ROOT ."/".trim($link, "/")); 
        die;
    }
}
