<?php

namespace AkaneSenri\App\Controllers;

use PDO;
use AkaneSenri\App\Services\App;
use AkaneSenri\App\Models\User;
use AkaneSenri\App\Core\Controller;

Class Users extends Controller
{
	public function show()
	{
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');

		$database = new App();
		$db = $database->connect();

		$users = new User($db);

		$result = $users->getUsers();

		$num = $result->rowCount();

		if (!empty($num)) {
			$users_arr = array();
			$users_arr['data'] = array();

			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			extract($row);

			$user_item = array(
				'id' => $id,
				'email' => $email,
				'full_name' => $full_name,
				'gender' => $gender,
				'status' => $status
			);

			array_push($users_arr['data'], $user_item);
			}

			echo json_encode($users_arr);

		} else {
			echo json_encode(
			array('message' => 'No Users Found')
			);
		}
        $this->view('users',[
			'user_item'=>$user_item,
		]);
	}
}