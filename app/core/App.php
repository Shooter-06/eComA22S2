<?php
namespace app\core;

/*Routing all requests to the appropriate controller method
e.g
localhost/person/add -> run the method add in the personController class

localhost/person/delete -> run the method delete in the personController class
*/



class App{
	public function __construct(){
		//echo "A new App is born";
		echo $_GET['url'];
	}
}

