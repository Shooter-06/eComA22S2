<?php
namespace app\controllers;

class Food{
	public function delete($food_id){
		$food = new \app\models\Food();
		$food ->deleteAt($food_id);

		header('location:/Main/foods');
	}
}