<?php
namespace app\controllers;

class Animal extends \app\core\Controller{
	
	//list the animals owned by a specific owner
	public function index($owner_id){

		$owner = new \app\models\Owner();
		$owner = $owner->get($owner_id);
		$animal = new \app\models\Animal();

		echo \Locale::getDefault();

		$animals = $animal->getAll($owner_id);
		$this->view('Animal/index',['owner'=>$owner, 'animals'=>$animals]);//TODO: bluild ths view
	}

	public function add($owner_id){
		if(isset($_POST['action'])){
			$animal = new \app\models\Animal();

			$filename = $this->saveFile($_FILES['profile_pic']);

			$animal->name = $_POST['name'];
			$animal->dob = $_POST['dob'];
			$animal->country_id=$_POST['country_id'];
			$animal->owner_id = $owner_id;
			$animal->profile_pic = $filename;

			echo \Locale::getDefault();

			$animal->insert();
			

			header('location:/Animal/index/' . $owner_id);
		}else{
			$owner = new \app\models\Owner();
			$owner = $owner->get($owner_id);
			$country = new \app\models\Country();
			$countries= $country->getAll();
			$this->view('Animal/add',['owner'=>$owner, 'country'=>$countries]);
		}
	}

	public function insert(){}

	public function update(){}

	public function edit($animal_id){
		$animal = new \app\models\Animal();
		$animal = $animal->get($animal_id);
		$owner_id = $animal->owner_id;

		if(isset($_POST['action'])){

			$filename = $this->saveFile($_FILES['profile_pic']);

			if($filename){
				//delete the old picture and then change the picture
				unlink("images/$animal->profile_pic");
				$animal->profile_pic = $filename;
			}
			$animal->name = $_POST['name'];
			$animal->dob = $_POST['dob'];
			$animal->country_id = $_POST['country_id'];


			$animal->update();

			header('location:/Animal/index/' . $owner_id);
		}else{
			$owner = new \app\models\Owner();
			$owner = $owner->get($owner_id);
			$country = new \app\models\Country();
			$country = $owner->getAll();
			$this->view('Animal/edit',['owner'=>$owner, 'animal'=>$animal, 'country'=>$country]);
		}
	}

	public function details($animal_id){
		$animal = new \app\models\Animal();
		$animal = $animal->get($animal_id);
		$owner = new \app\models\Owner();
		$owner = $owner->get($animal->owner_id);
		$this->view('Animal/details', ['animal'=>$animal, 'owner'=>$owner]);
	}

	public function delete($animal_id){
		$animal = new \app\models\Animal();
		$animal = $animal->get($animal_id);

		//delete the file
		unlink("images/$animal->profile_pic");

		$owner_id = $animal->owner_id;
		$animal->delete();
		header('location:/Animal/index/' . $owner_id);
	}

	public function intern(){
		echo Locale::getDefault();
	}
}