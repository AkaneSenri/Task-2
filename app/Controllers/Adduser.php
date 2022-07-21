<?php 

namespace AkaneSenri\App\Controllers;

use AkaneSenri\App\Services\App;
use AkaneSenri\App\Models\User;

class Adduser
{
    public function index()
    {

        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

        $database = new App();
        $db = $database->connect();

        $user = new User($db);

        $data = json_decode(file_get_contents("php://input"));

        $user->email = $data->email;
        $user->full_name = $data->full_name;
        $user->gender = $data->gender;
        $user->status = $data->status;

        if($user->addUser()) {
            echo json_encode(
            array('message' => 'User was created')
            );
        } else {
            echo json_encode(
            array('message' => 'Error')
            );
        }
        $this->view('adduser',[
			'user'=>$user,
		]);
    }
}
