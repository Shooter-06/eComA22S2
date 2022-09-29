<?php
namespace app\controllers;

class Main extends \app\core\Controller{
	public function index(){
		$this-> view('Main/index');
	}

	public function index2(){
		$this-> view('Main/index2');
	}

	public function foods(){

		//process the form data if it is submitted
		if(isset($_POST['action'])){
			//create a Food object
			$newfood = new \app\models\Food();
			//populate the Food object
			$newfood->name = $_POST['new_food'];
			//call insert
			$newfood->insert();
		}

		//pass the foods.txt file into a variable
		$foods = new \app\models\Food();
		$foods = $foods->getAll();
		
		//pass the foodsto the view for render and output
		$this->view('Main/foods', $foods);
	}


	public function foodsJSON(){
		//service that outputs JSON
		//read the foods.txt file into a variable
		$food = new \app\models\Food();
		$food = $food -> getAll();

		echo json_encode($foods);
	}
	
	public function foodsDisplay(){
		$this->view('Main/foodsDisplay');
	}
}