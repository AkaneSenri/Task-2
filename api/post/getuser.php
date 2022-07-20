<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Users.php';

$database = new Database();
$db = $database->connect();

$user = new Users($db);

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