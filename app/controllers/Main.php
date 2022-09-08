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
		// var_dump($_POST);
		//run different code when i send stuff 
		if(isset($_POST['action'])){
			$food = new \app\models\Food();
			$food->name = $_POST['new_food'];
			$food->insert();
		}

		//read a file
		//echo getcwd();

		//gett all the food

		$foods = new \app\models\Food();
		$foods = $foods->getAll();
		

		//call a view that displays the file contents
		$this->view('Main/foods', $foods);
	}

	public function foodsJSON(){
		$food = new \app\models\Food();
		$food = $food -> getAll();

		echo json_encode($foods);
	}

	pubic function foodsDisplay(){
		$this->view('Main/foodsDisplay')
	}
}