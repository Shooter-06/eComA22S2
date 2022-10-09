<?php
namespace app\filters;

#[\Attribute]
class Login extends \app\core\AccessFilter{

	public function execute(){
		if(!isset($_SESSION['user_id'])){
			header('location:/User/index?error=you must log in to ue these features!');
			return true;
		}
		return false;
	}

}