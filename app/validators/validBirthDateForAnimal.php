<?php
namespace app\validators;

#[\Attribute]
class ValidDate extends \app\core\Validator{
	public function isValidData($data){
		//make sure the animal was not born more than 500 yrs ago
		$date1 =date_create();
		$date2 =date_create($date);
		$diff=date_diff($date1,$date2)
		return $diff->y < 500;//less than 500 yrs old
	}
}