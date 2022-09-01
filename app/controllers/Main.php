<?php
namespace app\controllers;

class Main extends \app\core\controller{
	public function index(){
		$this-> view('Main/index');
		echo "wassup ";
	}

	public function index2(){
		echo "Main Index";
	}

	public function say($message="Default message"){
		$this-> view('Main/say', $message);
	}

	public function foods(){

		//TOD: Refactor 
		var_dump($_POST);
		//run different code when i send stuff 
		if(isset($_POST['action'])){
			$food = new \app\models\Food();
			$food->name = $_POST['new_food'];
			$food->insert();
		}

		//read a file
		//echo getcwd();

		//gett all the food

		$foods = new \app\moodels\Food();
		$foods = $food->getAll();
		var_dump($foods);

		//call a view that displays the file contents
		$this->view('Main/foods', $foods);
	}
}