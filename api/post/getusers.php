<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Users.php';

$database = new Database();
$db = $database->connect();

$users = new Users($db);

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