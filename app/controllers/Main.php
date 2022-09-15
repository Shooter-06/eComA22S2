<?php
namespace app\controllers;

class Main extends \app\core\Controller{
	public function index(){
		$this-> view('Main/index');
	}

	public function index2(){
		$this-> view('Main/index2');
	}

	public function say($message="Default message"){
		$this-> view('Main/say', $message);
	}

	public function foods(){

		//TOD: Refactor to place access in a model class!
		// the form is submitted
		if(isset($_POST['action'])){
			$food = new \app\models\Food();
			$food->name = $_POST['new_food'];
			$food->insert();
		}

		//gett all the food
		$foods = new \app\models\Food();
		$foods = $foods->getAll();
		

		//call a view that displays the file contents
		$this->view('Main/foods', $foods);
	}

	public function foodsJSON(){
		//get all the food
		$food = new \app\models\Food();
		$food = $food -> getAll();

		//calla view that displays the file contents
		echo json_encode($foods);
	}

	//the consumer:
	public function foodsDisplay(){
		$this->view('Main/foodsDisplay');
	}
}