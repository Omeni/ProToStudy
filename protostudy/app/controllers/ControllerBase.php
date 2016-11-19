<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
	//const ADR = "http://vtapi.vezitaxi.com:8010/";
	
	static function link ()
	{
		/* Подключение к базе данных MySQL, используя вызов драйвера */
		$dsn = 'mysql:host=localhost;dbname=protostudy';
		$user = 'root';
		$password = 'mysql';

		try {
		    $dbh = new PDO($dsn, $user, $password);
		    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  			$dbh->exec("set names utf8");

		    return $dbh;
		} catch (PDOException $e) {
		    echo 'Подключение не удалось: ' . $e->getMessage();
		}
	}

}
