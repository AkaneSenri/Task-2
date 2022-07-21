<?php

namespace AkaneSenri\App\Controllers;

use AkaneSenri\App\Services\Router;
use AkaneSenri\App\Services\App;
use AkaneSenri\App\Models\User;
use AkaneSenri\App\Core\Controller;


class Profile extends Controller
{
	
	public function getOne($id)
	{
		$database = new App();
		$db = $database->connect();
		
		$user = new User($db);
		
		$user->id = isset($_GET['id']) ? $_GET['id'] : die();
		
		$user->getUser();
		
		$user_arr = array(
			'id' => $user->id,
			'email' => $user->email,
			'full_name' => $user->full_name,
			'gender' => $user->gender,
			'status' => $user->status
		);
		
		print_r(json_encode($user_arr));
	}

	public function update($id)
	{
		$database = new App();
		$db = $database->connect();
		
		$user = new User($db);
		
		$data = json_decode(file_get_contents("php://input"));
		
		$user->id = $data->id;
		
		$user->email = $data->email;
		$user->full_name = $data->full_name;
		$user->gender = $data->gender;
		$user->status = $data->status;
		
		if($user->update()) {
			echo json_encode(
			  array('message' => 'User data was updated')
			);
		  } else {
			echo json_encode(
			  array('message' => 'User Not Updated')
			);
		}
	}

	public function delete($id)
	{
		$database = new App();
		$db = $database->connect();
		
		$user = new User($db);
		
		$data = json_decode(file_get_contents("php://input"));
		
		$user->id = $data->id;
		
		if($user->delete()) {
			echo json_encode(
			  array('message' => 'User was deleted')
			);
		  } else {
			echo json_encode(
			  array('message' => 'Post Not Updated')
			);
		}

	}

	public function getAll($id)
	{
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
			  array('message' => 'No Posts Found')
			);
		}
	}
}
