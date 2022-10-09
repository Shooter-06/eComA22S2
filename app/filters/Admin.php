<?php
namespace app\filters;

#[\Attribute]
class Admin extends \app\core\AccessFilter{
	public function execute(){
		if($_SESSION['role']!='admin'){
			header('location:/User/account?error=your account does not have admin privillege.');
			return true;
		}
		return false;
	}
}

?>