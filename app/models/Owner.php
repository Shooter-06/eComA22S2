<?php
namespace app\models;

class Country extends \app\core\Model{
	public function getAll(){

		$SQL = "SELECT * FROM country";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();

		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Country');
		return $STMT->fetchAll();
	}

	// public function get($country_id){

	// 	$SQL = "SELECT * FROM country WHERE country_id=:country_id";
	// 	$STMT = self::$_connection->prepare($SQL);
	// 	$STMT->execute();

	// 	$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Country');
	// 	return $STMT->fetchAll();
	// }	
}