<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Users.php';

$database = new Database();
$db = $database->connect();

$user = new Users($db);

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
      array('message' => 'Post Not Updated')
    );
}