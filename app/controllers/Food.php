<?php
namespace app\controllers;

class Food{
	public function delete($food_id){//delete a food item here
		//i would like to delete the record with a specific id
		$food = new \app\models\Food();
		$food ->deleteAt($food_id);
		//redirect to the list
		header('location:/Main/foods');
	}
}