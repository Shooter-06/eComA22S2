<?php
namespace app\core;

/*Routing all requests to the appropriate controller method
e.g
localhost/person/add -> run the method add in the personController class

localhost/person/delete -> run the method delete in the personController class
*/



class App{
	private $controller ='Main';
	private $method ='index';

	public function __construct(){
		//echo "A new App is born";
		echo $_GET['url'];
		//placing the routing algorith here
		//TODO replace this echo with the routing algorithm
		//goal is to separate url in parts
		//use the first part to determine the class to load
		//use the second part to determine the method to run
		//while passing all other parts as arguments

		$url =self::parse_url(); //get the url parsed and returned as an array of url segment

		//use the first part to determine if the controller class to load

		if(isset($url[0])){
			if(filter_exists('app/controller/' .$url[0] .'php')){
				$this ->controller = $url[0]; //$this refers to the current object
			}
			unset($url[0]);
		}
		$this->controller ='app\\controllers\\' .this->controller; //providea fully qualified classname
		$this -> controller= new $this-> controller; 


		if(isset($url[1])){
			if(method_exists($this->contr, $url[1])){
				$this->method = $url[1];
			}

			unset($url[1])
		}

		var_dump($url);
		//...while passing all other parts as arguments
		//replackage the parameters

		$params = $url ? array_values($url):[];

		call_user_func_array([$this->controller, $this->method], $params);

		//use the second part to determine the method to run
		//while passinf all other parts as arguments
		
	}

	public static function parse_url(){
		if(isset($_GET['url']))//get url exists
		{
			return explode('/', //return parts in an array, separated by /
				filter_var( //remove non-URL characters and sequences 
					rtrim($_GET['url'], '/'))
				,FILTER_SANITIZE_URL);
		}

	}
}

