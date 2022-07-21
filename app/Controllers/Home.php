<?php 

namespace AkaneSenri\App\Controllers;
use AkaneSenri\App\Core\Controller;
use AkaneSenri\App\Models\User;

class Home
{

    function index()
    {
        $user = new User();

        $data = $user->findAll();

        $this->view('home',['rows'=>$data]);
    }
}
