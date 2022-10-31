<?php
namespace app\filters;

#[\Attribute]
class Login extends \app\core\AccessFilter{

	public function execute(){
		if(!isset($_SESSION['user_id'])){
			header('location:/User/index?error=you must log in to ue these features!');
			return true;
		}elseif($_SESSION['secret_key']!=null){
			header('location:/User/index?Check2fa!');
			return true;
		}
		return false;
	}

}