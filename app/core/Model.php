<?php
namespace app\core;

class Model{
	protected static $_connection;

	public function __construct(){
		$server = 'localhost';//127.0.0.1
		$dbname = 'vet_clinic';
		$username = 'root';
		$password = '';

		try{
			self::$_connection = new \PDO("mysql:host=$server;dbname=$dbname",
											$username,$password);
			self::$_connection->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
		}catch(\Exception $e){
			echo "Failed connecting to the database";
			exit(0);
		}
	}

	protected function isValid(){
		//discover attributes on the class properties and rin the tests to validate the values in the properties 
		$reflection = new \ReflectionObject($this);
		$classProperties = $reflection ->getProperties();
		foreach ($cla as $prope) {
			$propertyAttributes = $property->getAttributes();
			foreach ($propertyAttributes as $attribute) {
				$test = $attribute->newInstance();
				if(!$test->isValidData($property->getValue($this))){
					return false;
				}
			}
		}
		return true;
	}
}