<?php 

namespace AkaneSenri\App\Services;
use PDO;
use AkaneSenri\App\Controllers\Adduser;
use AkaneSenri\App\Controllers\Users;
use AkaneSenri\App\Controllers\Profile;

class App 
{
  public static function start()
  {
    self::connect();

    Router::page('/home', 'home');
    Router::page('/adduser', 'adduser');

    Router::post('/done', Adduser::class, 'index');
    Router::post('/users', Users::class, 'show');
    Router::post('/update', Profile::class, 'update');
    Router::post('/delete', Profile::class, 'delete');
      
    Router::enable();
  }

	public static function connect()
	{
    $host = 'localhost';
    $db_name   = 'task';
    $username = 'root';
    $password = 'root';

    $conn = null;
  
    try { 
      $conn = new PDO('mysql:host=' . $host . ';dbname=' . $db_name, $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
    }
      return $conn;
	}
}