<?php
namespace app\controllers;

class Test extends \app\core\Controller{
	public function index(){
		$date =''
		$date1 =date_create();
		$date2 =date_create($date);
		$diff=date_diff($date1,$date2)
	}
}