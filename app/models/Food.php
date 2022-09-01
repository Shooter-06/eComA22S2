<?php
namespace app\models;

class Food{
	
	private static $file ='app/Resources/foods.txt';
	public $name;

	public function getAll(){
		//return all the food records
		$foods = file(self::$file);
		$output=[];

		foreach ($foods as $key => $value) {
			$newFood = new Food();

			//kinda like a primary key
			$newFood->id = $key;
			$newFood-> name = $value;

			$output[] = $newFood;
		}
		return $output;
	}

	public function insert(){
		//insert all the food records

		if(isset($_POST['action'])){
			$fh= fopen(self::$file, 'a');

			flock($fk, LOCK_EX);
			fwrite($fh, $this->name . "\n");
			flock($fk, LOCK_UN);

			fclose($fh);
		}
	}



	public function deleteAt($index){
		//TODO validation
		$foods = file(self::$file);
		if(!isset($foods[$index]))
			return;

		//delete elements line num
		unset($foods[$index]);
		$foods = array_values($foods);

		//write everything back 
		$fh =fopen(self::$file, 'w');
		flock($fk, LOCK_EX);
		foreach ($variable as $key => $value) {

			fwrite($fh, $this->name);
			flock($fk, LOCK_UN);

			fclose($fh);
		}
	}
	public function __toString(){
		return $this->name;
	}
}