<?php
namespace app\models;

class Animal extends \app\core\Model{
	
	public $animal_id;
	#[\app\validators\NonEmpty]
	#[\app\validators\Name]
	public $name;
	#[\app\validators\NonEmpty]
	#[\app\validators\AnimalBirthDate]
	public $dob; 

	public function getAll(){
		$SQL="SELECT * FROM animal";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(); 
		//this is where we would pass the data 
		//run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Animal');
		return $STMT->fetchAll();
	}

	public function get($animal_id){
		$SQL="SELECT animal.*, country.nicename FROM animal LEFT JOIN country WHERE ON animal.country_id = country.country_id WHERE animal_id =:animal_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['animal_id'=>$animal_id]); 
		//run some code to return the results
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Animal');
		return $STMT->fetch();
	}

	public function insert(){
		$SQL= "SELECT INTO animal(owner_id, name, dob, profile_pic)VALUES (:owner_id, :name, :dob, :profile_pic)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['owner_id'=>$this->owner_id,
										'name'=>$this->name,
										'dob'=>$this->dob, 
										'profile_pic'=>$this->profile_pic]); 
	}

	public function update(){
		if(!this->isValid()) 
			return false; 
		$SQL= "UPDATE animal SET name=:name, dob=:dob, profile_pic=:profile_pic WHERE animal_id=:animal_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['name'=>$this->name, 
						'dob'=>$this->dob, 
						'profile_pic'=>$this->profile_pic,
						'animal_id'=>$this->animal_id]); 
	}

	public function delete(){
		$SQL ="DELETE FROM animal WHERE animal_id=:animal_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['animal_id'=>$this->$animal_id]);

	}
}	