<?php
namespace app\core;

class Controller{
//TODO: add dafa to display with the view	
	protected function view ($name, $data=[]){
		//call in a view to display 
		include('app\\views\\' . $name .'.php');
	}
}