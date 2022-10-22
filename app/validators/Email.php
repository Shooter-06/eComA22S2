<?php
namespace app\validators;

#[\Attribute]
class Email extends \app\core\validator{
	public function isValidData($data){
		return filter_var($data,FILTER_VALIDATE_EMAIL);
	}
}