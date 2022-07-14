<?php 

namespace App\Services;
use App\Controller\Adduser;

class App 
{
    public static function start()
    {
		self::db();

		Router::page('/home', 'home');
		Router::page('/adduser', 'adduser');
		
		Router::enable();
    }

	public static function db()
	{
		require_once 'config/db.php';

		$connect = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
		try {
			$pdo = new \PDO($connect, $user, $pass, $options);
		} catch (\PDOException $e) {
			throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}
	}
}