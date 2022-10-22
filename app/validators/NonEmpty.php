<?php
namespace app\validators;

#[\Attribute]
class NonEmpty extends \app\core\validator{
	public function isValidData($data){
		return !empty($data);
	}
}